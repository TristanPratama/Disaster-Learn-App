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
        Schema::create('pretests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->boolean('answer1');
            $table->boolean('answer2');
            $table->boolean('answer3');
            $table->boolean('answer4');
            $table->boolean('answer5');
            $table->boolean('answer6');
            $table->boolean('answer7');
            $table->boolean('answer8');
            $table->boolean('answer9');
            $table->boolean('answer10');
            $table->boolean('answer11');
            $table->boolean('answer12');
            $table->boolean('answer13');
            $table->boolean('answer14');
            $table->boolean('answer15');
            $table->boolean('answer16');
            $table->boolean('answer17');
            $table->boolean('answer18');
            $table->boolean('answer19');
            $table->boolean('answer20');
            $table->boolean('answer21');
            $table->boolean('answer22');
            $table->boolean('answer23');
            $table->boolean('answer24');
            $table->boolean('answer25');
            $table->boolean('answer26');
            $table->boolean('answer27');
            $table->boolean('answer28');
            $table->boolean('answer29');
            $table->boolean('answer30');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pretests');
    }
};
