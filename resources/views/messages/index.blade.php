@if(session('status'))
    @if(session('status') == 'success')
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif(session('status') == 'error')
        <div class="alert alert-danger" role="alert">
            {{ session('message') }}
        </div>
    @else
        <div class="alert alert-warning" role="alert">
            {{ session('message') }}
        </div>
    @endif
    {{ session()->forget('status') }}
    {{ session()->forget('message') }}
@endif
