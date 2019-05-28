@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="btn btn-info" href="{{ route('compras.index') }}">Compras con sus detalles</a>
                    <a class="btn btn-info" href="{{ route('compras.orden') }}">Compras con categoría ordenada</a>
                    <a class="btn btn-light" href="{{ route('pelicula', 'drama') }}">Peliculas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
