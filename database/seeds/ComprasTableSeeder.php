<?php

use Illuminate\Database\Seeder;

class ComprasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([1, 2, 3] as $value) {
            \App\Models\Compra::create([
                'cantidad' => rand(1,10),
                'producto' => "Producto {$value}"
            ]);
        }
    }
}
