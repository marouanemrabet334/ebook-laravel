<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_ads' => $this->type_ads,
            'start_app_live_mode' => $this->start_app_live_mode,
            'start_app_account_id' => $this->start_app_account_id,
            'android_app_id' => $this->android_app_id,
            'ios_app_id' => $this->ios_app_id,
            'admob_reward' => $this->admob_reward,
            'banner' => $this->banner,
            'interstisial' => $this->interstisial,
            'unity_live_mode' => $this->unity_live_mode,
            'unity_game_id' => $this->unity_game_id,
            'unity_banner' => $this->unity_banner,
            'unity_interstisial' => $this->unity_interstisial,
            'unity_reward' => $this->unity_reward,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-D-m'),
            
        ];
    }
}