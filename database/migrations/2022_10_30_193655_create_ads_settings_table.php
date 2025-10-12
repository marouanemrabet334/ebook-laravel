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
            $table->string('start_app_account_id')->nullable();
            $table->string('android_app_id')->nullable();
            $table->string('ios_app_id')->nullable();
            $table->string('admob_reward')->nullable();
            $table->string('banner')->nullable();
            $table->string('interstitial')->nullable();
            $table->integer('unity_live_mode')->default(0);
            $table->string('unity_game_id')->nullable();
            $table->string('unity_banner')->nullable();
            $table->string('unity_interstitial')->nullable();
            $table->string('unity_reward')->nullable();
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
