<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdsSetting;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdsController extends Controller
{
    //

    public function edit()
    {

        $ads = AdsSetting::first();
        return view('admin.ads.edit', compact('ads'));
    }


    public function update(Request $request, string $id)
    {


        $adsSetting = AdsSetting::findOrFail($id);


        $adsSetting->update([
            'type_ads' => $request->type_ads,
            'start_app_live_mode' => $request->start_app_live_mode,
            'start_app_account_id' => $request->start_app_account_id,
            'android_app_id' => $request->android_app_id,
            'ios_app_id' => $request->ios_app_id,
            'admob_reward' => $request->admob_reward,
            'banner' => $request->banner,
            'interstisial' => $request->interstisial,
            'unity_live_mode' => $request->unity_live_mode,
            'unity_game_id' => $request->unity_game_id,
            'unity_banner' => $request->unity_banner,
            'unity_interstisial' => $request->unity_interstisial,
            'unity_reward' => $request->unity_reward,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Ads Setting Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('edit.ads')->with($notification);
        // end Else
    }
}// end method
