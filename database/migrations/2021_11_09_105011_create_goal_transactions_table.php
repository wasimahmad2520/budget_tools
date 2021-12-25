<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_transactions', function (Blueprint $table) {
            $table->id()->unsigned();

              $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->integer('goal_type_id')->unsigned();
            // $table->foreign('goal_type_id')->references('id')->on('envelop_sub_categories')->onDelete('cascade');
            $table->bigInteger('budget_id')->unsigned();
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');

            $table->decimal('total_amount', 22, 3)->default(0);

            // can be either evelop or goal at a time
             $table->bigInteger('envelop_id')->unsigned()->nullable();
             $table->foreign('envelop_id')->references('id')->on('envelops')->onDelete('cascade');

             $table->bigInteger('goal_id')->unsigned()->nullable();
             $table->foreign('goal_id')->references('id')->on('envelop_goals')->onDelete('cascade');
             $table->enum('is_from_envelop_to_goal', ['1', '2'])->default('1'); // 1 for unlinked, 2 for linked 
             $table->date("transaction_date")->default(DB::raw('CURRENT_DATE'));
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
        Schema::dropIfExists('goal_transactions');
    }
}
