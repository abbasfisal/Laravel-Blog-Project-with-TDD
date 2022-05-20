<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->foreignId('post_id')
                  ->constrained('posts')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->foreignId('reply_id')
                  ->nullable()
                  ->constrained('comments')
                  ->references('id')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();

            $table->boolean('show')
                  ->default(false);
            $table->string('text');
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
        Schema::dropIfExists('comments');
    }
}
