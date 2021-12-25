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
            $table->id()->unsigned();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('is_email_verified')->unsigned()->length(1)->default(0);
            $table->boolean('is_sms_verified')->unsigned()->length(1)->default(0);
            $table->tinyInteger('status')->unsigned()->length(1)->default(1);
            $table->tinyInteger('two_step_varification')->unsigned()->length(1)->default(0);
            $table->tinyInteger('is_heloc_accunt_is_on')->unsigned()->length(1)->default(0);
            $table->rememberToken();
            $table->softDeletes();
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
