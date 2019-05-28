<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::with('detalles.categoria')
            ->get();

        return view('compras.index', compact('compras'));
    }

    public function orden()
    {
        $compras = Compra::with('detalles.categoria')
            ->get();

        return view('compras.orden', compact('compras'));
    }
}
