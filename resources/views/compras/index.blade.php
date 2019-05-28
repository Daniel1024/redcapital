@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de compras</div>

                    <div class="card-body">
                        @foreach($compras as $compra)
                            <h2>Nombre: {{ $compra->producto }}</h2>
                            <p>Cantidad: {{ $compra->cantidad }}</p>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Categoría</th>
                                    <th>Nombre</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($compra->detalles as $detalle)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detalle->categoria->nombre }}</td>
                                        <td>{{ $detalle->nombre }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
