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
        Schema::create('leaders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('designation_id');
            $table->boolean('is_active');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('user_id')->references("id")->on('users')->onDelete('CASCADE');
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaders');
    }
};
