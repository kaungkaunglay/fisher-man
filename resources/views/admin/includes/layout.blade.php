@php
    $user = \App\Models\Users::select('users.*','roles.name as role_name')
                ->join('user_roles','user_roles.user_id','=','users.id')
                ->join('roles','roles.id','=','user_roles.role_id')
                ->where('users.id',auth_helper()->user()->id)
                ->first();
@endphp
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2025 01:48:33 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Fisherman Admin</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Theme Style -->
    @yield('style')

    <!-- custom-css -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/custom.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('assets/images/Logo only.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/images/Logo only.png')}}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
           <div class="layout-wrap">
                <!-- preload -->
                {{-- <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div> --}}
                <!-- /preload -->
                <!-- section-menu-left -->
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{route('admin.index')}}" id="site-logo-inner">
                            @if (file_exists(public_path('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value'))))
              <img src="{{ asset('assets/logos/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" id="logo_header" class="logo" alt="logo" style="width: 120px">
              @else
              <img src="{{ asset('assets/images/' . \App\Models\Setting::where('key', 'logo')->value('value')) }}" id="logo_header" class="logo" alt="logo" style="width: 120px">
              @endif
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('home')}}</div>
                                <li class="menu-item">
                                    <a href="{{route('admin.index')}}" class="{{ request()->is('admin') ? 'active' : '' }}">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">{{trans_lang('dashboard')}}</div>
                                    </a>
                                    <a href="{{ route('home')}}" >
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">{{trans_lang('home')}}</div>
                                    </a>
                                </li>
                            </div>
                            @if (check_role(2))
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('product_management')}}</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children {{ request()->is('admin/product*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-shopping-cart"></i></div>
                                            <div class="text">{{trans_lang('all_products')}}</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{route('create_product')}}" class="{{ request()->is('admin/products/create') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('add_product')}}</div>
                                                </a>
                                            </li>

                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.products')}}" class="{{ request()->is('admin/products') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('all_products')}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item has-children {{ request()->is('admin/categ*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-layers"></i></div>
                                            <div class="text">{{trans_lang('category')}}</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.categories')}}" class="{{request()->is('admin/categories') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('all_category')}}</div>
                                                </a>
                                            </li>
                                                <li class="sub-menu-item">
                                                    <a href="{{route('create_category')}}" class="{{request()->is('admin/categories/create') ? 'active' : ''}}">
                                                        <div class="text">{{trans_lang('add_category')}}</div>
                                                    </a>
                                                </li>

                                        </ul>
                                    </li>
                                    <li class="menu-item has-children {{ request()->is('admin/sub_categ*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-layers"></i></div>
                                            <div class="text">{{trans_lang('sub_category')}}</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.sub_categories')}}" class="{{request()->is('admin/sub-categories') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('all_sub_category')}}</div>
                                                </a>
                                            </li>

                                            <li class="sub-menu-item">
                                                <a href="{{route('create_sub_category')}}" class="{{request()->is('admin/sub-categories/create') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('add_sub_category')}}</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    {{-- <li class="menu-item has-children {{ request()->is('admin/order*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-file-plus"></i></div>
                                            <div class="text">{{trans_lang('order')}}</div>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.orders')}}" class="{{request()->is('admin/orders') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('order_list')}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                </ul>
                            </div>
                            @endif


                            @if (check_role(1))
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('buyer_management')}}</div>

                                <ul class="menu-list">
                                    <li class="menu-item has-children {{ request()->is('admin/request*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-user"></i></div>
                                            <div class="text">{{trans_lang('user_request')}}</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.users.contact')}}" class="{{request()->is('admin/request-contact') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('contact')}}</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.users.wishList')}}" class="{{request()->is('admin/request-wishList') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('wishlist')}}</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="menu-item has-children {{ request()->is('admin/user*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-user"></i></div>
                                            <div class="text">{{trans_lang('user_management')}}</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.users')}}" class="{{request()->is('admin/users') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('user_list')}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            
                            </div>
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('manage_shop')}}</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children {{ request()->is('admin/shop*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="bi bi-shop"></i></div>
                                            <div class="text">{{trans_lang('shop_list')}}</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.shops.approved')}}" class="{{request()->is('admin/shops/approved-shops') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('shops')}}</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.shops.pending')}}" class="{{ request()->is('admin/shops/pending-shops') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('request_shops')}}</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.shops.rejected')}}" class="{{ request()->is('admin/shops/rejected-shops') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('rejected_shops')}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('manage_faqs')}}</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children {{ request()->is('admin/faq*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <i class="bi bi-headset fs-3"></i>
                                            <div class="text">{{trans_lang('faqs')}}</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.faqs')}}" class="{{request()->is('admin/faqs') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('all_faqs')}}</div>
                                                </a>
                                            </li>
                                            <li class="sub-menu-item">
                                                <a href="{{route('create_faq')}}" class="{{ request()->is('admin/faq/create') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('add_faq')}}</div>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="center-item">
                                <div class="center-heading">{{trans_lang('manage_system_data')}} Data</div>
                                <ul class="menu-list">
                                    <li class="menu-item has-children {{ request()->is('admin/setting*') ? 'active' : '' }}">
                                        <a href="javascript:void(0);" class="menu-item-button">
                                            <div class="icon"><i class="icon-settings"></i></div>
                                            <div class="text">{{trans_lang('system_data')}}</div>
                                        </a>
                                        <ul class="sub-menu" style="display: block;">
                                            <li class="sub-menu-item">
                                                <a href="{{route('admin.settings')}}" class="{{request()->is('admin/settings') ? 'active' : ''}}">
                                                    <div class="text">{{trans_lang('all_system_data')}}</div>
                                                </a>
                                            </li>
                                            {{-- <li class="sub-menu-item">
                                                <a href="{{route('create_faq')}}" class="{{ request()->is('admin/faq') ? 'active' : '' }}">
                                                    <div class="text">{{trans_lang('add_faq')}}</div>
                                                </a>
                                            </li> --}}

                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            @endif


                        </div>

                    </div>
                </div>
                <!-- /section-menu-left -->
                <!-- section-content-right -->
                <div class="section-content-right">
                    <!-- header-dashboard -->
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index.html">
                                    <img class="" id="logo_header_mobile" alt="" style="height: 50px" src="{{asset('assets/admin/images/logo.png')}}" data-light="{{asset('assets/admin/images/logo.png')}}" data-dark="{{asset('assets/admin/images/logo.png')}}" data-width="100px" data-height="52px" data-retina="{{asset('assets/admin/images/logo.png')}}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="ここで検索。。。" class="show-search" name="name" tabindex="2" value="" aria-required="true" required="">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search" id="box-content-search">
                                        <ul class="mb-24">
                                            <li class="mb-14">
                                                <div class="body-title">Top selling product</div>
                                            </li>
                                            <li class="mb-14">
                                                <div class="divider"></div>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/17.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Dog Food Rachael Ray Nutrish®</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/18.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Natural Dog Food Healthy Dog Food</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/19.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Freshpet Healthy Dog Food and Cat</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="">
                                            <li class="mb-14">
                                                <div class="body-title">Order product</div>
                                            </li>
                                            <li class="mb-14">
                                                <div class="divider"></div>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/20.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Sojos Crunchy Natural Grain Free...</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/21.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Kristin Watson</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14 mb-10">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/22.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Mega Pumpkin Bone</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="mb-10">
                                                        <div class="divider"></div>
                                                    </li>
                                                    <li class="product-item gap14">
                                                        <div class="image no-bg">
                                                            <img src="{{asset('assets/admin/images/products/23.png')}}" alt="">
                                                        </div>
                                                        <div class="flex items-center justify-between gap20 flex-grow">
                                                            <div class="name">
                                                                <a href="product-list.html" class="body-text">Mega Pumpkin Bone</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="header-grid">
                                {{-- <div class="header-item country">
                                    <select class="image-select no-text">
                                        <option data-thumbnail="{{asset('assets/admin/images/country/1.png')}}">ENG</option>
                                        <option data-thumbnail="{{asset('assets/admin/images/country/9.png')}}">JAP</option>
                                    </select>
                                </div> --}}
                                <div class="header-item button-dark-light">
                                    <i class="icon-moon"></i>
                                </div>
                                {{-- <div class="popup-wrap noti type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1" >
                                            <li>
                                                <h6>Message</h6>
                                            </li>
                                            <li>
                                                <div class="noti-item w-full wg-user">
                                                    <div class="image">
                                                        <img src="{{asset('assets/admin/images/avatar/user-11.png')}}" alt="">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="flex items-center justify-between">
                                                            <a href="#" class="body-title">Cameron Williamson</a>
                                                            <div class="time">10:13 PM</div>
                                                        </div>
                                                        <div class="text-tiny">Hello?</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="noti-item w-full wg-user active">
                                                    <div class="image">
                                                        <img src="{{asset('assets/admin/images/avatar/user-12.png')}}" alt="">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="flex items-center justify-between">
                                                            <a href="#" class="body-title">Ralph Edwards</a>
                                                            <div class="time">10:13 PM</div>
                                                        </div>
                                                        <div class="text-tiny">Are you there?  interested i this...</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="noti-item w-full wg-user active">
                                                    <div class="image">
                                                        <img src="{{asset('assets/admin/images/avatar/user-13.png')}}" alt="">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="flex items-center justify-between">
                                                            <a href="#" class="body-title">Eleanor Pena</a>
                                                            <div class="time">10:13 PM</div>
                                                        </div>
                                                        <div class="text-tiny">Interested in this loads?</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="noti-item w-full wg-user active">
                                                    <div class="image">
                                                        <img src="{{asset('assets/admin/images/avatar/user-11.png')}}" alt="">
                                                    </div>
                                                    <div class="flex-grow">
                                                        <div class="flex items-center justify-between">
                                                            <a href="#" class="body-title">Jane Cooper</a>
                                                            <div class="time">10:13 PM</div>
                                                        </div>
                                                        <div class="text-tiny">Okay...Do we have a deal?</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="#" class="tf-button w-full">View all</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                {{-- <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">1</span>
                                                <i class="icon-message-square"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2" >
                                            <li>
                                                <h6>Notifications</h6>
                                            </li>
                                            <li>
                                                <div class="message-item item-1">
                                                    <div class="image">
                                                        <i class="icon-noti-1"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Discount available</div>
                                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-2">
                                                    <div class="image">
                                                        <i class="icon-noti-2"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Account has been verified</div>
                                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus et</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-3">
                                                    <div class="image">
                                                        <i class="icon-noti-3"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Order shipped successfully</div>
                                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin sollicitudin</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="message-item item-4">
                                                    <div class="image">
                                                        <i class="icon-noti-4"></i>
                                                    </div>
                                                    <div>
                                                        <div class="body-title-2">Order pending: <span>ID 305830</span></div>
                                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="#" class="tf-button w-full">View all</a></li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="header-item button-zoom-maximize">
                                    <div class="">
                                        <i class="icon-maximize"></i>
                                    </div>
                                </div>
                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ auth_helper()->getAvatar() }}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{auth_helper()->user()->username}}</span>
                                                    <span class="text-tiny">{{$user->role_name}}</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                                            <li>
                                                <a href="#" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-user"></i>
                                                    </div>
                                                    <div class="body-title-2">{{auth_helper()->user()->username}}</div>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="{{route('admin.logout')}}" class="user-item">
                                                    <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">{{trans_lang('logout')}}</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /header-dashboard -->
                    <!-- main-content -->
                    <div class="main-content">
                        @yield('contents')

                        <!-- bottom-page -->
                        <div class="bottom-page">
                            <div class="body-text">Copyright © <?php echo date('Y') ?> r-mekiki.com, All rights reserved.</div>
                        </div>
                        <!-- /bottom-page -->
                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->
    <script>
        var logoDark = "{{ asset('assets/admin/images/logo.png') }}";
        var logoLight = "{{ asset('assets/admin/images/logo.png') }}";

    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!-- Javascript -->
    @yield('script')

</body>


<!-- Mirrored from themesflat.co/html/remos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jan 2025 01:49:25 GMT -->
</html>
