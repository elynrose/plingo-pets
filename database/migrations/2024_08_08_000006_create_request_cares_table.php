<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestCaresTable extends Migration
{
    public function up()
    {
        Schema::create('request_cares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zip_code');
            $table->longText('details');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->integer('user_rating')->nullable();
            $table->longText('user_review')->nullable();
            $table->integer('pet_rating')->nullable();
            $table->longText('pet_review')->nullable();
            $table->integer('credits');
            $table->boolean('closed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
