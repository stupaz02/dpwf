<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableAddSlugColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void $table->string('slug');
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('slug')->default(null);
        });
    }
}
