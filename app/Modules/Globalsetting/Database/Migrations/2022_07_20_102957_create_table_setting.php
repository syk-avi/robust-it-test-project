<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name')->nullable();
            $table->string('organisation_logo_1')->nullable();
            $table->string('organisation_logo_2')->nullable();
            $table->string('contact_number_1')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->string('fax_number_1')->nullable();
            $table->string('fax_number_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_np')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('tweeter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('copyright')->nullable();



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
        Schema::dropIfExists('settings');
    }
}
