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
                'title' => 'Accounting',
                'slug' => 'accounting'
            ],
            [
                'title' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'title' => 'Division Advisories',
                'slug' => 'division-advisories'
            ],

            [
                'title' => 'Division Announcements',
                'slug' => 'division-announcements'
            ],

            [
                'title' => 'Division Memoranda',
                'slug' => 'division-memo'
            ],

            [
                'title' => 'Featured',
                'slug' => 'featured'
            ],
          

          
         
            [
                'title' => 'Numbered',
                'slug' => 'numbered'
            ],
            [
                'title' => 'Unnumbered',
                'slug' => 'Unnumbered'
            ],
        
           
            [
                'title' => 'Cashier',
                'slug' => 'cashier'
            ],
            [
                'title' => 'CID',
                'slug' => 'cid'
            ],
            [
                'title' => 'Legal',
                'slug' => 'legal'
            ],
            [
                'title' => 'Lrms',
                'slug' => 'lrms'
            ],
            [
                'title' => 'Medical',
                'slug' => 'medical'
            ],
            [
                'title' => 'Records',
                'slug' => 'records'
            ],
            [
                'title' => 'SGOD',
                'slug' => 'sgod'
            ],
            [
                'title' => 'Supply',
                'slug' => 'supply'
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
