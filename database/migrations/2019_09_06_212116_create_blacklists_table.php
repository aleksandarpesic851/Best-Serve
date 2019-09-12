<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlacklistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('blacklists');

        Schema::create('blacklists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('avatar')->nullable();
            $table->string('full_name')->nullable();
            $table->string('business')->nullable();
            $table->date('birthday')->nullable();
            $table->string('nationality')->nullable();
            $table->string('national_id_card_no')->nullable();
            $table->string('social_security_no')->nullable();
            $table->string('country_residence')->nullable();
            $table->string('zip_code')->nullable();
            $table->longText('content')->nullable();

            $table->string('surname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('othername')->nullable();
            $table->string('maidenname')->nullable();
            $table->string('city_birth')->nullable();
            $table->string('country_birth')->nullable();
            $table->string('height')->nullable();
            $table->string('color_eye')->nullable();
            $table->string('color_hair')->nullable();
            $table->string('visible_peculiarity')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('profession')->nullable();
            $table->string('city_residence')->nullable();
            $table->string('surburb')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('telephone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no')->nullable();
            $table->unsignedInteger('created_by');

            $table->string('content_files')->nullable();
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
        Schema::dropIfExists('blacklists');
    }
}
