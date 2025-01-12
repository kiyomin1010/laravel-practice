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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // id : BIGINT, PRIMARY KEY, NOT NULL, AUTO INCREMENT
            $table->string('title'); // title : VARCHAR(255)
            $table->text('description'); // description 칼럼 : TEXT
            $table->text('long_description')->nullable(); // long_description : TEXT, NULLABLE
            $table->boolean('completed')->default(false); // completed : TINYINT
            $table->timestamps(); // created_at , updated_at : TIMESTAMP, NULLABLE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
