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
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ isset($sub_category) ? 'サブカテゴリを編集' : '新しいサブカテゴリ' }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}"><div class="text-tiny">{{trans_lang('home')}}</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <a href="{{ route('admin.sub_categories') }}"><div class="text-tiny">{{trans_lang('sub_category')}}</div></a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">{{ isset($sub_category) ? 'サブカテゴリを編集' : '新しいサブカテゴリ' }}</div>
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

        <div class="wg-box">
            <form class="form-new-product form-style-1" action="{{ isset($subcategory) ? route('update_sub_category', $subcategory->id) : route('add_sub_category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($subcategory))
                    @method('PUT')
                @endif
                
                <fieldset>
                    <div class="body-title">{{trans_lang('select')}}{{trans_lang('category')}}<span class="tf-color-1">*</span></div>
                    <select name="category_id" class="" >
                        <option value="">{{trans_lang('select')}}{{trans_lang('category')}}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($subcategory) && $subcategory->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="name">
                    <div class="body-title">{{trans_lang('sub_category')}}{{trans_lang('name')}} <span class="tf-color-1">*</span></div>
                    <input class="flex-grow" type="text" placeholder="サブカテゴリー名前" name="name" value="{{ old('name', isset($subcategory) ? $subcategory->name : '') }}" >
                </fieldset>
                
                <fieldset>
                    <div class="body-title">{{trans_lang('upload_img')}} <span class="tf-color-1">*</span></div>
                    <div class="upload-image flex-grow">
                        <div class="item up-load">
                            <label class="uploadfile" for="image">
                                <span class="icon">
                                    <i class="icon-upload-cloud"></i>
                                </span>
                                <span class="body-text">{{trans_lang('drop_image')}}<span class="tf-color">{{trans_lang('click_browse')}}</span></span>
                                <input type="file" id="image" name="image" accept="image/*">
                            </label>
                            <p id="file-name" class="mt-2"></p> <!-- Displays selected file name -->
                        </div>

                        <!-- Existing Image -->
                        <div class="mt-2">
                            @if(isset($subcategory) && $subcategory->image)
                                <img id="preview" src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}" width="100" height="100">
                            @else
                                <img id="preview" src="" alt="Image Preview" width="100" height="100" style="display: none;">
                            @endif
                        </div>
                    </div>
                </fieldset>
                
                <div class="bot">
                    <div></div>
                    <button class="tf-button w208" type="submit">{{ isset($subcategory) ? '更新する' : '保存する' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="bottom-page">
    <div class="body-text">Copyright © 2024 Remos. Design with</div>
    <i class="icon-heart"></i>
    <div class="body-text">by <a href="https://themeforest.net/user/themesflat/portfolio">Themesflat</a> All rights reserved.</div>
</div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/zoom.js') }}"></script>
    <script src="{{ asset('assets/admin/js/apexcharts/apexcharts.js') }}"></script>
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