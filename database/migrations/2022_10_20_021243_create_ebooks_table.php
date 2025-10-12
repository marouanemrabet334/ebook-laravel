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
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('subcategory_id')->index();
            $table->unsignedBigInteger('author_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->json('ebook_name');        // store translations as JSON
            $table->string('ebook_img')->nullable();
            $table->string('ebook_img_url')->nullable();
            $table->unsignedSmallInteger('pages')->nullable();
            $table->string('lang_ebook', 10)->default('en');
            $table->json('short_desc');     // store translations as JSON
            $table->json('long_desc');      // store translations as JSON
            $table->string('pdf_from_url')->nullable();
            $table->boolean('hot_deals')->default(false);
            $table->boolean('featured_slider')->default(false);
            $table->boolean('special_offer')->default(false);
            $table->boolean('soon')->default(false);
            $table->boolean('status')->default(true);
            $table->boolean('free')->default(true);
            $table->decimal('rating', 2, 1)->nullable()->checkBetween([0, 5]);
            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('download_count')->default(0);
            $table->date('published_at')->nullable();
            $table->string('publisher')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->softDeletes();
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