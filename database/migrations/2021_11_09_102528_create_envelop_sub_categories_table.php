<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvelopSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envelop_sub_categories', function (Blueprint $table) {
            $table->id()->unsigned();
              $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('envelop_id')->unsigned();
            $table->foreign('envelop_id')->references('id')->on('envelops')->onDelete('cascade');
             $table->string('envelop_sub_category_name');
             $table->decimal('total_budget', 22, 3)->default(0);
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
        Schema::dropIfExists('envelop_sub_categories');
    }
}
