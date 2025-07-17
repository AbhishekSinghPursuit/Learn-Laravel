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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('name', 60);
            $table->string('email', 100);
            $table->enum('gender', ["M", "F", "O"]);
            $table->text('address');
            $table->date('dob');
            $table->string('password');
            $table->boolean('status')->default(1);
            $table->integer('age')->default(0); // also add modifiers
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
