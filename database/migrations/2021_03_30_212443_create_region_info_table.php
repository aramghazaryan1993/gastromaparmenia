<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region_info_name_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('region_info_name_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('region_info_text_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->text('region_info_text_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('region_info_search_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('region_info_search_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
             $table->integer('region_id')->nullable();
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
        Schema::dropIfExists('region_info');
    }
}
