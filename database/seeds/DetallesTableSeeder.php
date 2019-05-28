<?php

use Illuminate\Database\Seeder;

class DetallesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = \App\Models\Categoria::all();
        $compras = \App\Models\Compra::all();

        foreach ($compras as $compra) {
            for ($i=1; $i<=$compra->cantidad; $i++) {
                \App\Models\DetalleCompra::create([
                    'compra_id' => $compra->id,
                    'nombre' => rand(1,50),
                    'precio' => rand(100, 10000),
                    'categoria_id' => $categorias->random()->id,
                ]);
            }
        }
    }
}
