<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Note;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();

        DB::beginTransaction();
        try {
            for ($i = 0; $i < 25; $i++) {
                Category::factory(10, function () {
                    return [
                        'parent_id' => Category::inRandomOrder()->first(),
                    ];
                })->create();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            echo $e->getMessage();
        }
        Category::fixTree();

        \App\Models\Note::factory(10, [
            'category_id' => fn () => Category::inRandomOrder()->first()->id,
        ])->create();
    }
}
