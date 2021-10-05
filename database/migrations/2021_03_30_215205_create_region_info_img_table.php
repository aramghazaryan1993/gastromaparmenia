<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionInfoImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_info_img', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('region_info_img',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('region_info_type',250)->charset('utf8')->collate('utf8_bin')->nullable();
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
        Schema::dropIfExists('region_info_img');
    }
}
