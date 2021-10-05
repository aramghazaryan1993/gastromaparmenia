<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('about_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('about_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('about_text_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('about_text_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
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
        Schema::dropIfExists('about');
    }
}
