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
        Schema::create('close_accounts', function (Blueprint $table) {

            // Auto-generate ID column
            $table->id();

            // Request columns
            $table->string('date');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->integer('count_2000');
            $table->integer('count_500');
            $table->integer('count_200');
            $table->integer('count_100');
            $table->integer('count_50');
            $table->integer('count_20');
            $table->integer('count_10');
            $table->integer('count_5');
            $table->integer('count_2');
            $table->integer('count_1');
            $table->boolean('soft_delete')->default(0);

            // CreatedAt & UpdatedAt columns
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
        Schema::dropIfExists('close_accounts');
    }
};
