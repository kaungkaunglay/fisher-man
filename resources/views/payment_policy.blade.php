@extends('includes.layout')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/terms_condition.css') }}" />
@endsection
@section('contents')
    <!-- Breadcrumbs -->
    <section class="mt-4 mb-3">
        <div class="container-custom">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ trans_lang('home') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ trans_lang('payment_policy') }}</li>
                </ol>
            </nav>

        </div>
    </section>
    <!-- ./Breadcrumbs -->

<div class="container-custom mb-5">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">販売価格について</h2>
            <p>各商品の紹介ページに記載している価格とします。</p>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">商品代金以外に必要な料金</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">消費税</li>
                <li class="list-group-item">送料（以下に詳細）</li>
                <li class="list-group-item">3万円以上購入すれば送料無料</li>
            </ul>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">引き渡し時期</h2>
            <p>ご注文から2日以内に発送します。</p>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">お支払い方法とお支払いの時期</h2>
            <p><strong>クレジットカード決済:</strong> ご注文時にお支払いが確定します。</p>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">返品・交換・キャンセルについて</h2>
            <p>商品発送後の返品・交換・キャンセルには、基本的に対応しておりません。<br>
               商品に欠陥がある場合のみ交換が可能ですのでご連絡ください。</p>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">返品期限</h2>
            <p>商品出荷から2日以内にご連絡ください。</p>
        </div>
    </div>
        
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="border-bottom pb-2 mb-3">返品送料</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">商品に欠陥がある場合は、弊社で負担いたします。</li>
                <li class="list-group-item">それ以外は、お客さまのご負担になります。</li>
            </ul>
        </div>
    </div>
</div>
@endsection
