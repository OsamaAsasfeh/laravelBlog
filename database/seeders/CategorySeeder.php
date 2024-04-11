<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
     // to run this function php artisan dp:seed CategroySeeder
   // another general command php artisan dp:seed 
   // to run it you need to use the orginal seeder file
     public function run(): void
    {
        //
        $categories=['Food','Travel',"Financial","Fashion"];
        foreach($categories as $category){
            Category::Create([
                'name'=>$category
            ]);
        }
    }
}
