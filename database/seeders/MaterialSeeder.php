<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materials')->insert([
            'name' => 'Areia fina',
        ]);
        DB::table('materials')->insert([
            'name' => 'Areia media',
        ]);
        DB::table('materials')->insert([
            'name' => 'Pedra britada',
        ]);
        DB::table('materials')->insert([
            'name' => 'Cimento itaú',
        ]);
        DB::table('materials')->insert([
            'name' => 'Cal itaú',
        ]);
        DB::table('materials')->insert([
            'name' => 'Bloco cerâmico',
        ]);
        DB::table('materials')->insert([
            'name' => 'Pisos e revestimentos',
        ]);
        DB::table('materials')->insert([
            'name' => 'Ferragem',
        ]);
        DB::table('materials')->insert([
            'name' => 'Outros materiais',
        ]);
        DB::table('materials')->insert([
            'name' => 'Ferramentas',
        ]);
    }
}
