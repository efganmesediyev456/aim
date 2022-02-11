<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Blog;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


    	for($i=0;$i<100;$i++){



    		$faker = \Faker\Factory::create();


        $article = new Blog();


       

        $article->image='image';
        $article->slug=Str::slug(uniqid());
        $article->type='musabiqeler';

       

        foreach (['az','en','ru'] as $locale) {
            $article->translateOrNew($locale)->name = $faker->name();
            $article->translateOrNew($locale)->text = $faker->name();
        }

        
        $article->save();

    	}

    	

       


    }
}
