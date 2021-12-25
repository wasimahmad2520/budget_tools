<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('account_type_id')->nullable()->unsigned(); 
            $table->foreign('account_type_id')->references('id')->on('account_types')->onDelete('cascade');

            $table->bigInteger('budget_id')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            

            $table->string('account_title');
            $table->decimal('current_amount', 22, 3)->default(0);
            $table->enum('is_account_unlinked', ['1', '2'])->default('1'); // 1 for unlinked, 2 for linked account
            $table->enum('status', [1, 2])->default(1); // 1 for active ,2 for inactive
            $table->text('json_detail')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
