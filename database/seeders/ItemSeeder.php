<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Items')->insert([
            [
            
            'user_id' => fake()->unique()->numberBetween(1,100),
            'name' => fake()->name(10),
            'type' => fake()->realText(50),
            'detail' => fake()->realText(50),
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()

            ],
            [
            'user_id' => fake()->unique()->numberBetween(1,100),
            'name' => fake()->name(10),
            'type' => fake()->realText(50),
            'detail' => fake()->realText(50),
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ],
            [
            'user_id' => fake()->unique()->numberBetween(1,100),
            'name' => fake()->name(10),
            'type' => fake()->realText(50),
            'detail' => fake()->realText(50),
            'created_at' => fake()->datetimeThisDecade(),
            'updated_at' => fake()->datetimeThisYear()
            ]
            
        ]);
    }
}
