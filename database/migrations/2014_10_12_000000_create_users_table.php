<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('roll_id') ->default(2);
            $table->string('email')->unique();
            $table->string('cell')->nullable();
            $table->string('username')->nullable();
            $table->string('gender')->nullable();
            $table->text('bio')->nullable();
            $table->text('social')->nullable();
            $table->text('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo') ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
