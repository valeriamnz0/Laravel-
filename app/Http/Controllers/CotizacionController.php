<?php

namespace App\Http\Controllers;

use App\cotizacion;
use App\proyecto;
use App\articulo;
use App\User;
use App\OtrosRubro;
use App\TipoProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $administradores = User::all()->where("fk_rolID", "=", 1);

        $articulos = DB::table('articulos')
                    -> join ('tipo_articulos', 'tipo_articulos.tipoArticuloID', '=', 'articulos.fk_tipoArticuloID')
                    -> select('articulos.articuloID','articulos.codigo','articulos.fk_tipoArticuloID' ,'articulos.nombre', 'articulos.proveedor', 'articulos.marca',
                    'articulos.costo', 'articulos.unidadMedida', 'articulos.nombre', 'tipo_articulos.descripcion')
                    ->get();

        $dolares=$this->getCambioDolar();

        $esExonerado = ['Sí'=> 1,
                        'No'=> 0];
        
        return view('Cotizacion/cotizador')->with([
            'articulos' => $articulos,
            'esExonerado' => $esExonerado,
            'dolares' => $dolares,
            'administradores' => $administradores
        ]);;
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

        $request->validate([
            'txtCodCotizacion' => 'required|max:100',
            'ddExonerado' => 'required|boolean',
            'dFecha' => 'required|date',
            'txtChangeBuy' => 'required|min:1|numeric',
            'txtChangeSell' => 'required|min:1|numeric',
            'txtNotas' => 'required|max:2500',
            'txtProyectoID' => 'required|min:1|numeric',
            'txtCantidadMat' => 'required|min:1|numeric',
            'txtCostoMat' => 'required|min:1|numeric',
            'txtMargenMat' => 'required|min:1|numeric',
            'txtPrecioMat' => 'required|min:1|numeric',
            'txtivaMat' => 'required|min:1|numeric',
            'txtPrecioFMat' => 'required|min:1|numeric',
            'txtCantidadMano' => 'required|min:1|numeric',
            'txtCostoMano' => 'required|min:1|numeric',
            'txtMargenMano' => 'required|min:1|numeric',
            'txtPrecioMano' => 'required|min:1|numeric',
            'txtivaMano' => 'required|min:1|numeric',
            'txtPrecioFMano' => 'required|min:1|numeric'
            ]);

        $articulos = $request['listaArticulos'];

        $cotizacion = new cotizacion([
            'codigoCotizacion' => $request['txtCodCotizacion'],
            'exonerado' => $request['ddExonerado'],
            'fecha' => $request['dFecha'],
            'aprobado' => 0,
            'compraDolar' => round($request['txtChangeBuy'], 2),
            'ventaDolar' => round($request['txtChangeSell'], 2),
            'notas' => $request['txtNotas'],
            'fk_proyectoID' => $request['txtProyectoID'],
            'fk_userID' => auth()->id()
        ]);
        $cotizacion->save();

        $ultimaCotizacion = $cotizacion->cotizacionID;

        $materiales = new OtrosRubro([
           'fk_cotizacionID' => $ultimaCotizacion,
           'fk_rubrosCotizacionID' => 1,
           'cantidad' => $request['txtCantidadMat'],
           'costo' => $request['txtCostoMat'],
           'margen' => round($request['txtMargenMat'], 2),
           'precio' => round($request['txtPrecioMat'], 2),
           'iva' => round($request['txtivaMat'], 2),
           'precioFinal' => round($request['txtPrecioFMat'], 2),
        ]);

        $materiales->save();

        $manoDeObra = new OtrosRubro([
            'fk_cotizacionID' => $ultimaCotizacion,
           'fk_rubrosCotizacionID' => 2,
           'cantidad' => $request['txtCantidadMano'],
           'costo' => $request['txtCostoMano'],
           'margen' => round($request['txtMargenMano'], 2),
           'precio' => round($request['txtPrecioMano'], 2),
           'iva' => round($request['txtivaMano'], 2),
           'precioFinal' => round($request['txtPrecioFMano'], 2),
         ]);
 
         $manoDeObra->save();

         foreach($articulos as $articulo){
            DB::table('cotizacion_articulo')
            ->insert(
            [
            'fk_articuloID' => $articulo[0],
            'fk_cotizacionID' => $ultimaCotizacion,
            'cantidad' => $articulo[1],
            'margen' => round($articulo[2], 2),
            'precio' => round($articulo[3], 2),
            'iva' => round($articulo[4], 2),
            'precioFinal' => round($articulo[5],2),
            'created_at' => Now(),
            'updated_at' => Now()
            ]
            );
         }


         return redirect()->action([ProyectoController::class, 'index'])->with(['msj' => 'Cotización registrada', 'icon' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function show(cotizacion $cotizacion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotizacion $cotizacion)
    {
        
        $request->validate([
            'ddAprobado' => 'required|boolean'
            ]);

        $aprobados = DB::table('cotizacions')
        ->select('aprobado')->where('fk_proyectoID', '=', $request['txtProyectoID'])
        ->where('aprobado', '=', true)
        ->get();

        if(count($aprobados) > 0 && $request['ddAprobado'] == true){
            return back()->with(
                [
                    'estado' => 'Este proyecto ya tiene una cotización'
                ]
            );
        }else{
            $cotizacion->update([
                'aprobado' => $request['ddAprobado']
            ]);
    
            return redirect()->action(
                [ProyectoController::class, 'show'], ['proyecto' => $request['txtProyectoID']]
            )->with(['msj' => 'Cotización editada', 'icon' => 'success']);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotizacion $cotizacion)
    {
        //
    }

    public function getCambioDolar() {
       try {
           /*$doc = new \DOMDocument();
                libxml_use_internal_errors(true);
        $doc->loadHTML("https://gee.bccr.fi.cr/IndicadoresEconomicos/Cuadros/frmConsultaTCVentanilla.aspx");
        libxml_clear_errors();
        //$h1 = $doc->getElementById("exchangeRateBuyUSD");*/
        $response = Http::post('https://www1.sucursalelectronica.com/redir/showLogin.go');

        $string = $response->body();
        $regex = "/{\n(.*)countryCode : 'CR',([\s\S]+)l\n  };/";
        preg_match_all($regex,
            $string,
            $salida, PREG_PATTERN_ORDER);
        $lineaCompra = preg_split('#\r?\n#', $salida[0][0], 0)[5];
        $lineaVenta = preg_split('#\r?\n#', $salida[0][0], 0)[6];
        $regex = "/'(.*?)'/";
        preg_match_all($regex,
            $lineaCompra,
            $dolarCompra, PREG_PATTERN_ORDER);
        preg_match_all($regex,
            $lineaVenta,
            $dolarVenta, PREG_PATTERN_ORDER);

            //dd($dolarCompra[1][0]);
        return $cambioDolar = [
            'compraDolares' => $dolarCompra[1][0],
            'ventaDolares' => $dolarVenta[1][0]
        ];
       } catch (\Throwable $th) {
            return $cambioDolar = null;
       } 
    }

    /**
     * Pasa el proyecto a la vista de Cotizador.
     *
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function cargaProyecto($proyecto)
    {
        $proyecto = proyecto::findOrFail($proyecto);
        $cliente = User::findOrFail($proyecto->fk_usersID);
        $tipoProyecto = TipoProyecto::all()->where("tipoProyectoID", "=", $proyecto->fk_tipoProyectoID)->first();
        $cuentaCotizaciones = (cotizacion::all()->where("fk_proyectoID", "=", $proyecto->proyectoID)->count()) + 1;

        return $this->index()->with(
            [
                'proyecto' => $proyecto,
                'cliente' => $cliente,
                'tipoProyecto' => $tipoProyecto,
                'codigoCotizacion' => $proyecto->codigoProyecto."-".$cuentaCotizaciones
            ]
        );
    }

    public function editaCotizacion($cotizacion)
    {
        $cotizacion = cotizacion::all()->where("cotizacionID", "=", $cotizacion)->first();
        $proyecto = proyecto::findOrFail($cotizacion->fk_proyectoID);
        $cliente = User::findOrFail($proyecto->fk_usersID);
        $tipoProyecto = TipoProyecto::all()->where("tipoProyectoID", "=", $proyecto->fk_tipoProyectoID)->first();
        $cuentaCotizaciones = (cotizacion::all()->where("fk_proyectoID", "=", $cotizacion->fk_proyectoID)->count()) + 1;
        $materiales = DB::table('cotizacion_articulo')
                    -> join ('articulos', 'articulos.articuloID', '=', 'cotizacion_articulo.fk_articuloID')
                    ->where('fk_cotizacionID', $cotizacion->cotizacionID)
                    ->get();

        $rubros = DB::table('otros_rubros')
                    ->where('fk_cotizacionID', $cotizacion->cotizacionID)
                    ->get();
        
        return $this->index()->with(
            [
                'proyecto' => $proyecto,
                'cliente' => $cliente,
                'tipoProyecto' => $tipoProyecto,
                'codigoCotizacion' => $proyecto->codigoProyecto."-".$cuentaCotizaciones,
                'cotizacion' => $cotizacion,
                'materiales' => $materiales,
                'rubros' => $rubros
            ]
        );
    }


}
