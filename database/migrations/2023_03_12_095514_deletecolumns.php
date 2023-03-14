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
        Schema::table('messages', function (Blueprint $table) {
        $table->dropColumn(['student_id', 'teacher_id', 'send_to_student', 'send_to_teacher']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('student_id');
            $table->integer('teacher_id');
            $table->integer('send_to_student');
            $table->integer('send_to_teacher');
        });
    }
};
