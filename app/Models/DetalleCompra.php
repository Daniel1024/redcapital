<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compras';

    protected $fillable = [
        'compra_id',
        'nombre',
        'precio',
        'categoria_id',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
