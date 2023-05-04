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
        Schema::create('bookings', function (Blueprint $table) {

            // Auto-generate ID column
            $table->id();

            // Request columns
            $table->string('booking_invoiceno')->nullable();
            $table->string('customer_name');
            $table->string('phone_number');
            $table->string('whats_app_number');
            $table->string('email_id')->nullable();
            $table->longText('address')->nullable();
            $table->longText('gst_number')->nullable();

            $table->string('male_count');
            $table->string('female_count');
            $table->string('child_count')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('check_in_time')->nullable();
            $table->string('check_out_date')->nullable();
            $table->string('check_out_time')->nullable();

            $table->string('extended_date')->nullable();
            $table->string('extended_time')->nullable();

            $table->string('days')->nullable();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');


            $table->string('proofs');
            $table->string('prooftype_one')->nullable();
            $table->longText('proofimage_one')->nullable();
            $table->string('prooftype_two')->nullable();
            $table->longText('proofimage_two')->nullable();
            $table->longText('customer_photo')->nullable();


            $table->string('total')->nullable();
            $table->string('gst_per')->nullable();
            $table->string('gst_amount')->nullable();
            $table->string('disc_per')->nullable();
            $table->string('disc_amount')->nullable();
            $table->string('additional_amount')->nullable();
            $table->string('additional_notes')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('total_paid')->nullable();
            $table->string('balance_amount')->nullable();

            $table->string('out_date')->nullable();
            $table->string('out_time')->nullable();

            $table->string('check_in_staff')->nullable();
            $table->string('check_out_staff')->nullable();

            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
};
