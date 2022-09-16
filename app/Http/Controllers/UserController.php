<?php

namespace App\Http\Controllers;

use App\Consumer\CantonConsumer;
use App\Consumer\DistrictConsumer;
use App\Consumer\ProvinceConsumer;
use App\Models;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private $provinces;

    public function __construct()
    {
        $this->provinces = (new ProvinceConsumer())->getResult();
    }

    //funcion para cargar datos en la gráfica
    public function cargarDatos(){
        $users = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months = User::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) 
        {
           $datas[$month] = $users[$index];
        }
        return view ('Cliente', compact('datas'));

    }


    public function index()
    {

        $users = DB::table('users')
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
        return view('Cliente/FormularioClientesCreate')->with([
            'users' => $users,
            'provinces' => []
        ]);
    }

    private function findText($array, $name)
    {
        foreach ($array as $key => $item) {
            if ($item['name'] == $name)
                return $key;
        }
        return $key;
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'provincia' => ['required', 'string', 'max:100'],
            'canton' => ['required', 'string', 'max:100'],
            'distrito' => ['required', 'string', 'max:100'],
            'identificacion' => ['required', 'string', 'max:12'],
            'telefono' => ['required', 'numeric', 'max:100'],
            'otraSenia' => ['required', 'string', 'max:300'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

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
            'otraSenia' => 'max:255'
        ]);

        /*Instancia para almacenar los valores*/
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

        return redirect()->action([UserController::class, 'index'])->with(['msj' => 'Usuario registrado', 'icon' => 'success']);
        /* Users::create($request->all());

        return redirect()->route('FormularioCliente');*/
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }


    public function edit($userID)
    {

        $user = User::find($userID);
        return view('Cliente/FormularioClientesEdit')->with('user', $user);

        //$thisEdit=true;
        //$user = User::findOrFail($userID);

        //return view('cliente.edit', compact('cliente'));

        /*return view('Cliente/FormularioClientesEdit')->with([
            'users' => $user,
            'user' => $thisEdit
        ]);*/
    }


    public function update(Request $request, $userID)
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

        $user = User::find($userID);

        $user->name = $request->get('name');
        $user->identificacion = $request->get('identificacion');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->provincia = $request->get('texto_provincia');
        $user->canton = $request->get('texto_canton');
        $user->distrito = $request->get('texto_distrito');
        $user->otraSenia = $request->get('otraSenia');

        $user->save();

        return redirect()->action([UserController::class, 'index'])->with(['msj' => 'Usuario editado', 'icon' => 'success']);
        /*$user->update([
            'name' => $request['name'],
            'identificacion' => $request['identificacion'],
            'telefono' => $request['telefono'],
            'email' => $request['email'],
            'provincia' => $request['provincia'],
            'canton' => $request['canton'],
            'distrito' => $request['distrito'],
            'otraSenia' => $request['otraSenia'],
        ]);
        return $this->index();*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     *
     *
     */
    public function destroy(User $user)
    {
        return $user->delete();
    }

    // Kymmer
    public function storeUsuario(Request $request){

        $request->validate([
            'txtNombre' => ['required', 'string', 'max:84'],
            'txtApellido1' => ['required', 'string', 'max:84'],
            'txtApellido2' => ['required', 'string', 'max:84'],
            'txtCorreo' => ['required', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'rol' => ['required', 'exists:rols,rolID'],
        ]);

        //GENERAR PASSWORD
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%');
        $password = Hash::make(substr($random, 0, 8));

        User::create([
            'name' => $request->txtNombre . ' ' . $request->txtApellido1 . ' ' . $request->txtApellido2,
            'email' => $request->txtCorreo,
            'fk_rolID' => $request->rol,
            'password' => $password,
            'telefono' => 1 //TEMPORAL
        ]);

        return redirect()->route('empleados');
    }

    public function updateUsuario(Request $request, $userID){

        $usuario = User::findOrFail($userID);

        $request->validate([
            'txtNombreEditar' => ['required', 'string', 'max:255'],
            'txtCorreoEditar' => ['required', 'email:rfc,dns', 'max:255', 'unique:users,email,' . $usuario->email . ',email'],
            'rolEditar' => ['required', 'exists:rols,rolID'],
        ]);

        $usuario->name = $request->txtNombreEditar;
        $usuario->email = $request->txtCorreoEditar;
        $usuario->fk_rolID = $request->rolEditar;
        $usuario->save();

        return redirect()->route('empleados');

    }
    //termina Kymmer
}
