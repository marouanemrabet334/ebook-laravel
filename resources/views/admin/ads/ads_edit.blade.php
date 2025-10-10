@extends('admin.admin_master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <h4 class="page-title">Edit Ads</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">
                <h4 class="header-title">Edit Ads</h4>

                <form action="{{ route('ads.update', $ads->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $ads->id }}">
                    <br>
                    <div class="form-group">
                        <h5>Ads Current <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="type_ads" class="form-control" required="">

                                @if ($ads->type_ads == 1)
                                    <option value="1">Admob</option>
                                @elseif ($ads->type_ads == 2)
                                    <option value="2">Start App Ads</option>
                                @elseif ($ads->type_ads == 3)
                                    <option value="3">Unity Ads</option>
                                @endif

                            </select>
                            @error('type_ads')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <h5>Ads Type Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="type_ads" class="form-control" required="">
                                <option value="" selected="" disabled="">
                                    Select Type Of Ads</option>
                                <option value="1">Admob</option>
                                <option value="2">Start App Ads</option>
                                <option value="3">Unity Ads</option>

                            </select>
                            @error('type_ads')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_4" name="start_app_live_mode" value="1"
                                    {{ $ads->start_app_live_mode == 1 ? 'checked' : '' }}>
                                <label for="checkbox_4">Start App Live Mode</label>
                            </fieldset>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Start App Account Id<span class="text-danger">*</span></label>
                                <input type="text" name="start_app_account_id" class="form-control"
                                    value="{{ $ads->start_app_account_id }}">
                                @error('start_app_account_id')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Andoid App Id<span class="text-danger">*</span></label>
                                <input type="text" name="android_app_id" class="form-control"
                                    value="{{ $ads->android_app_id }}">

                                @error('android_app_id')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ios App Id<span class="text-danger">*</span></label>
                                <input type="text" name="ios_app_id" class="form-control" value="{{ $ads->ios_app_id }}">
                                @error('ios_app_id')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Admob Rewarded<span class="text-danger">*</span></label>
                                <input type="text" name="admob_reward" class="form-control"
                                    value="{{ $ads->admob_reward }}">
                                @error('admob_reward')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Admob Banner<span class="text-danger">*</span></label>
                                <input type="text" name="banner" class="form-control" value="{{ $ads->banner }}">
                                @error('banner')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Admob Intertitial<span class="text-danger">*</span></label>
                                <input type="text" name="interstisial" class="form-control"
                                    value="{{ $ads->interstisial }}">
                                @error('interstisial')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>



                    <div class="form-group">
                        <div class="controls">
                            <fieldset>
                                <input type="checkbox" id="checkbox_4" name="unity_live_mode" value="1"
                                    {{ $ads->unity_live_mode == 1 ? 'checked' : '' }}>
                                <label for="checkbox_6">Unity Live Mode</label>
                            </fieldset>

                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unity Game Id<span class="text-danger">*</span></label>
                                <input type="text" name="unity_game_id" class="form-control"
                                    value="{{ $ads->unity_game_id }}">
                                @error('unity_game_id')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Unityt Banner<span class="text-danger">*</span></label>
                                <input type="text" name="unity_banner" class="form-control"
                                    value="{{ $ads->unity_banner }}">
                                @error('unity_banner')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Unity Intertitial<span class="text-danger">*</span></label>
                                <input type="text" name="unity_interstisial" class="form-control"
                                    value="{{ $ads->unity_interstisial }}">
                                @error('unity_interstisial')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Unity Intertitial<span class="text-danger">*</span></label>
                                <input type="text" name="unity_reward" class="form-control"
                                    value="{{ $ads->unity_reward }}">
                                @error('unity_reward')
                                    <span class="text-danger">

                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Update
                        </button>

                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
    </div> <!-- end row -->
@endsection
