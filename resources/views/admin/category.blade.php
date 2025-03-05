@extends('admin.includes.layout')

@section('style')
    <!-- Theme Style -->
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
<div class="main-content-inner">
    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ isset($category) ? 'カテゴリーの編集' : 'カテゴリーを追加' }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}"><div class="text-tiny">{{trans_lang('category')}}</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ isset($category) ? 'カテゴリーの編集' : 'カテゴリーを追加' }}</div>
                </li>
            </ul>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- new-category -->
        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ isset($category) ? route('update_category', $category->id) : route('add_category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <fieldset class="name">
                    <div class="body-title">{{trans_lang('category')}}{{trans_lang('name')}} <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="カテゴリー名前" name="category_name" value="{{ old('category_name', isset($category) ? $category->category_name : '') }}" >
                </fieldset>
                <fieldset>
                    <div class="body-title">{{trans_lang('uploade_img')}} <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item up-load">
                            <label class="uploadfile" for="image">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">{{trans_lang('drop_image')}} <span class="tf-color">{{trans_lang('click_browse')}}</span></span>
                                <input type="file" id="image" name="image" accept="image/*">
                            </label>
                            <p id="file-name" class="mt-2"></p> <!-- Displays file name -->
                        </div>

                        <!-- Existing Image -->
                        <div class="mt-2">
                            @if(isset($category) && $category->image)
                                <img id="preview" src="{{ asset($category->image) }}" alt="{{ $category->category_name }}" width="100" height="100">
                            @else
                                <img id="preview" src="" alt="Image Preview" width="100" height="100" style="display: none;">
                            @endif
                        </div>
                    </div>
                </fieldset>
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">{{ isset($category) ? '更新する' : '保存する' }}</button>
                </div>
            </form>
        </div>
        <!-- /new-category -->
    </div>
    <!-- /main-content-wrap -->
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
    <script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        const fileNameDisplay = document.getElementById('file-name');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = "block";
            };
            reader.readAsDataURL(file);

            fileNameDisplay.textContent = "Selected file: " + file.name;
        } else {
            preview.style.display = "none";
            fileNameDisplay.textContent = "";
        }
    });
    </script>
@endsection
