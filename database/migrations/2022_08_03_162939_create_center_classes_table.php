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
        Schema::create('center_classes', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string('age');
            $table->string("teacher_name");
            $table->text("image")->nullable();
            $table->enum('status', ['عرض', 'أخفاء'])->default('عرض');
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
        Schema::dropIfExists('center_classes');
    }
};
