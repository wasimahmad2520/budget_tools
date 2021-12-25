<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('currency_id')->unsigned();
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->bigInteger('number_format_id')->unsigned()->nullable();
            $table->foreign('number_format_id')->references('id')->on('number_formats')->onDelete('cascade');

            $table->bigInteger('date_format_id')->unsigned();
            $table->foreign('date_format_id')->references('id')->on('date_formats')->onDelete('cascade');

            // old design pattern
            // $table->bigInteger('account_id')->unsigned();
            // $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('budget_name')->nullable();
            $table->enum('currency_symbol_placement', ['1', '2','3'])->default('1'); // 1 for left,2 for right and 3  for none
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
        Schema::dropIfExists('budgets');
    }
}
