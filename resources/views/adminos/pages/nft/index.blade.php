@extends('adminos.layouts.account')
@section('title')
    Nft
@endsection
@push('scripts')
    <style>
        .item .body-small.main-category {
            color: #6a6f85;
            margin-top: 8px;
            margin-bottom: 16px;
        }
        .item .body-small {
            color: #1b1e2b;
        }
        .body-small {
            line-height: 24px;
            font-size: 16px;
            font-weight: 300;
            color: #262a3e;
        }

        .illustration img {
            width: 80px !important;
            height: 80px !important;
        }

        .item.card h4 {
            color: #262a3e;
            font-size: inherit;
            font-weight: inherit;
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('shop') }}

                        <div class="row">
                            @foreach($items as $item)
                                <div class="col-lg-4">
                                    <div class="item card card-grey d-flex justify-content-center align-items-center" style="height: 450px; width: 320px; margin-left: 0px;">
                                        <div class="illustration mb-4">
                                            <img src="{{ asset($item->image) }}" alt="" width="192" height="192">
                                        </div>
                                        <h4>
                                             {{ $item->name }}
                                        </h4>
                                        <div class="body-small main-category mb-3" style="margin-top: 0px;">
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Название NFT' contenteditable="true">{{ __('Название NFT') }}</editor_block>
                                            @else
                                                {{ __('Название NFT') }}
                                            @endif
                                        </div>
                                        <h4>
                                            {{ number_format($item->price, 2, '.', '') }}$
                                        </h4>
                                        <div class="body-small main-category mb-3" style="margin-top: 0px;">
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Цена NFT' contenteditable="true">{{ __('Цена NFT') }}</editor_block>
                                            @else
                                                {{ __('Цена NFT') }}
                                            @endif
                                        </div>
                                        <h4>
                                            {{ number_format($item->profit, 2, '.', '') }}%
                                        </h4>
                                        <div class="body-small main-category mb-3" style="margin-top: 0px;">
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Процент доходности в день' contenteditable="true">{{ __('Процент доходности в день') }}</editor_block>
                                            @else
                                                {{ __('Процент доходности в день') }}
                                            @endif
                                        </div>
                                        <h4>
                                            {{ $item->deposit_period }}
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='дней' contenteditable="true">{{ __('дней') }}</editor_block>
                                            @else
                                                {{ __('дней') }}
                                            @endif
                                        </h4>
                                        <div class="body-small main-category mb-3" style="margin-top: 0px;">
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name='Период инвестирования' contenteditable="true">{{ __('Период инвестирования') }}</editor_block>
                                            @else
                                                {{ __('Период инвестирования') }}
                                            @endif
                                        </div>
                                        <div class="mt-3 d-flex justify-content-center">
                                            <a class="btn btn-outline-primary" href="{{ $item->link }}">
                                                @if(canEditLang() && checkRequestOnEdit())
                                                    <editor_block data-name='Ссылка на NFT' contenteditable="true">{{ __('Ссылка на NFT') }}</editor_block>
                                                @else
                                                    {{ __('Ссылка на NFT') }}
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('scripts')

@endpush
