<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterImageToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('image', 50)->nullable()->change();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->binary('image')->nullable()->change();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->binary('image')->change();
        });
    }
}
