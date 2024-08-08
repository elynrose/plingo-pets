<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRequestCaresTable extends Migration
{
    public function up()
    {
        Schema::table('request_cares', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->foreign('pet_id', 'pet_fk_10010119')->references('id')->on('pets');
            $table->unsignedBigInteger('booked_by_id')->nullable();
            $table->foreign('booked_by_id', 'booked_by_fk_10010075')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_10010169')->references('id')->on('users');
        });
    }
}
