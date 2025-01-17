<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageLogsTable extends Migration
{
    public function up()
    {
        Schema::create('message_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('message');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
