@if(session('status'))
    @if(session('status') == 'success')
        <div class="alert alert-success text-center" role="alert">
            {{ session('message') }}
        </div>
    @elseif(session('status') == 'error')
        <div class="alert alert-danger  text-center" role="alert">
            {{ session('message') }}
        </div>
    @else
        <div class="alert alert-warning  text-center" role="alert">
            {{ session('message') }}
        </div>
    @endif
    {{ session()->forget('status') }}
    {{ session()->forget('message') }}
@endif
