<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    // public function up()
    // {
    //     Schema::create('users', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->string('name');
    //         $table->string('email')->unique();
    //         $table->string('password',60);
    //         $table->rememberToken();
    //         $table->timestamp();
    //     });
    // }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
