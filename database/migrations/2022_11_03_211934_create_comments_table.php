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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('likes');
            $table->longText('body');
            $table->dateTime('date_commented');
            $table->timestamps();

            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            #foreign key post_id OR page_id (polymorphic)
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
};
