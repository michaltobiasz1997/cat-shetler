<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shelters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('street');
            $table->string('house');
            $table->string('zipcode')->index('shelter_zipcode');
            $table->string('city')->index('shelter_city');
            $table->string('status')->default('stable');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shelters');
    }
};
