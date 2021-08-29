<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    function mostrarForm($id = null){
        if(!$id){
            return "Debe ingresar un id";
            }
        else{
            return "Form id: ".$id;
        }
    }
}
