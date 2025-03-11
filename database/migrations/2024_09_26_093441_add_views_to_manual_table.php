<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->unsignedBigInteger('views')->default(0); // Add a 'views' column with a default value of 0
        });
    }
    
    public function down()
    {
        Schema::table('manuals', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
    
};
