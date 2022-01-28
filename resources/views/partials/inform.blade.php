@if(session()->has('success'))
    <div class="alert alert-success background-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled text-white"></i>
        </button>
        <strong>@lang(session()->get('success'))</strong>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger background-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="icofont icofont-close-line-circled text-white"></i>
        </button>
        <strong>{{ session()->get('error') }}</strong>
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger background-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled text-white"></i>
            </button>
            <strong>{{ $error }}</strong>
        </div>
    @endforeach
@endif
