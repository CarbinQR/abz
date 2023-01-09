<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', static function (Blueprint $table): void {
            $table->id();
            $table->string('email', 255)->unique();
            $table->string('password_hash', 255);
            $table->string('name', 255);
            $table->string('phone', 255);
            $table->string('photo', 255)->nullable();
            $table->foreignId('position_id')->constrained('positions');
            $table->timestamp('registration_timestamp')->useCurrent();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
