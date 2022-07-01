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
        DB::table('materials')->insert([
            'name' => 'Caçamba',
        ]);
        DB::table('materials')->insert([
            'name' => 'Betoneira',
        ]);
        DB::table('materials')->insert([
            'name' => 'Aluguel ferramentas',
        ]);
        DB::table('materials')->insert([
            'name' => 'Portas e janelas',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - alvenaria',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - gesso',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - vidro',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - elétrica',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - hidráulica',
        ]);
        DB::table('materials')->insert([
            'name' => 'Pedras e granitos',
        ]);
        DB::table('materials')->insert([
            'name' => 'Arquiteto/engenheiro',
        ]);
        DB::table('materials')->insert([
            'name' => 'Material elétrico',
        ]);
        DB::table('materials')->insert([
            'name' => 'Material hidráulico',
        ]);
        DB::table('materials')->insert([
            'name' => 'Mão de obra - calha',
        ]);
        DB::table('materials')->insert([
            'name' => 'Madeiramento',
        ]);
    }
}
