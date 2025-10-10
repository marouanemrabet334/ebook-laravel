<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('ebook_name_ar');
            $table->string('ebook_img');
            $table->unsignedBigInteger('media_count')->default(0);
            $table->string('ebook_img_url');
            $table->integer('author_id');
            $table->integer('pages');
            $table->string('lang_ebook');
            $table->string('short_descp_ar');
            $table->text('long_descp_ar');
            $table->string('pdf_from_url');
            $table->integer('hot_deals')->default(0);
            $table->integer('featured_slider')->default(0);
            $table->integer('special_offer')->default(0);
            $table->integer('soon')->default(0);
            $table->integer('status')->default(0);
            $table->integer('free')->default(0);
            $table->string('rating')->nullable();
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
        Schema::dropIfExists('ebooks');
    }
};
