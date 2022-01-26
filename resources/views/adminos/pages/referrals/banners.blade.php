@extends('adminos.layouts.account')
@section('title')
    Banners
@endsection
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <div class="row second-chart-list third-news-update">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        @forelse($banners as $banner)
                                            <div class="mb-3">
                                                @if($banner->image)
                                                    <img style="max-width: 100%" src="{{ route('get.banner', $banner->id) }}" @if($banner->getWidth()) width="{{ $banner->getWidth() }}" @endif @if( $banner->getHeight()) height="{{  $banner->getHeight() }}" @endif >
                                                @endif
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection
