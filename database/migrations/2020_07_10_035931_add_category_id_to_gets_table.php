<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToGetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gets', function (Blueprint $table) {
            Schema::table('gets', function (Blueprint $table) {
                $table->foreignId('category_id')->nullable()->after('id');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gets', function (Blueprint $table) {
            Schema::table('gets', function (Blueprint $table) {
                $table->dropColumn('category_id');
            });
        });
    }
}
