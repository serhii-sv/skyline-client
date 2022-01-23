@if(!Route::is('login') && !Route::is('user.locked'))
@if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="font-size: 20px;">
        @lang(session()->get('success'))
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert" style="font-size: 20px;">
        @lang(session()->get('error'))
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" style="font-size: 20px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@else
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
@endif
