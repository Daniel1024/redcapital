<?php

namespace App\Http\Controllers;

class PeliculaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($genero)
    {
        $generoAceptado = [
            'drama',
            'comedia',
            'accion',
            'terror'
        ];

        if (! in_array($genero, $generoAceptado)) {
            abort(404);
        }
        //todo: accion a realizar
        return view('pelicula.index', compact('genero'));
    }
}
