@extends('adminos.layouts.account')
@section('title')
    Create deposit
@endsection
@push('styles')
    <style>
        .wrapper th, .wrapper td {
            text-align: center;
            vertical-align: middle !important;
        }

        .wrapper .nav-tabs {
            display: flex;
            justify-content: center;
        }

        .transaction-header h5 {
            text-align: center !important;
        }

        .rate-min-max-block {
            height: 100%;
        }


        .sub-title {
            display: grid !important;
        }

        @media screen and (max-width: 620px) {
            .pricing-simple .pl-5 {
                padding-left: unset !important;
            }

            .pricing-simple .pr-5 {
                padding-right: unset !important;
            }

            .table-responsive {
                max-width: 99%;
            }

            .rate-min-max-block {
                height: auto;
            }
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('deposits.create') }}
                        <div class="row">
                                @if(!empty($rates))
{{--                                    @forelse($deposit_groups as $group)--}}
{{--                                            <div class="row">--}}
                                                <div class="col-lg-12">
                                                    @include('partials.inform')
                                                </div>
                                                @forelse($rates as $item)
                                                    {{--                                                            @if($item->rate_group_id == $group->id)--}}
                                                    <div class="col-xl-12 col-sm-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form action="{{ route('accountPanel.deposits.store') }}" class="create-deposit-form  d-flex justify-content-center" method="post">
                                                                    <input type="hidden" name="rate_id" value="{{ $item->id }}">
                                                                    @csrf
                                                                    <div class="text-center pricing-simple w-100">
                                                                        <div class="pl-5 pr-5">
                                                                            <h3 style="color: green">
                                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                                    <editor_block data-name='{{ $item->name }}' contenteditable="true">{{ __($item->name) }}</editor_block>
                                                                                @else
                                                                                    {{ $item->name }}
                                                                                @endif
                                                                            </h3>
                                                                            <div class="row mt-5">
                                                                                @if($item->image)
                                                                                    <div class="col-lg-4">
                                                                                        <img class="mt-3 p-relative" height="300" width="auto" src="{{ asset($item->image) }}">
                                                                                    </div>
                                                                                @endif
                                                                                <div class="{{ $item->image ? 'col-lg-4' : 'col-lg-6' }}">
                                                                                    <div class="transaction-footer">
                                                                                        <div class="mt-3" style="text-align: center;">
                                                                                            <h6 class="mb-2" style="color:green; text-align:center;">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Choose wallet 2' contenteditable="true">{{ __('Choose wallet 2') }}</editor_block> @else {{ __('Choose wallet 2') }} @endif
                                                                                            </h6>

                                                                                            <select class="form-select form-control-inverse-fill wallet-select form-control" name="wallet_id" data-rate="{{ $item->id }}">
                                                                                                @forelse($wallets as $wallet)
                                                                                                    <option value="{{ $wallet->id }}" class="text-center" data-balance="{{ $wallet->balance }}" data-currency="{{ $wallet->currency_id }}"
                                                                                                            @if(old('wallet_id') == $wallet->id) selected="selected" @endif>
                                                                                                        {{ $wallet->currency->name }} - {{ $wallet->balance }}{{ $wallet->currency->symbol }}
                                                                                                    </option>
                                                                                                @empty
                                                                                                @endforelse
                                                                                            </select>
                                                                                            <div class="mt-3">
                                                                                                 <h6 class="amount" style="text-align:center;color:green;">
                                                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                                                         <editor_block data-name='Лимит открытия:' contenteditable="true">{{ __('Лимит открытия:') }}</editor_block>
                                                                                                     @else
                                                                                                         {{ __('Лимит открытия:') }}
                                                                                                     @endif
                                                                                            </h6>
                                                                                            </div>
                                                                                            <div class="rate-min-max-block text-center mt-1 form-control" data-rate="{{ $item->id }}">
                                                                                                <h5 class="sub-title">
                                                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                                                        <editor_block data-name='Минимум:' contenteditable="true">{!! __('Минимум:') !!}</editor_block>
                                                                                                    @else
                                                                                                        {!! html_entity_decode(__('Минимум:')) !!} {{ number_format($item->min, 2, '.', '') }}$
                                                                                                    @endif
                                                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                                                        <editor_block data-name='Максимум:' contenteditable="true">{!! __('Максимум:') !!}</editor_block>
                                                                                                    @else
                                                                                                            {!! html_entity_decode(__('Максимум:')) !!} {{ number_format($item->max, 2, '.', '') }}$
                                                                                                    @endif
                                                                                                </h5>
                                                                                            </div>
                                                                                            <h6 class="mt-3" style="color:green;">
                                                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='↓ Введите сумму ↓' contenteditable="true">{{ __('↓ Введите сумму ↓') }}</editor_block>
                                                                                                @else
                                                                                                    {{ __('↓ Введите сумму ↓') }}
                                                                                                @endif
                                                                                            </h6>
                                                                                            <div class="input-group">
                                                                                                <input class="form-control text-center" type="number" min="{{ number_format($item->min) }}" max="{{ number_format($item->max) }}" name="amount" value="{{ old('amount') ?? '' }}">
                                                                                                <button type="button" class="btn btn-outline-primary set-max" data-rate_max="{{ $item->max }}">Max</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="{{ $item->image ? 'col-lg-4' : 'col-lg-6' }}">
                                                                                    <div class="transaction-header text-center mt-3 ml-4">
                                                                                        <h6 class="amount mb-3" style="color:green;">
                                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                                <editor_block data-name='Условия инвестирования:' contenteditable="true">{{ __('Условия инвестирования:') }}</editor_block>
                                                                                            @else
                                                                                                {{ __('Условия инвестирования') }}
                                                                                            @endif
                                                                                        </h6>
                                                                                        <span class="title text-center">
                                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                                <h5 style="text-align:left;">
                                                                                                    <editor_block data-name='Daily earnings {{ $item->id }}' contenteditable="true">{!! __('Daily earnings '.$item->id) !!}</editor_block>
                                                                                                </h5>
                                                                                            @else
                                                                                                <h5 style="text-align:left;">
                                                                                                    <span style="text-align:left;" class="date">{!! html_entity_decode(__('Daily earnings '.$item->id)) !!}</span>
                                                                                                </h5>
                                                                                            @endif

                                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                                <h5 style="text-align:left;">
                                                                                                    <editor_block data-name='Duration {{ $item->id }}' contenteditable="true">{!! __('Duration '.$item->id) !!}</editor_block>
                                                                                                </h5>
                                                                                            @else
                                                                                                <h5 style="text-align:left;">
                                                                                                    <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Duration '.$item->id)) !!}</span>
                                                                                                </h5>
                                                                                            @endif

                                                                                        </span>
                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                            <h5 style="text-align:left;">
                                                                                                <editor_block data-name='Daily rate {{ $item->id }}' contenteditable="true">{!! __('Daily rate '.$item->id) !!}</editor_block>
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5 style="text-align:left;">
                                                                                                <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Daily rate '.$item->id)) !!}</span>
                                                                                            </h5>
                                                                                        @endif

                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                            <h5 style="text-align:left;">
                                                                                                <editor_block data-name='Add str {{ $item->id }}' contenteditable="true">{!! __('Add str '.$item->id) !!}</editor_block>
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5 style="text-align:left;">
                                                                                                <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Add str '.$item->id)) !!}</span>
                                                                                            </h5>
                                                                                        @endif

                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                            <h5 style="text-align:left;">
                                                                                                <editor_block data-name='Add str 2 {{ $item->id }}' contenteditable="true">{!! __('Add str 2 '.$item->id) !!}</editor_block>
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5 style="text-align:left;">
                                                                                                <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Add str 2 '.$item->id)) !!}</span>
                                                                                            </h5>
                                                                                        @endif

                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                            <h5 style="text-align:left;">
                                                                                                <editor_block data-name='Add str 3 {{ $item->id }}' contenteditable="true">{!! __('Add str 3 '.$item->id) !!}</editor_block>
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5 style="text-align:left;">
                                                                                                <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Add str 3 '.$item->id)) !!}</span>
                                                                                            </h5>
                                                                                        @endif

                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                            <h5 style="text-align:left;">
                                                                                                <editor_block data-name='Add str 4 {{ $item->id }}' contenteditable="true">{!! __('Add str 4 '.$item->id) !!}</editor_block>
                                                                                            </h5>
                                                                                        @else
                                                                                            <h5 style="text-align:left;">
                                                                                                <span  style="text-align:left;" class="date">{!! html_entity_decode(__('Add str 4 '.$item->id)) !!}</span>
                                                                                            </h5>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-center mb-4 mt-3">
                                                                            <button class="btn btn-outline-success create-deposit-btn w-50" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif >
                                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                                    <editor_block data-name='Invest' contenteditable="true">{{ __('Invest') }}</editor_block>
                                                                                @else
                                                                                    {{ __('Invest') }}
                                                                                @endif
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>

{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-lg-12">--}}
{{--                                                                        <div class="">--}}
                                                                            <div class="table-border-style">
                                                                                <div class="table-responsive">
                                                                                    <table class="table">
                                                                                        <thead class="bg-primary">
                                                                                        <tr>
                                                                                            <th scope="col">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Tariff plan' contenteditable="true">{{ __('Tariff plan') }}</editor_block> @else {{ __('Tariff plan') }} @endif
                                                                                            </th>
                                                                                            <th scope="col">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Currency' contenteditable="true">{{ __('Currency') }}</editor_block> @else {{ __('Currency') }} @endif
                                                                                            </th>
                                                                                            <th scope="col">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Current balance' contenteditable="true">{{ __('Current balance') }}</editor_block> @else {{ __('Current balance') }} @endif
                                                                                            </th>
                                                                                            <th scope="col">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Assessed' contenteditable="true">{{ __('Assessed') }}</editor_block> @else {{ __('Assessed') }} @endif
                                                                                            </th>
                                                                                            <th scope="col">@if(canEditLang() && checkRequestOnEdit())
                                                                                                    <editor_block data-name='Opening date' contenteditable="true">{{ __('Opening date') }}</editor_block> @else {{ __('Opening date') }} @endif
                                                                                            </th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @forelse($deposits->where('rate_id', $item->id) as $deposit)
{{--                                                                                                @if($deposit->rate_id == $item->id)--}}
                                                                                                    <tr style="vertical-align: middle;">
                                                                                                        <td>
                                                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                                                <editor_block data-name='{{ $deposit->rate->name }}' contenteditable="true">{{ __($deposit->rate->name) }}</editor_block>
                                                                                                            @else
                                                                                                                {{ __($deposit->rate->name) }}
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td>{{ $deposit->currency->name }}</td>
                                                                                                        <td>{{ number_format($deposit->balance, $deposit->currency->precision, '.', ',') ?? 0 }} {{ $deposit->currency->symbol }}</td>
                                                                                                        <th scope="col">
                                                                                                            @if($deposit->rate->daily <= 0)
                                                                                                                @php($perDay = ($deposit->invested / 100 * $deposit->overall) / $deposit->duration)
                                                                                                                {{ round(\Carbon\Carbon::parse($deposit->created_at)->diffInDays(now()) * $perDay, $deposit->currency->precision)  }}{{ $deposit->currency->symbol }}
                                                                                                            @else
                                                                                                                {{number_format($deposit->total_assessed(), $deposit->currency->precision, '.', ',') ?? 0 }} {{ $deposit->currency->symbol }}
                                                                                                            @endif
                                                                                                        </th>
                                                                                                        <td>{{ $deposit->created_at->format('d-m-Y H:i') }}</td>
                                                                                                    </tr>
                                                                                                    <tr >
                                                                                                        <td colspan="4" style="border-top: unset">
                                                                                                            @if($deposit->rate->reinvest)
                                                                                                                <form action="{{ route('accountPanel.deposits.set.reinvest') }}" method="post">
                                                                                                                    @csrf
                                                                                                                    <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                                                                                                    <label class="col-md-12 col-form-label sm-left-text" for="u-range-{{ $deposit->id }}">@if(canEditLang() && checkRequestOnEdit())
                                                                                                                            <editor_block data-name='Настройте процент автоматического реинвестирования прибыли' contenteditable="true">{{ __('Настройте процент автоматического реинвестирования прибыли') }}</editor_block> @else {{ __('Настройте процент автоматического реинвестирования прибыли') }} @endif
                                                                                                                    </label>
                                                                                                                    <div class="col-md-12 text-center">
                                                                                                                        <input id="u-range-{{ $deposit->id }}" type="hidden" class="irs-hidden-input deposit-range-slider @if(!$deposit->rate->reinvest) disable @endif" tabindex="-1" name="reinvest" readonly="" data-bs-original-title="" title="">
                                                                                                                    </div>
                                                                                                                    <div class="text-center">
                                                                                                                        <button class="btn btn-outline-success btn-sm mt-2 @if(!$deposit->rate->reinvest) disabled @endif" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                                                                                                <editor_block data-name='Apply' contenteditable="true">{{ __('Apply') }}</editor_block> @else {{ __('Apply') }} @endif
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                                @push('scripts')
                                                                                                                    <script>
                                                                                                                        $(document).ready(function () {
                                                                                                                            if ($("#u-range-{{ $deposit->id }}").hasClass('disable')) {
                                                                                                                                $("#u-range-{{ $deposit->id }}").ionRangeSlider({
                                                                                                                                    min: 0,
                                                                                                                                    max: 100,
                                                                                                                                    from: {{ $deposit->reinvest }},
                                                                                                                                    disable: true,
                                                                                                                                    postfix: "%"
                                                                                                                                })
                                                                                                                            } else {
                                                                                                                                $("#u-range-{{ $deposit->id }}").ionRangeSlider({
                                                                                                                                    min: 0,
                                                                                                                                    max: 100,
                                                                                                                                    from: {{ $deposit->reinvest }},
                                                                                                                                    postfix: "%"
                                                                                                                                })
                                                                                                                            }
                                                                                                                        });
                                                                                                                    </script>
                                                                                                                @endpush
                                                                                                            @else
                                                                                                                <strong>недоступно</strong>
                                                                                                            @endif
                                                                                                        </td>
                                                                                                        <td style="border-top: unset">
                                                                                                            @if($deposit->rate->reinvest)
                                                                                                                <form action="{{ route('accountPanel.deposits.add.balance') }}" method="post">
                                                                                                                    @csrf
                                                                                                                    <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                                                                                                    <input type="hidden" name="wallet_id" value="{{ $deposit->wallet->id }}">
                                                                                                                    <div class="text-center mt-2">
                                                                                                                        @if(canEditLang() && checkRequestOnEdit())
                                                                                                                            <editor_block data-name='Balance' contenteditable="true">{{ __('Balance') }}</editor_block> @else {{ __('Balance') }} @endif: {{ $deposit->wallet->balance }} {{ $deposit->currency->symbol }}
                                                                                                                    </div>
                                                                                                                    <div class="text-center mt-2">
                                                                                                                        <input class="form-control input-air-primary" type="text" placeholder="" name="amount" data-bs-original-title="" title="">
                                                                                                                    </div>
                                                                                                                    <div class="d-flex justify-content-between mt-2">
                                                                                                                        <button class="btn btn-outline-success btn-sm mt-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                                                                                                <editor_block data-name='To reinvest' contenteditable="true">{{ __('To reinvest') }}</editor_block> @else {{ __('To reinvest') }} @endif
                                                                                                                        </button>
                                                                                                                        <button type="button" data-deposit_id="{{ $deposit->id }}" class="upgradeButton btn btn-outline-success btn-sm mt-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                                                                                                <editor_block data-name='Upgrade' contenteditable="true">{{ __('Upgrade') }}</editor_block> @else {{ __('Upgrade') }} @endif
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            @else
                                                                                                                <div class="text-center">
                                                                                                                    <button type="button" data-deposit_id="{{ $deposit->id }}" class="upgradeButton btn btn-outline-success btn-sm mt-2" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                                                                                            <editor_block data-name='Upgrade' contenteditable="true">{{ __('Upgrade') }}</editor_block> @else {{ __('Upgrade') }} @endif
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                            @endif
                                                                                                            <form class="upgradeForm" id="{{ $deposit->id }}" action="{{ route('accountPanel.deposits.upgrade') }}" style="position: absolute" method="post">
                                                                                                                @csrf
                                                                                                                <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                                                                                            </form>
                                                                                                        </td>
                                                                                                    </tr>
{{--                                                                                                @endif--}}
                                                                                            @empty
                                                                                                <tr style="vertical-align: middle;">
                                                                                                    <td>---</td>
                                                                                                    <td>---</td>
                                                                                                    <td>---</td>
                                                                                                    <th scope="col">---</th>
                                                                                                    <td>---</td>
                                                                                                </tr>
                                                                                                <tr >
                                                                                                    <td colspan="4" style="border-top: unset">
                                                                                                            <form method="post">
                                                                                                                @csrf
                                                                                                                <label class="col-md-12 col-form-label sm-left-text" for="u-range-{{ $item->id }}">@if(canEditLang() && checkRequestOnEdit())
                                                                                                                        <editor_block data-name='Настройте процент автоматического реинвестирования прибыли' contenteditable="true">{{ __('Настройте процент автоматического реинвестирования прибыли') }}</editor_block> @else {{ __('Настройте процент автоматического реинвестирования прибыли') }} @endif
                                                                                                                </label>
                                                                                                                <div class="col-md-12 text-center">
                                                                                                                    <input id="u-range-{{ $item->id }}" type="hidden" class="irs-hidden-input deposit-range-slider disable" tabindex="-1" name="reinvest" readonly="" data-bs-original-title="" title="">
                                                                                                                </div>
                                                                                                            </form>
                                                                                                            @push('scripts')
                                                                                                                <script>
                                                                                                                    $(document).ready(function () {
                                                                                                                        if ($("#u-range-{{ $item->id }}").hasClass('disable')) {
                                                                                                                            $("#u-range-{{ $item->id }}").ionRangeSlider({
                                                                                                                                min: 0,
                                                                                                                                max: 100,
                                                                                                                                from: {{ !in_array($item->name, ['IDO', 'NFT']) ? $item->daily : 100 }},
                                                                                                                                disable: true,
                                                                                                                                postfix: "%"
                                                                                                                            })
                                                                                                                        } else {
                                                                                                                            $("#u-range-{{ $item->id }}").ionRangeSlider({
                                                                                                                                min: 0,
                                                                                                                                max: 100,
                                                                                                                                from: {{ !in_array($item->name, ['IDO', 'NFT']) ? $item->daily : 100 }},
                                                                                                                                postfix: "%"
                                                                                                                            })
                                                                                                                        }
                                                                                                                    });
                                                                                                                </script>
                                                                                                            @endpush
                                                                                                    </td>
                                                                                                    <td style="border-top: unset">
                                                                                                            <form method="post">
                                                                                                                @csrf
                                                                                                                <div class="text-center mt-2">
                                                                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                                                                        <editor_block data-name='Balance' contenteditable="true">{{ __('Balance') }}</editor_block> @else {{ __('Balance') }} @endif: ---
                                                                                                                </div>
                                                                                                                <div class="text-center mt-2">
                                                                                                                    <input class="form-control input-air-primary" type="text" placeholder="" name="amount" data-bs-original-title="" title="">
                                                                                                                </div>
                                                                                                            </form>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforelse
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                            @endif--}}
                                                @empty
                                                @endforelse
{{--                                            </div>--}}
{{--                                    @empty--}}
{{--                                    @endforelse--}}
                                @endif
                        </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/vendors/range-slider.css') }}">
    <script src="{{ asset('accountPanel/js/range-slider/ion.rangeSlider.min.js') }}"></script>
    <script src="{{ asset('accountPanel/js/range-slider/rangeslider-script.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.upgradeButton').click(function () {
                $('#' + $(this).data('deposit_id')).submit();
            });

            $(".create-deposit-btn").on('click', function (e) {
                e.preventDefault();
                swal({
                    title: "Вы подтверждаете?",
                    text: "С вашего баланса будут списаны денежные средства!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            //create-deposit-form
                            $(this).closest('form').submit();
                            swal("Подождите немного!", {
                                icon: "success",
                            });
                        }
                    });
            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $(".range-slider").each(function (i, el) {
                if ($(el).hasClass('disable')) {
                    $(el).ionRangeSlider({
                        min: 0,
                        max: 100,
                        from: 0,
                        disable: true,
                        postfix: "%"
                    })
                } else {
                    $(el).ionRangeSlider({
                        min: 0,
                        max: 100,
                        from: 0,
                        postfix: "%"
                    })
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {

            // $('input[type="number"]').on('keyup', function () {
            //     if ($(this).val() > $(this).attr('max') * 1) {
            //         $(this).val($(this).attr('max'));
            //     }
            //
            //     if ($(this).val() < $(this).attr('min') * 1) {
            //         $(this).val($(this).attr('min'));
            //     }
            // });
            $(".wallet-select").on('change', function () {
                var $rate_id = $(this).attr('data-rate');
                var $currency_id = $(this).find('option:selected').attr('data-currency');
                var $url = "{{ route('ajax.get.rate.min.max') }}";
                $(".rate-min-max-block[data-rate='" + $rate_id + "']").html('<div class="loader-box" style="height: 24px">' +
                    '<div class="loader-15"></div>' +
                    '</div>');
                $.ajax({
                    url: $url,
                    method: 'post',
                    data: 'rate_id=' + $rate_id + '&currency_id=' + $currency_id,
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        var $data = $.parseJSON(data);

                        let min = $data['rate_min'];
                        let max = $data['rate_max'];

                        let input = $(this).closest('.transaction-footer').find('input');

                        $(input).attr('min', min);
                        $(input).attr('max', max);

                        $(input).val(null);

                        $(this).closest('.transaction-footer').find('.set-max').data('rate_max', max)

                        $(".rate-min-max-block[data-rate='" + $rate_id + "']").html($data['rate_min_max']);

                    }
                });

            });

            $('.set-max').click(function () {
                let rate_max = parseFloat($(this).data('rate_max'));

                console.log(rate_max)

                let balance = parseFloat($(this).closest('.transaction-footer').find('.wallet-select option:selected').data('balance'));

                let max;

                if (rate_max < balance) {
                    max = rate_max
                } else {
                    max = balance;
                }

                $(this).closest('.transaction-footer').find('input').val(max)
            })
        });
    </script>
@endpush
