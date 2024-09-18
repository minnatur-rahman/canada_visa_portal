<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visa_infos', function (Blueprint $table) {
            $table->id();
            // META INFO
            $table->string('status');
            $table->string('image');

            // PERSONAL INFO
            $table->string('surname');
            $table->string('given_name');
            $table->string('sex');
            $table->string('birth_city');
            $table->string('current_nationality');
            $table->date('dob');
            $table->string('body_mark');
            $table->string('nid');

            // COMPANY INFO
            $table->string('company_name');
            $table->string('job_title');
            $table->string('duty_duration');
            $table->string('salary');

            // PASSPORT INFO
            $table->string('passport_number');
            $table->string('issued_country');

            // Applicant's Contact Info
            $table->string('phone');
            $table->string('email');
            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_infos');
    }
};
