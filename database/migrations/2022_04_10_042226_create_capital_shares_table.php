<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capital_shares', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->unsignedInteger('capital_2021')->nullable();
            $table->unsignedInteger('jan')->nullable();
            $table->unsignedInteger('feb')->nullable();
            $table->unsignedInteger('mar')->nullable();
            $table->unsignedInteger('apr')->nullable();
            $table->unsignedInteger('may')->nullable();
            $table->unsignedInteger('jun')->nullable();
            $table->unsignedInteger('jul')->nullable();
            $table->unsignedInteger('aug')->nullable();
            $table->unsignedInteger('sep')->nullable();
            $table->unsignedInteger('oct')->nullable();
            $table->unsignedInteger('nov')->nullable();
            $table->unsignedInteger('dec')->nullable();
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
        Schema::dropIfExists('capital_shares');
    }
};
