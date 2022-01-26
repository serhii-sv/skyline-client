@extends('adminos.layouts.account')
@section('title')
    Магазин
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('adminos/css/ecommerce/ecommerce.css') }}">
    <style>
        .order-box .title-box {
            padding-bottom: 20px;
            color: #444444;
            font-size: 22px;
            border-bottom: 1px solid #ededed;
            margin-bottom: 20px;
        }

        .order-box .title-box .checkbox-title {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .order-box .qty {
            position: relative;
            border-bottom: 1px solid #ededed;
            margin-bottom: 30px;
        }

        .order-box .total {
            position: relative;
            margin-bottom: 30px;
        }

        .checkout .checkout-details .order-place {
            margin-top: 15px;
        }

        .order-box .sub-total li .count {
            width: unset !important;
        }

        .order-box .sub-total li .count {
            position: relative;
            font-size: 18px;
            line-height: 20px;
            font-weight: 400;
            width: 35%;
            float: right;
            text-align: right;
        }

        .wrapper ul {
            padding-left: 0px;
            list-style-type: none;
            margin-bottom: 0;
        }

        .order-box .qty li span {
            float: right;
            font-size: 18px;
            line-height: 20px;
            color: #232323;
            font-weight: 400;
            width: 35%;
            text-align: right;
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            <div class="card w-75">
                                <div class="card-header mt-3">
                                    <h5>
                                        @if(canEditLang() && checkRequestOnEdit())
                                            <editor_block data-name='Детали покупки' contenteditable="true">{{ __('Детали покупки') }}</editor_block>
                                        @else
                                            {{ __('Детали покупки') }}
                                        @endif
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="checkout-details">
                                                <form action="{{ route('accountPanel.products.pay', $product) }}" method="post">
                                                    @csrf
                                                    <div class="order-box">
                                                        <div class="title-box">
                                                            <div class="checkbox-title">
                                                                <h4>
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Продукт' contenteditable="true">{{ __('Продукт') }}</editor_block>
                                                                    @else
                                                                        {{ __('Продукт') }}
                                                                    @endif
                                                                </h4>
                                                                <span>
                                             @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Сумма' contenteditable="true">{{ __('Сумма') }}</editor_block>
                                                                    @else
                                                                        {{ __('Сумма') }}
                                                                    @endif
                                        </span>
                                                            </div>
                                                        </div>
                                                        <ul class="qty">
                                                            <li>{!! $product->title !!} <span>${{ $product->price }}</span></li>
                                                        </ul>
                                                        <ul class="sub-total total">
                                                            <li>
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Валюта' contenteditable="true">{{ __('Валюта') }}</editor_block>
                                                                @else
                                                                    {{ __('Валюта') }}
                                                                @endif
                                                                <span class="count">
                                                <select name="currency_id" class="form-select digits form-control">
                                                    <option selected disabled value="">Выберите валюту для оплаты</option>
                                                    @foreach(\App\Models\Currency::all() as $currency)
                                                        <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                                            </li>
                                                        </ul>
                                                        @include('partials.inform')
                                                        <div class="order-place">
                                                            <button class="btn btn-primary">
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='Place Order' contenteditable="true">{{ __('Place Order') }}</editor_block>
                                                                @else
                                                                    {{ __('Place Order') }}
                                                                @endif
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
