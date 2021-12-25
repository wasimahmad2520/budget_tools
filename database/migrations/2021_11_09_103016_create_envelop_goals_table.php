<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use DB;
class CreateEnvelopGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envelop_goals', function (Blueprint $table) {
            $table->id()->unsigned();
            
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('envelop_sub_category_id')->unsigned();
            $table->foreign('envelop_sub_category_id')->references('id')->on('envelop_sub_categories')->onDelete('cascade');
            
            $table->decimal('total_amount', 22, 3)->default(0);
            $table->enum('duration_type', ['weekly', 'monthly','by_date'])->default('weekly');
            $table->string('weekly_value')->nullable();
            $table->string('monthly_value')->nullable();
            $table->date('transaction_date')->default(DB::raw('CURRENT_DATE'));
            $table->tinyInteger('status')->unsigned()->length(1)->default(1);
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
        Schema::dropIfExists('envelop_goals');
    }
}
