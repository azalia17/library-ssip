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
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('book_id');
            $table->string('staff_id');
            $table->string('stud_id');
            $table->timestamp('borrow_date')->useCurrent();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->foreign('book_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade');
            $table->foreign('staff_id')
                ->references('id')
                ->on('staffs')
                ->onDelete('cascade');
            $table->foreign('stud_id')
                ->references('stud_id')
                ->on('students')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowed_books');
    }
};
