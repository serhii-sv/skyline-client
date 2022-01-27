@extends('adminos.layouts.account')
@section('title')
    Exchange currency
@endsection
@push('scripts')
    <style>
        .currency-exchange-label {
            margin-bottom: 15px;
            font-size: 20px;
        }

        .currency-exchange {
            width: 350px;
            max-width: 100%;
            display: block;
            cursor: pointer;
            padding: 10px 15px;
            margin-bottom: 5px;
            border: 1px solid #ececec;
        }
        .currency-exchange-radio{
            position: absolute;
            opacity: 0;
            width: 1px;
            height: 1px;
            left: -9999px;
        }
        .currency-exchange-radio:checked + .currency-exchange {
            background: #ececec;
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
                        <div class="row second-chart-list third-news-update justify-content-center">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mt-3">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Sprint Token rate' contenteditable="true">{{ __('Sprint Token rate') }}</editor_block> @else {{ __('Sprint Token rate') }} @endif
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-widget13"></div>
                                    </div>
                                </div>

                                <div class="col-xl-12 risk-col xl-100 box-col-12">
                                    <div class="card total-users">
                                        <div class="card-header card-no-border">
                                            <h5 class="text-center mt-3">@if(canEditLang() && checkRequestOnEdit())
                                                    <editor_block data-name='Currency exchange' contenteditable="true">{{ __('Currency exchange') }}</editor_block> @else {{ __('Currency exchange') }} @endif
                                            </h5>
                                            <h6 class="font-primary text-center mb-0 mt-3">@if(canEditLang() && checkRequestOnEdit())
                                                    <editor_block data-name='Commission 1 $' contenteditable="true">{{ __('Commission 1 $') }}</editor_block> @else {{ __('Commission 1 $') }} @endif
                                            </h6>
                                            <div class="text-center mt-4">
                                                @include('partials.inform')
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="apex-chart-container goal-status text-center ">
                                                <form action="{{ route('accountPanel.currency.exchange') }}" method="post" class="row">
                                                    @csrf
                                                    <div class="rate-card col-xl-12">
                                                        <div class="goal-end-point">
                                                            <div class="row">
                                                                <div class="col-lg-6 pr-lg-5">
                                                                    <div class="mb-2 d-flex align-items-center flex-column">
                                                                        <div class="currency-exchange-label col-form-label">@if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Choose the first wallet' contenteditable="true">{{ __('Choose the first wallet') }}</editor_block> @else {{ __('Choose the first wallet') }} @endif
                                                                        </div>
                                                                        @forelse($wallets as $wallet)
                                                                            <input class="currency-exchange-radio wallet_from" type="radio" id="wal1{{ $wallet->id }}" name="wallet_from" value="{{ $wallet->id }}">
                                                                            <label class="currency-exchange exchange-first-wallet" for="wal1{{ $wallet->id }}" data-id="{{ $wallet->id }}" data-prefix="{{ $wallet->currency->symbol }}" data-step="{{ $wallet->currency->precision }}" data-max="{{ $wallet->balance }}">
                                                                                {{ $wallet->currency->name ?? '' }} - {{ $wallet->balance ?? '' }} {{ $wallet->currency->symbol ?? '' }}
                                                                            </label>
                                                                        @empty
                                                                            <div>Кошельки отсутствуют</div>
                                                                        @endforelse
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg pl-lg-5">
                                                                    <div class="mb-2 d-flex flex-column align-items-center">
                                                                        <div class="currency-exchange-label col-form-label">@if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Choose a second wallet' contenteditable="true">{{ __('Choose a second wallet') }}</editor_block> @else {{ __('Choose a second wallet') }} @endif
                                                                        </div>
                                                                        @forelse($wallets as $wallet)
                                                                            <input class="currency-exchange-radio wallet_to" type="radio" id="wal2{{ $wallet->id }}" name="wallet_to" value="{{ $wallet->id }}">
                                                                            <label class="currency-exchange exchange-second-wallet" for="wal2{{ $wallet->id }}" data-id="{{ $wallet->id }}" data-prefix="{{ $wallet->currency->symbol }}" data-step="{{ $wallet->currency->precision }}" data-max="{{ $wallet->balance }}">
                                                                                {{ $wallet->currency->name ?? '' }} - {{ $wallet->balance ?? '' }} {{ $wallet->currency->symbol ?? '' }}
                                                                            </label>
                                                                        @empty
                                                                            <div>Кошельки отсутствуют</div>
                                                                        @endforelse
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row w-100 pl-5">
                                                        <div class="col col-lg-12">
                                                            <div class="row" style="margin-top:50px;">
                                                                <div class="col-lg-4">
                                                                    <div class="form-group row">
                                                                        <div class="col">
                                                                            <label class="form-label">@if(canEditLang() && checkRequestOnEdit())
                                                                                    <editor_block data-name='How much do you want to exchange?' contenteditable="true">{{ __('How much do you want to exchange?') }}</editor_block> @else {{ __('How much do you want to exchange?') }} @endif
                                                                            </label>
                                                                            <div class="input-group mb-3">
                                                                                <input class="form-control" type="text" id="exchangeAmount" name="amount" value="{{ old('amount') ?? '' }}" placeholder="0.1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group row">
                                                                        <div class="col">
                                                                            <label class="form-label">КУРС</label>
                                                                            <div class="input-group mb-3">
                                                                                <input class="form-control" type="text" id="rate" value="" placeholder="0.1" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group row">
                                                                        <div class="col">
                                                                            <label class="form-label">Вы получаете</label>
                                                                            <div class="input-group mb-3">
                                                                                <input class="form-control" type="text" id="toAmount" value="" placeholder="0.1" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="text-align: center;">
                                                                <button class="btn btn-gradient-primary btn-rounded btn-block">@if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Exchange' contenteditable="true">{{ __('Exchange') }}</editor_block> @else {{ __('Exchange') }} @endif
                                                                </button>
                                                            </div>
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

@push('scripts')
    <script>
        var primary = localStorage.getItem("primary") || '#7366ff';
        var secondary = localStorage.getItem("secondary") || '#f73164';

        window.CubaAdminConfig = {
            // Theme Primary Color
            primary: primary,
            // theme secondary color
            secondary: secondary,
        };
    </script>
    <script src="{{ asset('accountPanel/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('accountPanel/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('accountPanel/js/chart/apex-chart/chart-custom.js') }}"></script>
    @if($exchange_rate_log)
        <script>
            $(document).ready(function () {
                $('#exchangeAmount').keyup(function(){
                    var val = $(this).val();
                    var from = $('.wallet_from:checked').val();
                    var to = $('.wallet_to:checked').val();

                    $.ajax({
                        type:'GET',
                        url:'/get_exchange_rate',
                        data:'amount='+val+'&wallet_from='+from+'&wallet_to='+to,
                        success:function(resp){
                            $('#toAmount').val(resp.amount.toFixed(8));
                            $('#rate').val(resp.rate.toFixed(8));
                        },
                    });
                });

                $('.wallet_from').click(function(){
                    $('#exchangeAmount').keyup();
                });

                $('.wallet_to').click(function(){
                    $('#exchangeAmount').keyup();
                });

                // browser-candlestick chart
                var optionscandlestickchart = {
                    chart: {
                        toolbar: {
                            show: false
                        },
                        height: 500,
                        type: 'candlestick',
                    },
                    plotOptions: {
                        candlestick: {
                            colors: {
                                upward: CubaAdminConfig.primary,
                                downward: CubaAdminConfig.secondary
                            }
                        }
                    },
                    fill: {
                        opacity: 0.9,
                        colors: ['#7366ff'],
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: true,
                            format: 'HH:mm:ss',
                            formatter: undefined,
                        },
                    },
                    series: [{
                        data: [@foreach($exchange_rate_log as $item){
                            x: new Date({{ $item->date }}000),
                            y: [{{ $item->old_rate }}, {{ $item->old_rate > $item->new_rate ? $item->old_rate : $item->new_rate }}, {{ $item->old_rate < $item->new_rate ? $item->old_rate : $item->new_rate }}, {{ $item->new_rate }}]
                        },
                            @endforeach
                        ]
                    }],
                    title: {
                        text: 'last 40',
                        align: 'left'
                    },
                    xaxis: {
                        type: 'datetime',
                        labels: {
                            show: true,
                            datetimeFormatter: {
                                year: 'yyyy',
                                month: "MMM 'yy",
                                day: 'dd MMM',
                                hour: 'HH:mm',
                            },
                        }
                    },
                    yaxis: {
                        tooltip: {
                            enabled: true
                        }
                    }
                }

                var chartcandlestickchart = new ApexCharts(
                    document.querySelector("#chart-widget13"),
                    optionscandlestickchart
                );
                chartcandlestickchart.render();
            });
        </script>
    @endif
@endpush
