<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'categorias',
            'compras',
            'detalle_compras',
        ]);

        $this->call(CategoriasTableSeeder::class);
        $this->call(ComprasTableSeeder::class);
        $this->call(DetallesTableSeeder::class);
    }

    private function truncateTables(array $tables)
    {
        $this->checkForeignKeys(false);
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }
        $this->checkForeignKeys(true);
    }
    private function checkForeignKeys($check)
    {
        $check = $check ? '1' : '0';
        DB::statement("SET FOREIGN_KEY_CHECKS = $check");
    }
}
