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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable()->comment('Student,Empolyee,Admin');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('religion')->nullable();
            $table->string('id_no')->nullable();
            $table->date('dob')->nullable();
            $table->string('code')->nullable();
            $table->string('role')->nullable()->comment('admin=head of software ,operator=computer operator,user=empolyee');
            $table->date('join_date')->nullable();
            $table->integer('designation_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=inactive 1=active');
            $table->double('salary')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
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
