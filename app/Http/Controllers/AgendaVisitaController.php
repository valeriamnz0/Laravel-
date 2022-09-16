<?php

namespace App\Http\Controllers;

use App\User;
use App\agendaVisita;
use Illuminate\Http\Request;
use DB;


class AgendaVisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
        $citas = DB::table('agenda_visitas') // Esto se usa para mostrar la tabla de Visitas
        ->join('users', 'users.userID', '=', 'agenda_visitas.fk_clienteID')
            ->select(
                'users.userID as clienteID',
                'users.name as clienteNombre',
                'agenda_visitas.fechaHora',
                'agenda_visitas.agendaID',
                'agenda_visitas.ubicacion',
                'agenda_visitas.fk_vendedorID as vendedorID'
            )
            ->where('users.fk_rolID', '=', 4)
            ->get();

        $vendedores = DB::table('users')
            ->where('fk_rolID', '=', 2 )
            ->select('name', 'userID')
            ->get();

        $users = DB::table('users') // Esto se utiliza para cargar el modal de Clientes en Filtrar
        ->select(
            'users.userID',
            'users.name',
            'users.identificacion',
            'users.telefono',
            'users.email',
            'users.provincia',
            'users.canton',
            'users.distrito',
            'users.otraSenia'
        )
            ->where('users.fk_rolID', '=', 4)
            ->get();

        return view('Visitas/FormularioCitas')->with([
            'citas' => $citas,
            'users' => $users,
            'vendedores'=>$vendedores
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "fk_clienteID" => "required",
            "fk_vendedorID" => "required",
            "fechaHora" => "required|unique:agenda_visitas|date|after_or_equal:now",
            "ubicacion" => "required",
        ]);
        agendaVisita::create($validated);
        return redirect()->action([AgendaVisitaController::class, 'index'])->with(['msj' => 'Visita registrada', 'icon' => 'success']);
    }


    /**
     * Display the specified resource.
     *
     * @param \App\agendaVisita $agendaVisita
     * @return \Illuminate\Http\Response
     */
    public function show(agendaVisita $agendaVisita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\agendaVisita $agendaVisita
     * @return \Illuminate\Http\Response
     */
    public function edit($agendaID)
    {
        $cita = agendaVisita::find($agendaID);
        return redirect()->route('cita.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\agendaVisita $agendaVisita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cita)
    {
        $validated = $request->validate([
            "fk_clienteID" => "required",
            "fk_vendedorID" => "required",
            "fechaHora" => "required|unique:agenda_visitas,fechaHora,{$cita},agendaID|date",
            "ubicacion" => "required",
        ]);
        agendaVisita::find($cita)->update($validated);

        return redirect()->action([AgendaVisitaController::class, 'index'])->with(['msj' => 'Visita editada', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        agendaVisita::find($id)->delete();
        return redirect()->route('cita.index');

    }
}
