<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_history', function (Blueprint $table) {
            $table->id();
            $table->string('conversation_id')->nullable();
            $table->text('human');
            $table->text('translated_human_text')->nullable();
            $table->text('ai');
            $table->text('translated_ai_text')->nullable();
            $table->integer('prompt_tokens')->default(0)->nullable();
            $table->integer('completion_tokens')->default(0)->nullable();
            $table->integer('total_tokens')->default(0);
            $table->dateTime('expired_date')->nullable();
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
        Schema::dropIfExists('chat_history');
    }
};
