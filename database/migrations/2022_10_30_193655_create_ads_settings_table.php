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
        Schema::create('ads_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('type_ads')->default(0);
            $table->integer('start_app_live_mode')->default(0);
            $table->string('start_app_account_id');
            $table->string('android_app_id');
            $table->string('ios_app_id');
            $table->string('admob_reward');
            $table->string('banner');
            $table->string('interstisial');
            $table->integer('unity_live_mode')->default(0);
            $table->string('unity_game_id');
            $table->string('unity_banner');
            $table->string('unity_interstisial');
            $table->string('unity_reward');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('ads_settings');
    }
};