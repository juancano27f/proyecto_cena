<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->string('student_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('grade')->nullable();
            $table->string('blood_type')->nullable();
            $table->text('allergies')->nullable();
            $table->string('guardian_document')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_phone')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn([
                'document_type',
                'document_number',
                'student_phone',
                'email',
                'address',
                'city',
                'grade',
                'blood_type',
                'allergies',
                'guardian_document',
                'guardian_email',
                'emergency_contact_name',
                'emergency_contact_phone',
            ]);
        });
    }
};