<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {

            $table->id();

            // Relasi ke tabel users
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Relasi ke tabel equipments
            // sebelumnya otomatis mencari "equipment" sehingga error
            $table->foreignId('equipment_id')
                  ->constrained('equipments')
                  ->onDelete('cascade');

            $table->date('borrow_date');

            $table->date('return_date');

            $table->enum('status', [
                'dipinjam',
                'dikembalikan'
            ])->default('dipinjam');

            $table->timestamps();

        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};