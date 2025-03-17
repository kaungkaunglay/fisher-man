@if($isActive)
    <section class="page {{ $extraClass }}" id="{{ $id }}" data-step="{{ $step }}">
        {{ $slot }}
    </section>
@endif