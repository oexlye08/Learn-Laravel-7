<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('thumbnail')->nullable();
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->text('body');
            $table->timestamp('edited_at')->nullable();
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
        Schema::dropIfExists('gets');
    }
}
