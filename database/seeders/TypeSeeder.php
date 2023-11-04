<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            [
                'type_name' => 'A工程',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'type_name' => 'B工程',
                'created_at' => Now(),
                'updated_at' => Now()
            ],
            [
                'type_name' => 'C工程',
                'created_at' => Now(),
                'updated_at' => Now()
            ]
            
        ]);
    }
}
