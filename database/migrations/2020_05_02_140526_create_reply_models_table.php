<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->id();
            $table->text('body');

            $table->integer('question_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('question_id')->references('id')->on('questions')
            ->onDelete('cascade');

            $table->timestamps('created_at')->useCurrent();
            $table->timestamps('updated_at')->useCurrent();$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply_models');
    }
}
