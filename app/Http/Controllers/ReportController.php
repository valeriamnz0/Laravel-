<?php

namespace App\Http\Controllers;

use App\articulo;
use App\proyecto;
use App\TipoArticulo;
use App\TipoProyecto;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function viewSaleReport()
    {
        $projectTypes = TipoProyecto::all();
        $itemTypes = TipoArticulo::all();
        $clients = User::where('fk_rolID', 4)->get();
        return view('reports.sale_report')->with('projectTypes', $projectTypes)->with('itemTypes', $itemTypes)->with('clients', $clients);
    }

    public function generateSaleReport(Request $request)
    {
        $query = proyecto::with('user', 'tipoproyecto', 'cotizacions.articulos', 'cotizacions.rubros');
        if ($request->has('start_date'))
            $query->whereDate('created_at', '>=', $request->start_date);
        if ($request->has('final_date'))
            $query->whereDate('created_at', '<=', $request->final_date);
        if ($request->has('project_type_id'))
            $query->where('fk_tipoProyectoID', $request->project_type_id);
        if ($request->has('client'))
            $query->where('fk_usersID', $request->client);
        $proyectos = $query->get();
        if ($request->has('category'))
            $proyectos->filter(function ($proyecto) use ($request) {
                return $proyecto->cotizacions->contains(function ($cotizacion) use ($request) {
                    return $cotizacion->articulos->contains(function ($articulo) use ($request) {
                        return $articulo->fk_tipoArticuloID == $request->category;
                    });
                });
            });
        $array = [];
        foreach ($proyectos as $proyecto) {
            $aux = [];
            $aux[] = $proyecto->user->userID;
            $aux[] = $proyecto->user->name;
            $aux[] = $proyecto->cotizacions->count();
            $aux[] = $proyecto->codigoProyecto;
            $aux[] = $proyecto->tipoproyecto->nombre;
            $aux[] = $proyecto->cotizacions->sum(function ($cotizacion) {
                return $cotizacion->articulos->count();
            });
            $aux[] = $proyecto->cotizacions->sum(function ($cotizacion) {
                    return $cotizacion->articulos->sum(function ($articulo) {
                        return $articulo->pivot->precioFinal;
                    });
                }) + $proyecto->cotizacions->sum(function ($cotizacion) {
                    return $cotizacion->rubros->sum(function ($rubro) {
                        return $rubro->pivot->precioFinal;
                    });
                });
            $aux[] = $proyecto->created_at;
            $array[] = $aux;
        }
        return response()->json($array);
    }

    public function viewClientReport()
    {
        return view('reports.client_report');
    }

    public function generateClientReport(Request $request)
    {
        $query = User::with('proyectos.cotizacions.articulos', 'proyectos.cotizacions.rubros');
        if ($request->has('start_date'))
            $query->whereDate('created_at', '>=', $request->start_date);
        if ($request->has('final_date'))
            $query->whereDate('created_at', '<=', $request->final_date);
        $users = $query->where('fk_rolID', 4)->get();
        $array = [];
        foreach ($users as $user) {
            $aux = [];
            $aux[] = $user->userID;
            $aux[] = $user->name;
            $aux[] = $user->proyectos->sum(function ($proyecto) {
                return $proyecto->cotizacions->sum(function ($cotizacion) {
                    return $cotizacion->articulos->count();
                });
            });
            $aux[] = $user->proyectos->count();
            $aux[] = $user->proyectos->sum(function ($proyecto) {
                    return $proyecto->cotizacions->sum(function ($cotizacion) {
                        return $cotizacion->articulos->sum(function ($articulo) {
                            return $articulo->pivot->precioFinal;
                        });
                    });
                }) + $user->proyectos->sum(function ($proyecto) {
                    return $proyecto->cotizacions->sum(function ($cotizacion) {
                        return $cotizacion->rubros->sum(function ($rubro) {
                            return $rubro->pivot->precioFinal;
                        });
                    });
                });
            $array[] = $aux;
        }
        return response()->json($array);
    }

    public function viewItemReport()
    {
        $itemTypes = TipoArticulo::all();
        return view('reports.item_report')->with('categories', $itemTypes);
    }

    public function generateItemReport(Request $request)
    {
        $query = articulo::with('cotizaciones.proyecto', 'cotizaciones.proyecto');
        if ($request->has('category'))
            $query->where('fk_tipoArticuloID', $request->category);
        if ($request->has('start_date'))
            $query->whereDate('created_at', '>=', $request->start_date);
        if ($request->has('final_date'))
            $query->whereDate('created_at', '<=', $request->final_date);
        $items = $query->get();
        $array = [];
        foreach ($items as $item) {
            $aux = [];
            $aux[] = $item->codigo;
            $aux[] = $item->nombre;
            $aux[] = $item->cotizaciones->mapWithKeys(function ($cotizacion) {
                return [$cotizacion->proyecto->proyectoID => $cotizacion->proyecto->codigoProyecto];
            })->count();
            $aux[] = $item->cotizaciones->max(function ($cotizacion) {
                    return $cotizacion->pivot->precio;
                }) ?? 0;
            $aux[] = $item->cotizaciones->min(function ($cotizacion) {
                    return $cotizacion->pivot->precio;
                }) ?? 0;
            $aux[] = $item->costo;
            $array[] = $aux;
        }
        return response()->json($array);
    }
}
