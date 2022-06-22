<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Wata Ciloa',
                'slug' => 'warta',
                'thumb' => 'noimage.jpg',
                'desc' => 'Informasi Seputar Ciloa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'parent_id' => null
            ],
            [
                'title' => 'Sejarah',
                'slug' => 'sejarah',
                'thumb' => 'noimage.jpg',
                'desc' => 'Sejarah Pondok Pesantren Al-Munawwaroh Ciloa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'parent_id' => 1
            ],
            [
                'title' => 'Haul',
                'slug' => 'haul',
                'thumb' => 'noimage.jpg',
                'desc' => 'Informasi Seputar Ciloa',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'parent_id' => 1
            ],
            [
                'title' => 'NU',
                'slug' => 'nu',
                'thumb' => 'noimage.jpg',
                'desc' => 'Informasi Seputar Nahdlatul Ulama',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'parent_id' => null
            ],
        ]);
    }
}
