<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('get_tag', function (Blueprint $table) {
            $table->foreignId('get_id')->constrained('gets');
            $table->foreignId('tag_id')->constrained('tags');
            $table->primary(['get_id', 'tag_id']);

            // $table->foreign('get_id')->references('id')->on('gets')->onDelete('cascade');
            // $table->foreign('tag_id')->references('id')->on('gets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_tag');
    }
}
