<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->truncate();

        //crud post
        $crudPost = new Permission();
        $crudPost->name = "crud-post";
        $crudPost->save();


        //update post
        $updateOthersPost = new Permission();
        $updateOthersPost->name = "update-others-post";
        $updateOthersPost->save();


        //delete post
        $deleteOthersPost = new Permission();
        $deleteOthersPost->name = "delete-others-post";
        $deleteOthersPost->save();

        //crud category
        $crudCategory = new Permission();
        $crudCategory->name = "crud-category";
        $crudCategory->save();

        //crud user
        $crudUser = new Permission();
        $crudUser->name = "crud-user";
        $crudUser->save();

        //crud events

        $crudEvents = new Permission();
        $crudEvents->name = "crud-events";
        $crudEvents->save();

        //crudPages
        $crudPages = new Permission();
        $crudPages->name = "crud-Pages";
        $crudPages->save();
        
        //$crudSlide
        $crudSlides = new Permission();
        $crudSlides->name = "crud-slides";
        $crudSlides->save();


    


        //attach roles permissions

        $admin = Role::whereName('admin')->first();
        $editor = Role::whereName('editor')->first();
        $author = Role::whereName('author')->first();

        $admin->detachPermissions([$crudPost,$updateOthersPost,$deleteOthersPost,$crudCategory,$crudUser,$crudEvents,$crudSlides,$crudPages]);
        $admin->attachPermissions([$crudPost,$updateOthersPost,$deleteOthersPost,$crudCategory,$crudUser,$crudEvents,$crudSlides,$crudPages]);

        $editor->detachPermissions([$crudPost,$updateOthersPost,$deleteOthersPost,$crudCategory,$crudEvents,$crudSlides,$crudPages]);
        $editor->attachPermissions([$crudPost,$updateOthersPost,$deleteOthersPost,$crudCategory,$crudEvents,$crudSlides,$crudPages]);

        $author->detachPermission($crudPost);      
        $author->attachPermission($crudPost);


    }
}
