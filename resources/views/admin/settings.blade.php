{{-- @dd($settings) --}}
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
                <h3>{{trans_lang('add_setting')}}</h3>


                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li><a href="{{route('admin.index')}}">
                            <div class="text-tiny">Dashboard</div>
                        </a></li>
                    <li><i class="icon-chevron-right"></i></li>

                    <li>
                        <div class="text-tiny">{{trans_lang('add_setting')}}</div>

                    </li>
                </ul>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- form-add-product -->
            <form class="tf-section-2 form-add-product" action="{{ route('admin.settings.save') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">{{trans_lang('email')}}<span class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('contact_email') is-invalid @enderror" type="email" placeholder=""
                            name="contact_email" value="{{ old('contact_email', $settings['contact_email']) }}">
                        @error('contact_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">{{trans_lang('phone_number')}}<span class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('contact_phone') is-invalid @enderror" type="text" placeholder=""
                            name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone']) }}">
                        @error('contact_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                    <fieldset class="name">
                        <div class="body-title mb-10">{{trans_lang('address')}} <span class="tf-color-1">*</span></div>
                        <input class="mb-10 @error('contact_address') is-invalid @enderror" type="text" placeholder=""
                            name="contact_address" value="{{ old('contact_address', $settings['contact_address']) }}">
                        @error('contact_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                    <fieldset class="slogan">
                        <div class="body-title mb-10">{{trans_lang('slogan')}}<span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 @error('slogan') is-invalid @enderror" name="slogan" id="" cols="30"
                        rows="10" style="height: 100px !important">{{ old('slogan', $settings['slogan']) }}</textarea>
                        {{-- <input class="mb-10 @error('slogan') is-invalid @enderror" type="text" placeholder="" name="slogan" value="{{ old('slogan', $settings['slogan']) }}"> --}}
                        @error('slogan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                    <fieldset class="policy">
                        <div class="body-title mb-10">{{trans_lang('policy')}} <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 @error('policy') is-invalid @enderror" name="policy" id="" cols="30"
                            rows="10" style="height: 100px !important">{{ old('policy', $settings['policy']) }}</textarea>
                        {{-- <input class="mb-10 @error('policy') is-invalid @enderror" type="text" placeholder="" name="policy" value="{{ old('policy', $settings['policy']) }}"> --}}
                        @error('policy')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </fieldset>
                    {{-- <fieldset class="name">
                    <div class="body-title mb-10">ロゴ <span class="tf-color-1">*</span></div>
                    <input type="file" name="logo" id="" class="mb-10" required>
                </fieldset> --}}

                </div>

                <div class="wg-box">
                    <fieldset>
                        <div class="body-title mb-10">ロゴ</div>
                        <div class="upload-image mb-16">
                            <div class="item">
                                @if (isset($settings['logo']) &&
                                        $settings['logo'] &&
                                        file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
                                    <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}"
                                        alt="{{ $settings['logo'] }}">
                                @else
                                    <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}"
                                        alt="{{ $settings['logo'] }}">
                                @endif
                            </div>
                            <div class="item up-load">
                                <label class="uploadfile" for="logo">
                                    <span class="icon"><i class="icon-upload-cloud"></i></span>
                                    <span class="text-tiny">{{trans_lang('drop_image')}} <span class="tf-color">{{trans_lang('click_browse')}}</span></span>
                                    <input type="file" id="logo" name="logo"
                                        class="@error('logo') is-invalid @enderror">
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </label>
                            </div>
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Banner Image</div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="file-input-container">
                                        <div class="drop-zone" id="dropZone">
                                            <span>Choose Banner Images</span>
                                            <input type="file" id="image-upload" name="site_banner_images[]" class="custom-file-input d-none"  multiple>
                                           
                                        </div>
                                    </div>
                                    <div class="image-preview" id="image-preview">
                                        @if(isset($settings['site_banner_images']))
                                            @foreach(json_decode($settings['site_banner_images']) as $imageName)
                                                <img src="{{ asset('assets/banner-images/' . $imageName) }}" alt="Banner Image" style="max-width: 150px;">
                                            @endforeach
                                        @endif
                                    </div>
                    </fieldset>

                  
                    {{-- <fieldset>
                        <div class="body-title mb-10">Social Links</div>
                        <div id="social-links">
                            @foreach ($socialLinks as $index => $link)
                                <div class="input-group mb-20">
                                    <input type="text" name="" class="form-control" placeholder="Platform" value="" required>
                                    <input type="text" name="" class="form-control" placeholder="URL" value="" required>
                                    <input type="text" name="" class="form-control" placeholder="Icon" value="" required>
                                    <button type="button" class="btn btn-danger remove-link">Remove</button>
                                </div>
                            @endforeach
                        </div>


                        <button type="button" class="tf-button add-more" id="add-link">Add More <i class="icon-plus"></i></button>

                    </fieldset> --}}
                </div>

                <div class="cols mt-4">
                    <button class="tf-button " type="submit">{{trans_lang('save')}}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="bottom-page">
        <div class="body-text">Copyright © 2025 r-mekiki.com, All rights reserved.</div>
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
    <script src="{{ asset('assets/admin/js/image-uploader.js') }}"></script>

    <script>
        document.getElementById('add-link').addEventListener('click', function () {
            let index = document.querySelectorAll('#social-links .input-group').length;
            let newInput = `
                <div class="input-group mb-20">
                    <input type="text" name="" class="form-control" placeholder="Platform" required>
                    <input type="text" name="" class="form-control" placeholder="URL" required>
                    <input type="text" name="" class="form-control" placeholder="Icon" required>
                    <button type="button" class="btn btn-danger remove-link">Remove</button>
                </div>`;
            document.getElementById('social-links').insertAdjacentHTML('beforeend', newInput);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-link')) {
                e.target.parentElement.remove();
            }
        });
        </script>
@endsection
