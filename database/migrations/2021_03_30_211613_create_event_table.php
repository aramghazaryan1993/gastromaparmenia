<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('event_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('event_text_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('event_text_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('img',250)->charset('utf8')->collate('utf8_bin')->nullable();
            
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
        Schema::dropIfExists('event');
    }
}
