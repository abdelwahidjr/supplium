@extends('layouts.shared')

@section('content')
    <h2><i class="icofont icofont-settings"></i> Settings</h2>

    <div class="media py-3 redial-divider-dashed" style="margin-top: 30px;">
        <a href="#" class="redial-light redial-relative">
            <h5>Notification</h5>
        </a>
        <div style="margin-left: 20px;" class="media-body align-self-center redial-line-height-1_5">
            <a href="#" class="redial-light">
                <label class="switch ">
                    @if($setting->notifications=="on")
                        <input id="checkbox" type="checkbox" checked>
                        <span class="slider round"></span>
                    @else
                        <input id="checkbox" type="checkbox">
                        <span class="slider round"></span>
                    @endif
                </label>
            </a>
        </div>
    </div>
@endsection


@section('extra')

    <script src="{{ asset('js/settings.js') }}"></script>


@endsection
