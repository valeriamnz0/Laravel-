<?php

namespace App\Http\Controllers;

use App\cotizacion;
use App\proyecto;
use App\agendaInstalacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgendaInstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agenda = DB::table('agenda_instalacions as AI') // Esto se usa para mostrar la tabla de Visitas
            ->join('users as UT', 'AI.fk_tecnicoID', '=', 'UT.userID')
            ->join('cotizacions as C', 'AI.fk_cotizacionID', '=', 'C.cotizacionID')
            ->join('proyectos as P', 'C.fk_proyectoID', '=', 'P.proyectoID')
            ->join('users as UC', 'P.fk_usersID', '=', 'UC.userID')
            ->join('tipo_proyectos as TP', 'TP.tipoProyectoID', '=', 'P.fk_tipoProyectoID')
            ->select(
                'AI.agendaInstalacionID',
                'AI.fechaHora',
                'AI.ubicacion',
                'C.cotizacionID',
                'C.codigoCotizacion',
                'P.proyectoID',
                'P.codigoProyecto',
                'TP.nombre',
                'UT.userID as tecID',
                'UT.name as nombreTec',
                'UC.*'
            )
            ->get();

        $proyecto = DB::table('proyectos') // Esto se utiliza para cargar el modal de Proyectos en Filtrar
            ->join('tipo_proyectos', 'tipo_proyectos.tipoProyectoID', '=', 'proyectos.fk_tipoProyectoID')
            ->join('users', 'users.userID', '=', 'proyectos.fk_usersID')
            ->whereIn('proyectos.proyectoID', function ($query) {
                $query->select('fk_proyectoID')
                    ->from('cotizacions')
                    ->where('aprobado', '=', 1);
            })
            ->where('proyectos.completada', '=', 0)
            ->get();


        $tecnicos = DB::table('users')
            ->where('fk_rolID', '=', 3)
            ->select('name', 'userID')
            ->get();

        return view('Instalacion/FormularioInstalacion')->with([
            'proyectos' => $proyecto,
            'agendas' => $agenda,
            'tecnicos' => $tecnicos
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "fk_cotizacionID" => "required",
            "fk_tecnicoID" => "required",
            "fechaHora" => "required|unique:agenda_instalacions|date|after_or_equal:now",
            "ubicacion" => "required",
        ]);
        agendaInstalacion::create($validated);  
        return redirect()->action([AgendaInstalacionController::class, 'index'])->with(['msj' => 'Instalación registrada', 'icon' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\agendaInstalacion $agendaInstalacion
     * @return \Illuminate\Http\Response
     */
    public function show(agendaInstalacion $agendaInstalacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\agendaInstalacion $agendaInstalacion
     * @return \Illuminate\Http\Response
     */
    public function edit(agendaInstalacion $agendaInstalacionID)
    {
        $agenda = agendaInstalacion::find($agendaInstalacionID);
        return redirect()->route('instalacion.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\agendaInstalacion $agendaInstalacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $agenda)
    {
        $validated = $request->validate([
            "fk_cotizacionID" => "required",
            "fk_tecnicoID" => "required",
            "fechaHora" => "required|unique:agenda_instalacions,fechaHora,{$agenda},agendaInstalacionID|date|after_or_equal:now",
            "ubicacion" => "required",
        ]);
        agendaInstalacion::find($agenda)->update($validated);
        return redirect()->action([AgendaInstalacionController::class, 'index'])->with(['msj' => 'Instalación editada', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\agendaInstalacion $agendaInstalacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        agendaInstalacion::find($id)->delete();
        return redirect()->route('instalacion.index');
    }

    public function datosCotizacion($id)
    {  // Esto se usa para mostrar el Filtrar de Cotizaciones
        $cotizaciones = cotizacion::select('*')->where('fk_proyectoId', $id)->first();

        $cotizacionesData['data'] = $cotizaciones;
        echo json_encode($cotizacionesData);
        exit;
        //dd($cotizacionesData['data']);


    }

    public function datosCitasTecnico($id)
    {
        //
        $agenda = DB::table('agenda_instalacions as AI') // Esto se usa para mostrar la tabla de Visitas
            ->join('users as UT', 'AI.fk_tecnicoID', '=', 'UT.userID')
            ->join('cotizacions as C', 'AI.fk_cotizacionID', '=', 'C.cotizacionID')
            ->join('proyectos as P', 'C.fk_proyectoID', '=', 'P.proyectoID')
            ->join('users as UC', 'P.fk_usersID', '=', 'UC.userID')
            ->join('tipo_proyectos as TP', 'TP.tipoProyectoID', '=', 'P.fk_tipoProyectoID')
            ->select(
                'AI.agendaInstalacionID',
                'AI.fechaHora',
                'AI.ubicacion',
                'C.cotizacionID',
                'C.codigoCotizacion',
                'P.proyectoID',
                'P.codigoProyecto',
                'P.comentarios',
                'P.completada',
                'TP.nombre',
                'UT.userID as tecID',
                'UT.name as nombreTec',
                'UC.*'
            )
            ->where('fk_tecnicoID', '=', $id)
            ->get();

        return view('Instalacion/FormularioInstalacionTecnico')->with([
            'agendas' => $agenda
        ]);
    }

    public function listaMaterialesTecnico($id1)
    {

        $materiales = DB::table('cotizacion_articulo as CA') // Esto se usa para mostrar la info en el modal de Lista Materiales
            ->join('articulos as A', 'CA.fk_articuloID', '=', 'A.articuloID')
            ->select(
                'CA.cantidad',
                'CA.fk_articuloID',
                'A.nombre',
                'A.codigo',
                'A.proveedor',
                'A.marca'
            )
            ->where('CA.fk_cotizacionID', $id1)
            ->get();

        $materialesData['data1'] = $materiales;
        echo json_encode($materialesData);
        exit;
    }

    public function updateProyecto(Request $request, Proyecto $proyecto)
    {
        // dd($request);
        // dd($proyecto);
       DB::table('proyectos')->updateOrInsert(
           ['proyectoID' => $proyecto['proyectoID'], 'codigoProyecto' => $proyecto['codigoProyecto']],
           ['completada' => $request['completado'], 'comentarios' => $request['txtNotas1']]
        );
       //
        //     $proyecto->update([
        //         'comentarios' => $request['txtNotas'],
        //    ]);
        //  dd($request);
        return redirect()->action([AgendaInstalacionController::class, 'datosCitasTecnico'], ['id' => auth()->user()->userID]);
    }
}
