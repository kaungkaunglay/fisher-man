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
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>{{ isset($product) ? '商品を編集' : '商品を追加' }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index.html">
                        <div class="text-tiny">{{trans_lang('home')}}</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#">
                        <div class="text-tiny">{{trans_lang('ecommerce')}}</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ isset($product) ? '商品を編集' : '商品を追加' }}</div>
                </li>
            </ul>
        </div>
        <!-- Check for validation errors -->
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" action="{{ isset($product) ? route('update_product', $product->id) : route('add_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">{{trans_lang('product')}}{{trans_lang('name')}}<span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('name') is-invalid @enderror" type="text" placeholder="商品名を入力してください" name="name" value="{{ old('name', $product->name ?? '') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="text-tiny">{{trans_lang('limit')}}</div>
                </fieldset>

                <fieldset class="category">
                    <div class="body-title mb-10">{{trans_lang('category')}} <span class="tf-color-1">*</span></div>
                    <div class="select @error('sub_category_id') is-invalid @enderror">
                        <select name="sub_category_id">
                            <option value="">{{trans_lang('select')}}{{trans_lang('category')}}</option>
                            @foreach($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id ?? '') == $subCategory->id ? 'selected' : '' }}>
                                {{ $subCategory->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('sub_category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                </fieldset>

                <fieldset class="product_price">
                    <div class="body-title mb-10">{{trans_lang('price')}} <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('product_price') is-invalid @enderror" type="number" name="product_price" value="{{ old('product_price', $product->product_price ?? '') }}">
                    @error('product_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>

                <fieldset class="product_price">
                    <div class="body-title mb-10">{{trans_lang('special_offer')}}</div>
                    <input class="mb-10 @error('discount') is-invalid @enderror" type="number" name="discount" value="{{ old('discount', $product->discount ?? '') }}">
                    @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>

                <fieldset class="stock">
                    <div class="body-title mb-10">{{trans_lang('quanity')}} <span class="tf-color-1">*</span></div>
                    <input min="1" class="mb-10 @error('stock') is-invalid @enderror" type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}">
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>

                <fieldset class="weight">
                    <div class="body-title mb-10">{{trans_lang('weight')}} (kg) <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('weight') is-invalid @enderror" type="number" name="weight" step="0.01" value="{{ old('weight', $product->weight ?? '') }}">
                    @error('weight')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>

                <fieldset class="size">
                    <div class="body-title mb-10">{{trans_lang('length')}} (cm)<span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('size') is-invalid @enderror" type="number" name="size" step="0.01" value="{{ old('size', $product->size ?? '') }}">
                    @error('size')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">{{trans_lang('description')}}</div>
                    <textarea class="mb-10 @error('description') is-invalid @enderror" name="description" placeholder="説明">{{ old('description', $product->description ?? '') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="text-tiny">{{trans_lang('limit')}}</div>
                </fieldset>
            </div>

            <div class="wg-box">
                <fieldset>
                    <div class="body-title mb-10">{{trans_lang('upload_img')}}</div>
                    <div class="upload-image mb-16">
                        <div class="item">
                            @if(isset($product) && $product->product_image)
                            <img id="preview" src="{{ asset('assets/products/'.$product->product_image) }}" alt="{{ $product->name }}" style="display: block;">
                            @else
                            <img id="preview" src="" alt="Image Preview" style="display: none;">
                            @endif
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="product_image">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="text-tiny">{{trans_lang('drop_image')}} <span class="tf-color">{{trans_lang('click_browse')}}</span></span>
                                <input type="file" class="@error('product_image') is-invalid @enderror" id="product_image" name="product_image" accept="image/*">
                                @error('product_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                            </label>
                            <p id="file-name"></p> <!-- To show the file name -->
                        </div>
                        
                    </div>
                    <div class="body-text">{{trans_lang('add_product_image')}}</div>
                </fieldset>
                <fieldset class="date">
                    <div class="body-title mb-10">{{trans_lang('day_of_caught')}} <span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('day_of_caught') is-invalid @enderror" type="date" name="day_of_caught" step="0.01" value="{{ old('day_of_caught', $product->day_of_caught ?? '') }}">
                    @error('day_of_caught')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>
                <fieldset class="date">
                    <div class="body-title mb-10">{{trans_lang('expire_date')}}<span class="tf-color-1">*</span></div>
                    <input class="mb-10 @error('expiration_date') is-invalid @enderror" type="date" name="expiration_date" step="0.01" value="{{ old('expiration_date', $product->expiration_date ?? '') }}">
                    @error('expiration_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </fieldset>
            </div>

            <input type="hidden" name="user_id" value="{{ auth_helper()->user()->id }}">
            <input type="hidden" name="status" value="pending">

            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">{{ isset($product) ? '商品を更新' : '商品を追加' }}</button>
                <a href="{{ route('admin.products') }}" class="tf-button style-2 w-full">{{trans_lang('cancle')}}</a>
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
<script>
    document.getElementById('product_image').addEventListener('change', function(event) {
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
