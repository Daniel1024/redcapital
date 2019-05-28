<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            'chucheria',
            'refresco',
            'comida'
        ];

        foreach ($categorias as $categoria) {
            \App\Models\Categoria::create([
                'nombre' => $categoria
            ]);
        }

    }
}
