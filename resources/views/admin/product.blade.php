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
            <h3>{{ isset($product) ? 'Edit Product' : 'Add Product' }}</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li><a href="index.html">
                        <div class="text-tiny">Dashboard</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li><a href="#">
                        <div class="text-tiny">Ecommerce</div>
                    </a></li>
                <li><i class="icon-chevron-right"></i></li>
                <li>
                    <div class="text-tiny">{{ isset($product) ? 'Edit Product' : 'Add Product' }}</div>
                </li>
            </ul>
        </div>
        <!-- Check for validation errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- form-add-product -->
        <form class="tf-section-2 form-add-product" action="{{ isset($product) ? route('update_product', $product->id) : route('add_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif

            <div class="wg-box">
                <fieldset class="name">
                    <div class="body-title mb-10">Product Name <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="text" placeholder="Enter product name" name="name" value="{{ old('name', $product->name ?? '') }}">
                    <div class="text-tiny">Do not exceed 255 characters when entering the product name.</div>
                </fieldset>

                <fieldset class="category">
                    <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                    <div class="select">
                        <select name="sub_category_id">
                            <option value="">Choose category</option>
                            @foreach($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id ?? '') == $subCategory->id ? 'selected' : '' }}>
                                {{ $subCategory->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </fieldset>

                <fieldset class="product_price">
                    <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" name="product_price" value="{{ old('product_price', $product->product_price ?? '') }}">
                </fieldset>

                <fieldset class="product_price">
                    <div class="body-title mb-10">Discount</div>
                    <input class="mb-10" type="number" name="discount" value="{{ old('discount', $product->discount ?? '') }}">
                </fieldset>

                <fieldset class="stock">
                    <div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}">
                </fieldset>

                <fieldset class="weight">
                    <div class="body-title mb-10">Weight (kg) <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" name="weight" step="0.01" value="{{ old('weight', $product->weight ?? '') }}">
                </fieldset>

                <fieldset class="size">
                    <div class="body-title mb-10">Size <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="number" name="size" step="0.01" value="{{ old('size', $product->size ?? '') }}">
                </fieldset>

                <fieldset class="description">
                    <div class="body-title mb-10">Description</div>
                    <textarea class="mb-10" name="description" placeholder="Description">{{ old('description', $product->description ?? '') }}</textarea>
                    <div class="text-tiny">Do not exceed 255 characters when entering the product description.</div>
                </fieldset>
            </div>

            <div class="wg-box">
                <fieldset>
                    <div class="body-title mb-10">Upload Image</div>
                    <div class="upload-image mb-16">
                        <div class="item">
                            @if(isset($product) && $product->product_image)
                            <img id="preview" src="{{ asset($product->product_image) }}" alt="{{ $product->name }}" style="display: block;">
                            @else
                            <img id="preview" src="" alt="Image Preview" style="display: none;">
                            @endif
                        </div>
                        <div class="item up-load">
                            <label class="uploadfile" for="product_image">
                                <span class="icon"><i class="icon-upload-cloud"></i></span>
                                <span class="text-tiny">Drop your image here or select <span class="tf-color">click to browse</span></span>
                                <input type="file" id="product_image" name="product_image" accept="image/*">
                            </label>
                            <p id="file-name"></p> <!-- To show the file name -->
                        </div>
                    </div>
                    <div class="body-text">Add a product image. The quality and background standards should be maintained.</div>
                </fieldset>
                <fieldset class="date">
                    <div class="body-title mb-10">Day of Caught <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="date" name="day_of_caught" step="0.01" value="{{ old('day_of_caught', $product->day_of_caught ?? '') }}">
                </fieldset>
                <fieldset class="date">
                    <div class="body-title mb-10">Expiration Date <span class="tf-color-1">*</span></div>
                    <input class="mb-10" type="date" name="expiration_date" step="0.01" value="{{ old('expiration_date', $product->expiration_date ?? '') }}">
                </fieldset>
            </div>

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            <div class="cols gap10">
                <button class="tf-button w-full" type="submit">{{ isset($product) ? 'Update Product' : 'Add Product' }}</button>
                <a href="{{ route('admin.products') }}" class="tf-button style-2 w-full">Cancel</a>
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
