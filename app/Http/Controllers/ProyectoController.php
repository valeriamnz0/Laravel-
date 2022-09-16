<?php

namespace App\Http\Controllers;

use App\Consumer\CantonConsumer;
use App\Consumer\DistrictConsumer;
use App\Consumer\ProvinceConsumer;
use App\proyecto;
use App\TipoProyecto;
use App\User;
use App\cotizacion;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $provinces;

    public function __construct()
    {
        $this->provinces = (new ProvinceConsumer())->getResult();
    }

    public function barChart()
    {
        $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month] = $users[$index];
        }

        return view('reportes', compact('datas'));
    }

    public function index()
    {
        //$proyectos = proyecto::all();

        $proyectos = DB::table('proyectos')
            ->join('tipo_proyectos', 'tipo_proyectos.tipoProyectoID', '=', 'proyectos.fk_tipoProyectoID')
            ->join('users', 'users.userID', '=', 'proyectos.fk_usersID')
            ->get();

        $tipoProyectos = TipoProyecto::all();

        $users = User::all()->where("fk_rolID", "=", 4);

        return view('Proyecto.FormularioProyectoCreate')->with([
            'proyectos' => $proyectos,
            'tipoProyectos' => $tipoProyectos,
            //'clientes' => $clientes,
            'users' => $users,
            'provinces' => []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => 'required|max:255',
            'identificacion' => 'min:1|max:12',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:10',
            'email' => 'required|max:255|email',
            'provincia' => 'max:100',
            'canton' => 'max:100',
            'distrito' => 'max:100',
            'otraSenia' => 'max:255',
            'ddTipoProyecto' => 'required|numeric|min:1'
        ]);

        $tipo = TipoProyecto::where('tipoProyectoID', $request['ddTipoProyecto'])->firstOrFail();

        $ultimoCliente = User::latest('userID')->first();

        $ultimoProyecto = proyecto::latest()->first();

        $consecutivo = $ultimoProyecto['proyectoID'] + 1;

        $codigoProyecto = $tipo['disminutivo'] . '-' . $consecutivo;

        if (isset($request['esExistente'])) {
            $request->validate([
                'esExistente' => 'required|numeric'
            ]);
            $proyecto = new proyecto([
                'codigoProyecto' => $codigoProyecto,
                'fk_tipoProyectoID' => $request['ddTipoProyecto'],
                'fk_usersID' => $request['esExistente'],
                'completada' => FALSE,
                'comentarios' => ''
            ]);
            $proyecto->save();
        } else {
            $user = new User([
                'name' => $request['name'],
                'identificacion' => $request['identificacion'],
                'telefono' => $request['telefono'],
                'email' => $request['email'],
                'provincia' => $request['texto_provincia'],
                'canton' => $request['texto_canton'],
                'distrito' => $request['texto_distrito'],
                'otraSenia' => $request['otraSenia'],
                'fk_rolID' => $request['rol'],
                'password' => "12345678",
            ]);
            $user->save();

            $proyecto = new proyecto([
                'codigoProyecto' => $codigoProyecto,
                'fk_tipoProyectoID' => $request['ddTipoProyecto'],
                'fk_usersID' => $ultimoCliente['userID'] + 1,
                'completada' => FALSE,
                'comentarios' => ''
            ]);
            $proyecto->save();
        }
        return redirect()->action([ProyectoController::class, 'index'])->with(['msj' => 'Proyecto registrado', 'icon' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(proyecto $proyecto)
    {
        //$cotizaciones = cotizacion::all()->where("fk_proyectoID", "=", $proyecto->proyectoID);
        /*$cotizacionesz = cotizacion::all()->where("cotizacionID", "=", 1);
        foreach($cotizacionesz as $index){
            dd($index->user->name);
        }*/
        //dd($proyecto->codigoProyecto); -- DO-1

        $cotizaciones = DB::table('cotizacions')
            ->join('users', 'users.userID', '=', 'cotizacions.fk_userID')
            ->select(
                'cotizacions.cotizacionID',
                'cotizacions.codigoCotizacion',
                'cotizacions.exonerado',
                'cotizacions.fecha',
                'cotizacions.aprobado',
                'cotizacions.compraDolar',
                'cotizacions.ventaDolar',
                'cotizacions.notas',
                'users.name'
            )->where("fk_proyectoID", "=", $proyecto->proyectoID)
            ->get();

        return $this->index()->with(
            [
                'cotizaciones' => $cotizaciones,
                've_cotizacion' => true,
                'proyectoPasado' => $proyecto
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proyecto $proyecto)
    {
        $request->validate([
            'ddTipoProyecto' => 'required|numeric',
            'proyectoID' => 'required|numeric',
        ]);

        $tipo = TipoProyecto::where('tipoProyectoID', $request['ddTipoProyecto'])->firstOrFail();

        $codigoProyecto = $tipo['disminutivo'] . '-' . $request['proyectoID'];

        $proyecto->update([
            'codigoProyecto' => $codigoProyecto,
            'fk_tipoProyectoID' => $request['ddTipoProyecto'],
            'fk_usersID' => $request['esExistente'],
            'completada' => FALSE,
            'comentarios' => ''
        ]);

        return redirect()->action([ProyectoController::class, 'index'])->with(['msj' => 'Proyecto editado', 'icon' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(proyecto $proyecto)
    {
        //
    }

    public function pasarCliente(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'identificacion' => 'min:1|max:12',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:10',
            'email' => 'required|max:255|email',
            'provincia' => 'max:100',
            'canton' => 'max:100',
            'distrito' => 'max:100',
            'otraSenia' => 'max:255'
        ]);

        $cliente = [
            'name' => $request['name'],
            'identificacion' => $request['identificacion'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'provincia' => $request['texto_provincia'],
            'canton' => $request['texto_canton'],
            'distrito' => $request['texto_distrito'],
            'otraSenia' => $request['otraSenia'],
            'rol' => $request['rol']
        ];

        return $this->index()->with(
            [
                'cliente' => $cliente,
                'crea_proyecto' => true
            ]
        );
    }

    public function escogeCliente(Request $request)
    {

        $request->validate([
            'numeroCliente' => 'required|numeric'
        ]);

        $id = $request->input('numeroCliente');

        $cliente = User::findOrFail($id);

        if ($request['proyectoID'] == null) {
            return $this->index()->with(
                [
                    'cliente' => $cliente,
                    'crea_proyecto' => true
                ]
            );
        } else {
            return $this->index()->with(
                [
                    'cliente' => $cliente,
                    'crea_proyecto' => true,
                    'proyectoID' => $request['proyectoID']
                ]
            );
        }
    }

    public function getAllProvinces(Request $request)
    {
        $provinces = (new ProvinceConsumer())->getResult();
        foreach ($request->users as $user) {
            $user = (object)$user;
            $province = $this->findText($provinces, $user->provincia);
            if (empty($provinces[$province]['cantones']))
                $provinces = (new CantonConsumer($province, $provinces))->getResult();
            $canton = $this->findText($provinces[$province]['cantones'], $user->canton);
            if (empty($provinces[$province]['cantones'][$canton]['distritos']))
                $provinces = (new DistrictConsumer($province, $canton, $provinces))->getResult();
        }
        return response()->json($provinces);
    }

}
