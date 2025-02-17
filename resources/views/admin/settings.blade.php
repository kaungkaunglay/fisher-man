@extends('admin.includes.layout')
@section('style')
<!-- Theme Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/animation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
<!-- Font -->
<link rel="stylesheet" href="{{ asset('assets/admin/font/fonts.css') }}">

<!-- Icon -->
<link rel="stylesheet" href="{{ asset('assets/admin/icon/style.css') }}">
@endsection
@section('contents')
{{-- @dd($settings['logo']) --}}
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Add setting</h3>


            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index.html">
                        <div class="text-tiny">Dashboard</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                {{-- <li><a href="#">
                        <div class="text-tiny">Ecommerce</div>
                    </a></li> --}}
                {{-- <li><i class="icon-chevron-right"></i></li> --}}
                <li>
                    <div class="text-tiny">Add setting</div>

                </li>
            </ul>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" action="{{ route('admin.settings.save') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Contact Email<span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('contact_email') is-invalid @enderror" type="email" placeholder="" name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}">
                    @error('contact_email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Contact Phone<span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('contact_phone') is-invalid @enderror" type="text" placeholder="" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}">
                    @error('contact_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </fieldset>
                <fieldset class="name">
                    <div class="body-title mb-10">Contact Address <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('contact_address') is-invalid @enderror" type="text" placeholder="" name="contact_address" value="{{ old('contact_address', $settings['contact_address']) }}">
                    @error('contact_address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </fieldset>
                {{-- <fieldset class="name">
                    <div class="body-title mb-10">Logo <span class="tf-color-1">*</span></div>
                    <input type="file" name="logo" id="" class="mb-10" required>
                </fieldset> --}}

            </div>

            <div class="wg-box">
                <fieldset>
                    <div class="body-title mb-10">Logo</div>
                    <div class="upload-image mb-16">
                        <div class="item">
                            @if(isset($settings['logo']) && $settings['logo'] && file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
                                <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="{{ $settings['logo'] }}">  
                                @else
                                <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" alt="{{ $settings['logo'] }}">  
                            @endif
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="logo">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="text-tiny">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="logo" name="logo" class="@error('logo') is-invalid @enderror" >
                                @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </label>
                        </div>
                    </div>

                </fieldset>
            </div>

            <div class="cols gap10">
                <button class="tf-button " type="submit">Save Settings</button>
                {{-- <a href="" class="tf-button style-2 w-full">Cancel</a> --}}
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<!-- Javascript -->
<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/zoom.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-1.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-2.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-3.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-4.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-5.js') }}"></script>
<script src="{{ asset('assets/admin/js/apexcharts/line-chart-6.js') }}"></script>
<script src="{{ asset('assets/admin/js/switcher.js') }}"></script>
<script src="{{ asset('assets/admin/js/theme-settings.js') }}"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
@endsection
