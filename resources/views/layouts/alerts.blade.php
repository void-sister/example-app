@if ($message = session()->get('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = session()->get('error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = session()->get('warning'))
    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($message = session()->get('info'))
    <div class="sufee-alert alert with-close alert-info alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if ($errors->any())
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
{{--        TODO--}}
        Please check the form below for errors
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
