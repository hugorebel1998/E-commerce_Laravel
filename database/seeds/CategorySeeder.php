<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nombre' => 'Caballero',
            'slug' => 'caballero',
            'descripcion' => 'Ropa para caballero'
        ]);

        Category::create([
            'nombre' => 'Dama',
            'slug' => 'dama',
            'descripcion' => 'Ropa para dama'
        ]);

        Category::create([
            'nombre' => 'Electrónica',
            'slug' => 'electrónica',
            'descripcion' => 'Aparatos de electrónica'
        ]);

    }
}
