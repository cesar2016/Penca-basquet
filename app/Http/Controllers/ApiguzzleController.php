<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use GuzzleHttp\Client;

class ApiguzzleController extends Controller
{

    // # Metodo Solo de testing
    public function getServidePostal($code)
    {
         
        $client = new Client();         
        $url = "https://jobs.backbonesystems.io/api/zip-codes/$code";
        //$token = '1|WJrHW5Eyv3vcrhHvP4BxSf9gmbQyBQtZk73uHQZs';

        $request = $client->get($url, [

            'headers'=> [
                //'Authorization' => 'Bearer ' . $token,
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        return json_decode($request->getBody());  
        
    }

    // # Metodo que solicitado por el formulario
    public function findCodePopstal(Request $request){
        $client = new Client();         
        $url = "https://jobs.backbonesystems.io/api/zip-codes/$request->cp";
         

        $request = $client->get($url, [

            'headers'=> [
                'Content-Type' => 'application/json'
                ]             
        
        ]);
        return json_decode($request->getBody());
    }
   
     



}
