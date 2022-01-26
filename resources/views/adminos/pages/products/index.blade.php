@extends('adminos.layouts.account')
@section('title')
    Магазин
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
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            @forelse($products as $product)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="product-grid">
                                        <div class="product-image img-height-8">
                                            <a href="#">
                                                <img class="pic-1" src="{{ $productImage = ($product->image ? \Illuminate\Support\Facades\Storage::disk('do_spaces')->url($product->image) : asset('images/product-default.png')) }}" alt="image">
                                                <img class="pic-2" src="{{ $productImage }}" alt="image">
                                            </a>
                                            <ul class="social-btn">
                                                <li><a href="{{ route('accountPanel.products.show', $product->slug) }}" data-tip="Просмотр"><i class="fa fa-search"></i></a></li>
{{--                                                <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>--}}
                                            </ul>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">
                                                <a href="{{ route('accountPanel.products.show', $product->slug) }}">
                                                    {!! $product->title !!}
                                                </a>
                                            </h3>
                                            <div class="price">${{ $product->price }}
{{--                                                <span>$10.00</span>--}}
                                            </div>
{{--                                            <a class="add-to-cart btn btn-danger text-white" href="">+ Add To Cart</a>--}}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center align-items-center w-100">
                             <span class="font-weight-bold" style="font-size: 30px">
                                 @if(canEditLang() && checkRequestOnEdit())
                                     <editor_block data-name='Продуктов нет' contenteditable="true">{{ __('Продуктов нет') }}</editor_block>
                                 @else
                                     {{ __('Продуктов нет') }}
                                 @endif
                            </span>
                                </div>
                            @endforelse
                        </div>
                        {{ $products->links() }}
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection
