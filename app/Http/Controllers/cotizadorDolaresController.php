<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cotizadorDolaresController extends Controller
{
    public function getCambioDolar(){
        /*$doc = new \DOMDocument();
        libxml_use_internal_errors(true);
$doc->loadHTML("https://gee.bccr.fi.cr/IndicadoresEconomicos/Cuadros/frmConsultaTCVentanilla.aspx");
libxml_clear_errors();
//$h1 = $doc->getElementById("exchangeRateBuyUSD");*/
$response = Http::post('https://www1.sucursalelectronica.com/redir/showLogin.go');
    dd($response->body());
    }
}
