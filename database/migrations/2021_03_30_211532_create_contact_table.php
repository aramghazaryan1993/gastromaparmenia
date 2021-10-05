<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adress_am',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('adress_en',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('phone',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('email',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('facebook',250)->charset('utf8')->collate('utf8_bin')->nullable();
            $table->string('instagram',250)->charset('utf8')->collate('utf8_bin')->nullable();
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
        Schema::dropIfExists('contact');
    }
}
