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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('letter');
            $table->integer('gender');
            $table->boolean('vote_status')->default(0);
            $table->dateTime('vote_date_time')->nullable();
            $table->foreignId('provider_id')->nullable()->constrained('providers');
            $table->foreignId('section_id')->nullable()->constrained('sections');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
