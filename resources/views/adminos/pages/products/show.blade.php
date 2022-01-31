@extends('adminos.layouts.account')
@section('title')
    Products
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('adminos/css/ecommerce/ecommerce.css') }}">
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('shop.show', $product) }}
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Product detail page start -->
                                        <div class="card product-detail-page">
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-5">
                                                        <div class="port_details_all_img row">
                                                            <div class="col-lg-12 m-b-15">
                                                                <div id="big_banner">
                                                                    <div class="port_big_img">
                                                                        <img class="img img-responsive" src="{{ $product->image ? \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($product->image) : asset('images/product-default.png') }}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-7 product-detail" id="product-detail-1">
                                                        <div class="row">
                                                            <div>
                                                                <div class="col-lg-12">
                                                                    <h3>{!! $product->title !!}</h3>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <h3 class="text-primary">
                                                                        <i class="fa fa-dollar"></i> {{ $product->price }}
                                                                    </h3>
                                                                    <hr>
                                                                    {!! $product->description !!}
                                                                    <hr>
                                                                </div>
                                                                <div class="row p-3">
                                                                    <div class="col-xl-12 text-center p-0">
                                                                        <a href="{{ route('accountPanel.products.buy', $product->slug) }}" class="btn btn-success m-r-10" type="button" title=""> <i class="fa fa-shopping-cart me-1"></i>
                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Buy Now' contenteditable="true">{{ __('Buy Now') }}</editor_block>
                                                                            @else
                                                                                {{ __('Buy Now') }}
                                                                            @endif
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product detail page end -->
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
