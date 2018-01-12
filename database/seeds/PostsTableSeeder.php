<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the posts table
        DB::table('posts')->truncate();

        //generate 10 dummy posts
         
        $posts = [];
        $faker = Factory::create();
        $date = Carbon::create(2017,1, 12, 9);

        for($i = 1; $i <= 30; $i++ )
        {
            $image = "PosT_Image_" .rand(1, 5) .".jpg";
            // $date = date("Y-m-d H:i:s", strtotime("2017-07-18 08:00:00 +{$i} days"));
            $date->addDays(1);
            $publishedDate = clone($date);
            $createdDate = clone($date);

            $posts[] = [
                 'author_id' =>rand(1,3),
                 'title' =>$faker->sentence(rand(8, 12)),
                 'excerpt' =>$faker->text(rand(50,300)),
                 'body'   =>$faker->paragraphs(rand(10, 15), true),
                 'slug' =>$faker->slug(),
                  'image' =>rand(0, 1) ==1 ? $image : NULL,
                  'created_at' => $createdDate,
                  'updated_at' => $createdDate,
                  'published_at' => $i < 5 ? $publishedDate : (rand (0,1) == 0 ? NULL: $publishedDate->addDays(4))
            ];
        }

        DB::table('posts')->insert($posts);
    }
}
