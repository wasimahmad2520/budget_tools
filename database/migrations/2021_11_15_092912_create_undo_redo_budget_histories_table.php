<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndoRedoBudgetHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undo_redo_budget_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // availalbe in budget table?
            // $table->bigInteger('account_id')->unsigned()->nullable();
            // $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->bigInteger('budget_id')->unsigned()->nullable();
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->bigInteger('envelop_sub_category_id')->unsigned()->nullable();
            $table->foreign('envelop_sub_category_id')->references('id')->on('envelop_sub_categories')->onDelete('cascade');
            // amount of envelop sub category 
             $table->decimal('budgeted_amount', 22, 3)->default(0);
          // all fields of envelop goal to store its history
            $table->decimal('total_amount', 22, 3)->default(0);
            $table->enum('duration_type', ['weekly', 'monthly','by_date'])->default('weekly');
            $table->string('weekly_value')->nullable();
            $table->string('monthly_value')->nullable();
            $table->date('transaction_date')->default(DB::raw('CURRENT_DATE'));
            $table->enum('is_undo', ['1', '2'])->default('1');
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
        Schema::dropIfExists('undo_redo_budget_histories');
    }
}
