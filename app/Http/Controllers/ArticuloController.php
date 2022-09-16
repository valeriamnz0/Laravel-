<?php

namespace App\Http\Controllers;

use App\articulo;
use App\TipoArticulo;
use Illuminate\Http\Request;
use DB;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*$articulos = Articulo::all();
        return view('FormularioArticulos')->with([
            'articulos' => $articulos
        ]);*/

       /* $resultado = Articulo::join("tipoArticulos", "tipoID", "=", "articulos.tipoID" )
        ->select("*")
        ->where("articulos.tipoID", "=", "tipoArticulos.tipoID")
        ->get();*/

        $articulos = DB::table('articulos')
                    -> join ('tipo_articulos', 'tipo_articulos.tipoArticuloID', '=', 'articulos.fk_tipoArticuloID')
                    -> select('articulos.articuloID','articulos.codigo','articulos.fk_tipoArticuloID' ,'articulos.nombre', 'articulos.proveedor', 'articulos.marca',
                    'articulos.costo', 'articulos.unidadMedida', 'articulos.nombre', 'tipo_articulos.descripcion')
                    ->get();
        
        $dropDownArticulos = TipoArticulo::all();

                    return view('Articulo/FormularioArticulosCreate')->with([
                        'articulos' => $articulos,
                        'dropDownArticulos' => $dropDownArticulos
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'codigo' => 'required|max:25',
            'proveedor' => 'required|max:30',
            'costo' => 'required|numeric',
            'marca' =>'required|max:25',
            'nombre' => 'required|max:500',
            'unidadMedida' => 'required|max:25',
        ]);

        $articulo = new Articulo([
            'codigo' => $request['codigo'],
            'proveedor' => $request['proveedor'],
            'costo' => $request['costo'],
            'marca' => $request['marca'],
            'nombre' => $request['nombre'],
            'unidadMedida' => $request['unidadMedida'],
            'fk_tipoArticuloID' => $request['tipoID'],
       ]);
       $articulo->save();
       return redirect()->action([ArticuloController::class, 'index'])->with(['msj' => 'Artículo registrado', 'icon' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
       // $dropDownArticulos = TipoArticulo::find($articulo->fk_tipoArticuloID);
        //$dropDownArticulos = DB::table('tipo_articulos')->where('tipoArticuloID', $articulo->fk_tipoArticuloID)->first();
        //dd($dropDownArticulos);

        // $dropDownArticulos = TipoArticulo::all();

        // $thisEdit=true;

        // return view("Articulo/FormularioArticulosEdit")->with([
        //     'articulos' => $articulo,
        //     'articulo' => $thisEdit,
        //     'dropDownArticulos' => $dropDownArticulos            
        // ]);   
     
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        //
        $articulo->update([
            'codigo' => $request['codigo'],
            'proveedor' => $request['proveedor'],
            'costo' => $request['costo'],
            'marca' => $request['marca'],
            'nombre' => $request['nombre'],
            'unidadMedida' => $request['unidadMedida'],
            'fk_tipoArticuloID' => $request['tipoID'],
       ]);

       return redirect()->action([ArticuloController::class, 'index'])->with(['msj' => 'Artículo editado', 'icon' => 'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //
    }

    public function PDF($id)
    {
        //
        $infoGeneral = DB::table('cotizacions as C') // Esto se usa para mostrar la info en el panel General
            -> join ('proyectos as P', 'C.fk_proyectoID', '=', 'P.proyectoID')
            -> join ('tipo_proyectos as TP', 'TP.tipoProyectoID', '=', 'P.fk_tipoProyectoID')  
            -> join ('users as UV', 'C.fk_userID', '=', 'UV.userID')     
            -> join ('users as UC', 'P.fk_usersID', '=', 'UC.userID')           
            -> select('C.cotizacionID','C.codigoCotizacion' , 'C.fecha', 'C.ventaDolar', 'C.notas',
                      'P.proyectoID', 'P.codigoProyecto',
                      'TP.nombre',
                      'UV.userID as CotizadoPorId', 'UV.name as CotizadoPorNombre',
                      'UC.userID as ClienteID','UC.name as ClienteNombre','UC.telefono', 'UC.email', 'UC.provincia', 'UC.canton', 'UC.distrito', 'UC.otraSenia')
            ->where('C.cotizacionID',$id)                                   
            ->first();
        
        $filas = DB::table('cotizacion_articulo')
        ->where('fk_cotizacionID',$id) 
        ->get(
            DB::raw('ROW_NUMBER() over (order by cantidad) AS NUM'),
        );
        $materiales = DB::table('cotizacion_articulo as CA') // Esto se usa para mostrar la info en la tabla de Rubros
            -> join ('articulos as A', 'CA.fk_articuloID', '=', 'A.articuloID')       
            -> select('A.nombre',
                      'CA.cantidad', 'CA.precio', 'CA.iva', 'CA.precioFinal')
            ->where('CA.fk_cotizacionID',$id)       
            ->get();  
       
        
        $materialesTotales = DB::table('cotizacion_articulo') // Esto se usa para mostrar los totales en la tabla de Rubros 
            ->where('fk_cotizacionID',$id)    
            ->get(array(
                DB::raw('SUM(cotizacion_articulo.precio) AS PRECIO_CALCULADO'),
                DB::raw('SUM(cotizacion_articulo.iva) AS IVA_CALCULADO'),
                DB::raw('SUM(cotizacion_articulo.precioFinal) AS PRECIOFINAL_CALCULADO'),
            ));

        $rubros = DB::table('otros_rubros as ORubros') // Esto se usa para mostrar la info en la tabla de Rubros
            -> join ('rubros_cotizacions as RC', 'ORubros.fk_rubrosCotizacionID', '=', 'RC.rubrosCotizacionID')        
            -> select('RC.rubroNombre',
                      'ORubros.fk_cotizacionID', 'ORubros.fk_rubrosCotizacionID', 'ORubros.precio', 'ORubros.iva', 'ORubros.precioFinal')
            ->where('ORubros.fk_cotizacionID',$id)                                   
            ->get(); 
        
        $rubrosTotales = DB::table('otros_rubros') // Esto se usa para mostrar los totales en la tabla de Rubros 
            ->where('fk_cotizacionID',$id)    
            ->get(array(
                DB::raw('SUM(otros_rubros.precio) AS PRECIO_CALCULADO'),
                DB::raw('SUM(otros_rubros.iva) AS IVA_CALCULADO'),
                DB::raw('SUM(otros_rubros.precioFinal) AS PRECIOFINAL_CALCULADO'),
            ));
         
        $path = base_path('Logo.PNG');
        $type= pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $path1 = base_path('BCR.jpg');
        $type1= pathinfo($path1, PATHINFO_EXTENSION);
        $data1 = file_get_contents($path1);
        $pic1 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);

        $path2 = base_path('bac credomatic.png');
        $type2= pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $pic2 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

        $pdf = \PDF::loadView('articulos', compact('pic', 'pic1', 'pic2', 'infoGeneral', 
            'rubros', 'rubrosTotales' ,'materiales', 'materialesTotales', 'filas' ))->setOptions([
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ]);
        $pdf->setPaper('A4', 'portrait');
        // $pdf->render();
        return $pdf->stream('articulos-list.pdf');
    }
}