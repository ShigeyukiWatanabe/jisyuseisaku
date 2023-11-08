<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Items')->insert([
            [
            
            'user_id' => '1',
            'name_id' => 'JS001',
            'name' => '515food',
            'stock' => '10',
            'type' => 'A工程',
            'detail' => 'A->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()

            ],
            [
            'user_id' => '2',
            'name_id' => 'AB001',
            'name' => '341d fr',
            'stock' => '10',
            'type' => 'B工程',
            'detail' => 'A->B->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ],
            [
            'user_id' => '3',
            'name_id' => 'TS001',
            'name' => '970b belt',
            'stock' => '10',
            'type' => 'C工程',
            'detail' => 'A->B->C->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ],
            [
            'user_id' => '4',
            'name_id' => 'AB002',
            'name' => '030b fr',
            'stock' => '10',
            'type' => 'A工程',
            'detail' => 'A->B->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ],
            [
            'user_id' => '5',
            'name_id' => 'TS002',
            'name' => '030b rr',
            'stock' => '10',
            'type' => 'C工程',
            'detail' => 'A->B->C->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ],
            [
            'user_id' => '6',
            'name_id' => 'AB003',
            'name' => '030b fr',
            'stock' => '10',
            'type' => 'B工程',
            'detail' => 'A->B->出荷',
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ]
            
            
        ]);
    }
}
