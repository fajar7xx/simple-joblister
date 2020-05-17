<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<10; $i++){
            $category = $faker->jobTitle;
            $slug = Str::of($category)->slug('-');
            
            Category::create([
                'name' => $category,
                'slug' => $slug,
            ]);
        }
    }
}
