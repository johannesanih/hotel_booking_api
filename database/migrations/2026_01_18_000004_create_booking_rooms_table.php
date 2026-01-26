<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('booking_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained();
            $table->integer('quantity');
            $table->decimal('price_per_night', 10, 2);
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_rooms');
    }
}

?>