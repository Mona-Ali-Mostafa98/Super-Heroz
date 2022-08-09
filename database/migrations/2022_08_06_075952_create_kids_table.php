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
        Schema::create('kids', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->constrained()->onUpdate('cascade')->onDelete('cascade');

            $table->string('kid_name');
            $table->enum('gender', ['ذكر', 'أنثى']);
            $table->date('birth_date');
            $table->string('relative_relation');
            $table->string('home_address');
            $table->enum('is_child_registered_school', ['نعم', 'لا']);
            $table->string('educational_level');

            $table->string('emergency_first_name');
            $table->string('emergency_first_phone');
            $table->string('emergency_first_relation');

            $table->string('emergency_second_name');
            $table->string('emergency_second_phone');
            $table->string('emergency_second_relation');

            $table->enum('kid_suffer_food_allergies', ['نعم', 'لا']);
            $table->text('if_yes_suffer_food_allergens')->nullable();
            $table->enum('kid_suffer_other_type_of_allergy', ['نعم', 'لا']);
            $table->text('if_yes_state_the_type_of_allergy')->nullable();
            $table->enum('use_injection_of_epinephrine', ['نعم', 'لا']); //boolean
            $table->string('medical_report_image')->nullable();
            $table->enum('kid_with_special_needs', ['نعم', 'لا']);
            $table->text('if_yes_special_needs')->nullable();
            $table->text('another_health_symptoms')->nullable();

            $table->string('recent_kid_photo')->nullable();
            $table->string('family_card_image')->nullable();
            $table->string('birth_record_image')->nullable();
            $table->string('vaccination_card_image')->nullable();
            $table->string('other_documents')->nullable();

            $table->boolean('terms')->default(false);
            $table->boolean('images_terms')->default(false);

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
        Schema::dropIfExists('kids');
    }
};
