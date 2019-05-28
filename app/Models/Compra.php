<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'cantidad',
        'producto'
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleCompra::class);
    }

    public function getTotalAttribute()
    {
        return $this->detalles()->sum('precio');
    }
}
