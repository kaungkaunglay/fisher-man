@extends('includes.layout')

@section('contents')
<x-cart-step class="mt-50" id="complete" step="5">
    <div class="container-custom" style="height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <p class="text-center">
            お支払い処理が完了しました。販売元からメールが届きますので、ご確認下さい。
        </p>
        <div class="d-flex gap-3 py-5 justify-content-center">
            <a href="{{ route('support') }}"
                class="btn btn-outline-primary common-btn">{{ trans_lang('contact_us') }}</a>
            <a href="{{ route('home') }}" class="btn btn-outline-primary common-btn">{{ trans_lang('home') }}</a>
        </div>
    </div>

    {{-- {{ session(['cart_step' => 1])}} --}}
</x-cart-step>
@endsection
