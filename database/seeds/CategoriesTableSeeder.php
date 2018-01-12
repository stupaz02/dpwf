<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();


        DB::table('categories')->insert([
            [
                'title' => 'Uncategorized',
                'slug' => 'uncategorized'
            ],
            [
                'title' => 'Division Memo',
                'slug' => 'division-memo'
            ],
            [
                'title' => 'Division Announcement',
                'slug' => 'division-announcement'
            ],
            [
                'title' => 'Division Advisories',
                'slug' => 'division-advisories'
            ],
            [
                'title' => 'Featured',
                'slug' => 'featured'
            ]

        ]);

        //update the post  data

        for ($post_id = 1; $post_id <=30; $post_id++ )
        {
            $category_id = rand(1, 4);

            DB::table('posts')
            ->where('id',$post_id)
            ->update(['category_id' => $category_id]);
        }


    }
}
