<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('caption')->nullable();
            $table->text('intro_text')->nullable();
            $table->text('detail')->nullable();
            $table->text('page_type')->nullable();
            $table->text('page_template')->nullable();
            $table->text('parent_page_id')->nullable();
            $table->string('file_name')->nullable();
            $table->string('featured_image')->nullable();

            $table->string('icon_image')->nullable();
            $table->string('icon_image_caption')->nullable();

            $table->string('page_title')->nullable();
            $table->string('page_keyword')->nullable();
            $table->string('page_description')->nullable();
            $table->string('extra_one')->nullable();
            $table->string('extra_two')->nullable();
            $table->string('extra_three')->nullable();

            $table->string('link')->nullable();
            $table->boolean('sort_order')->default(1);
            $table->boolean('status')->default(1);
            $table->integer('created_by_id');
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
        Schema::dropIfExists('pages');
    }
}
