<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('alert_id')->nullable();
            $table->integer('rule_id')->nullable();
            $table->integer('level')->nullable();
            $table->text('description')->nullable();
            $table->string('agent_name')->nullable();
            $table->timestamp('alert_timestamp')->nullable();
            $table->json('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alerts');
    }
};