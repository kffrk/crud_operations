@if(session('success'))
    <div class="alert alert-success custom-alert" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger custom-alert" role="alert">
        {{ session('danger') }}
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info custom-alert" role="alert">
        {{ session('danger') }}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning custom-alert" role="alert">
        {{ session('danger') }}
    </div>
@endif
