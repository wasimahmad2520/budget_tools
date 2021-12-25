<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('account_id')->unsigned()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            // deciding about
            // $table->bigInteger('payee')->unsigned();
            // $table->foreign('payee')->references('id')->on('account_types')->onDelete('cascade');
//           it can be just one of them at a time either evelop or mortgage
            $table->bigInteger('envelop_id')->unsigned()->nullable();
            $table->foreign('envelop_id')->references('id')->on('envelops')->onDelete('cascade');

            $table->bigInteger('envelop_sub_cat_id')->unsigned()->nullable();
            $table->foreign('envelop_sub_cat_id')->references('id')->on('envelop_sub_categories')->onDelete('cascade');
            
            $table->bigInteger('mortgage_id')->unsigned()->nullable();
            $table->foreign('mortgage_id')->references('id')->on('mortgages')->onDelete('cascade');

            $table->text('envelop_json_detail')->nullable();
            $table->text('mortgage_json_detail')->nullable();
            $table->decimal('in_flow_amount', 22, 3)->default(0);
            $table->decimal('out_flow_amount', 22, 3)->default(0);
            $table->tinyInteger('is_envelop_or_mortgage')->unsigned()->length(1)->default(1); // 1 for envelop, 2 for mortgage
            $table->text('memo')->nullable();
            $table->string('mortgage_name')->nullable();
             $table->date('transaction_date')->default(\DB::raw('CURRENT_DATE'));
            $table->tinyInteger('transaction_status')->unsigned()->length(1)->default(1); // 1 for cleared, 2 for uncleared
            $table->integer('history_id')->unsigned()->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
