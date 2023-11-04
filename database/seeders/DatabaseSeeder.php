<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Itemデータをファクトリー作成するとき使用する。
        //\App\Models\Item::factory(100)->create();

        $this->call([
            
            ItemSeeder::class,
            TypeSeeder::class,
            
        ]);
    }
}
