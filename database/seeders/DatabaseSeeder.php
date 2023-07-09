<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $category1 = Category::factory()->create();
        $category2 = Category::factory()->create();
        $category3 = Category::factory()->create();
        $category4 = Category::factory()->create();
        
        Post::factory(6)->create([
          'category_id' => $category1->id,
        ]);
        Post::factory(6)->create([
          'category_id' => $category2->id,
        ]);
        Post::factory(6)->create([
          'category_id' => $category3->id,
        ]);
        Post::factory(6)->create([
          'category_id' => $category4->id,
        ]);
    }
}
