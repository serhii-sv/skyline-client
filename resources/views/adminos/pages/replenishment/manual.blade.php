@extends('adminos.layouts.account')
@section('title')
    Topup balance details
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('adminos/plugins/jquery.steps/css/jquery.steps.css') }}">
    <!-- Custom CSS Style-->
    <link href="{{ asset('adminos/css/style.css') }}" rel="stylesheet">
    <style>
        .actions a[href='#finish'] {
            display: none;
        }
    </style>
    <style>

        .shake {
            animation: shake 0.82s cubic-bezier(.36, .07, .19, .97) both infinite;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            perspective: 1000px;
        }

        @keyframes shake {
            10%,
            90% {
                transform: translate3d(-1px, 0, 0);
            }
            20%,
            80% {
                transform: translate3d(2px, 0, 0);
            }
            30%,
            50%,
            70% {
                transform: translate3d(-4px, 0, 0);
            }
            40%,
            60% {
                transform: translate3d(4px, 0, 0);
            }
        }

        .item-list-wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .payment-system-radio {
            position: absolute;
            left: -9999px;
            top: -9999px;
            opacity: 0;
            pointer-events: none;
        }

        .payment-system-radio:checked ~ .payment-system-item {
            border: 3px solid #0082ff;
            -webkit-box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.1);
            box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0.1);
        }

        .payment-system-item {
            padding: 15px;
            -webkit-transition: .1s ease;
            -moz-transition: .1s ease;
            -ms-transition: .1s ease;
            -o-transition: .1s ease;
            transition: .1s ease;
            width: 200px;
            height: 220px;
            margin: 15px;
            cursor: pointer;
            /*border: 3px solid #e4e4e4;*/
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .payment-system-item span {
            text-align: center;
        }

        .payment-system-item img {
            width: 100%;
        }

        .last {
            width: 40% !important;
        }

        #basic-forms .actions {
            display: flex;
            justify-content: center;
        }

        #basic-forms .actions a {
            padding: 12px 35px !important;
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
                        <div class="panel-box">
                            <div class="panel-box-content p-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="wizard1">
                                            <section>
                                                <form class="wizard-form" id="basic-forms">
                                                    <h3>
                                                        @if(canEditLang() && checkRequestOnEdit())
                                                            <editor_block data-name='Method of replenishment' contenteditable="true">{{ __('Method of replenishment') }}</editor_block>
                                                        @else {{ __('Method of replenishment') }} @endif
                                                    </h3>
                                                    <fieldset>
                                                        @csrf
                                                        @include('partials.inform')
                                                        @if(!isset($_GET['freekassa']))
                                                            <fieldset>
                                                                @forelse($payment_systems_by_groups as $groupName => $payment_systems)
                                                                    <div class="d-flex justify-content-center">
                                                                        <h4 style="font-weight: bold">
                                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='{{ $groupName }} group' contenteditable="true">{{ __($groupName . ' group') }}</editor_block> @else {{ __($groupName . ' group') }} @endif
                                                                        </h4>
                                                                    </div>
                                                                    <div class="mb-3 item-list-wrapper">
                                                                        @foreach($payment_systems as $item)
                                                                            @if($item->code == 'coinpayments')
                                                                                @foreach($item->currencies()->get() as $currency)
                                                                                    <label class="d-flex flex-column align-items-center justify-content-center replenishment-method-item ml-3" href="next">
                                                                                        <input class="payment-system-radio" type="radio" name="payment_system" value="{{ $item->id }}" data-manual="false" data-name="{{ $currency->name }}">
                                                                                        <div class=" payment-system-item d-flex flex-column align-items-center justify-content-center">
                                                                                            <img src="{{ asset('accountPanel/images/logos/' .  $currency->image ) }}" alt="{{ $currency->image_alt }}" title="{{ $currency->image_title }}">
                                                                                            <span>{{ $currency->name }}</span>
                                                                                        </div>
                                                                                        <input class="payment-system-radio" type="radio" name="currency" value="{{ $currency->id }}">
                                                                                    </label>
                                                                                @endforeach
                                                                            @else
                                                                                <label class="d-flex flex-column align-items-center justify-content-center replenishment-method-item ml-3" href="next">
                                                                                    <input class="payment-system-radio" type="radio" name="payment_system" value="{{ $item->id }}" data-name="{{ $item->code }}" data-manual="true" {{ $id == $item->id ? 'checked' : '' }}>
                                                                                    <div class=" payment-system-item d-flex flex-column align-items-center justify-content-center">
                                                                                        <img src="{{ asset('accountPanel/images/logos/' .  $item->image ) }}" alt="{{ $item->image_alt }}" title="{{ $item->image_title }}">
                                                                                        <span>{{ $item->name }}</span>
                                                                                    </div>
                                                                                </label>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </fieldset>
                                                        @else
                                                            <input class="payment-system-radio form-control" type="radio" name="payment_system" value="{{ \App\Models\PaymentSystem::where('code', 'visa_mastercard')->first()->id ?? '' }}" checked>
                                                        @endif

                                                        <fieldset style="display: {{ isset($_GET['freekassa']) ? 'block' : 'none' }};">
                                                            <div class="text-center mb-3" style="margin-top:50px;">
                                                                <div style="margin-bottom:50px;">
                                                                    <label class="" style="font-size: 20px;">@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Amount bot' contenteditable="true">{{ __('Amount bot') }}</editor_block> @else {{ __('Amount bot') }} @endif</label>
                                                                </div>
                                                                <input class="form-control input-air-primary text-center" type="text" name="amount" style="font-size: 20px; padding: 10px;max-width: 320px;margin:auto;">
                                                            </div>

                                                            <div class="f1-buttons" style="text-align: center;margin-top:50px;">
                                                                @if(!isset($_GET['freekassa']))
                                                                    <button class="btn btn-primary btn-previous" type="button" data-bs-original-title="" title=""  @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif  style="padding:15px 50px 15px 50px; font-size:21px;">@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='Previous' contenteditable="true">{{ __('Previous') }}</editor_block> @else {{ __('Previous') }} @endif
                                                                    </button>
                                                                @endif
                                                                <button class="btn btn-outline-primary btn-submit" id="next" type="submit" data-bs-original-title="" title=""  @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif  style="padding:15px 50px 15px 50px; font-size:21px;">@if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='vnesti' contenteditable="true">{{ __('vnesti') }}</editor_block> @else {{ __('vnesti') }} @endif
                                                                </button>
                                                            </div>
                                                        </fieldset>
                                                    </fieldset>
                                                    @if(!isset($_GET['freekassa']))
                                                        <h3>
                                                            @if(canEditLang() && checkRequestOnEdit())
                                                                <editor_block data-name='ПОДТВЕРЖДЕНИЕ ПЛАТЕЖА ЧЕРЕЗ' contenteditable="true">{{ __('ПОДТВЕРЖДЕНИЕ ПЛАТЕЖА ЧЕРЕЗ') }}</editor_block>
                                                            @else {{ __('ПОДТВЕРЖДЕНИЕ ПЛАТЕЖА ЧЕРЕЗ') }} @endif {{ $paymentSystem !== null ? $paymentSystem->name : '' }}
                                                        </h3>
                                                        <fieldset>
{{--                                                            @if(session('language') == 'ru')--}}
{{--                                                                <div style="width:80%; margin-left:10%;margin-top: 30px">--}}
{{--                                                                    <iframe style="margin:0px 0 20px 0; width:100%;" height="450" src="https://www.youtube.com/embed/7yjpnmEebj4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
{{--                                                                </div>--}}
{{--                                                            @endif--}}

                                                            <div class="card-body" style="text-align: left; margin-left:10%;">
                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 1' contenteditable="true">{{ __('Replenishment text 1') }}</editor_block> @else {{ __('Replenishment text 1') }} @endif
                                                                </p>

                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 2' contenteditable="true">{{ __('Replenishment text 2') }}</editor_block> @else {{ __('Replenishment text 2') }} @endif
                                                                </p>

                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 3' contenteditable="true">{{ __('Replenishment text 3') }}</editor_block> @else {{ __('Replenishment text 3') }} @endif
                                                                </p>

                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 4' contenteditable="true">{{ __('Replenishment text 4') }}</editor_block> @else {{ __('Replenishment text 4') }} @endif
                                                                </p>

                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 5' contenteditable="true">{{ __('Replenishment text 5') }}</editor_block> @else {{ __('Replenishment text 5') }} @endif
                                                                </p>

                                                                <p style="font-size:21px !important;">
                                                                    @if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Replenishment text 6' contenteditable="true">{{ __('Replenishment text 6') }}</editor_block> @else {{ __('Replenishment text 6') }} @endif
                                                                </p>
                                                            </div>

                                                            <div class="f1-buttons" style="text-align: center;margin-top:50px;margin-bottom: 50px;">
                                                                <button class="btn btn-outline-primary btn-previous" type="button"  @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @else onClick="location.assign('https://t.me/skyline_invest')" @endif   style="padding:15px 50px 15px 50px; font-size:21px;">@if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='Previous 2' contenteditable="true">{{ __('Previous 2') }}</editor_block> @else {{ __('Previous 2') }} @endif
                                                                </button>
                                                                @if($paymentSystem->code == 'visa_mastercard' || $paymentSystem->code == 'sberbank' || $paymentSystem->code == 'alfabank' || $paymentSystem->code == 'tinkoff' || $paymentSystem->code == 'vtb' || $paymentSystem->code == 'qiwi' || $paymentSystem->code == 'yoomoney')
                                                                    <button class="btn btn-outline-primary btn-submit" id="pay"  @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @else onClick="location.assign('{{ route('accountPanel.replenishment') }}?freekassa=true')" @endif  type="button" data-bs-original-title="" title=""  style="margin-left:30px;padding:15px 50px 15px 50px; font-size:21px;">@if(canEditLang() && checkRequestOnEdit())
                                                                            <editor_block data-name='vnesti auto' contenteditable="true">{{ __('vnesti auto') }}</editor_block> @else {{ __('vnesti auto') }} @endif
                                                                    </button>
                                                                    <br><br>
                                                                @endif
                                                                <button class="btn btn-outline-primary btn-submit" id="next"  @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @else onClick="location.assign('https://jivo.chat/U0b5KmvmMP')" @endif type="submit" data-bs-original-title="" title=""  style="margin-left:30px;padding:15px 50px 15px 50px; font-size:21px;">@if(canEditLang() && checkRequestOnEdit())
                                                                        <editor_block data-name='vnesti 2' contenteditable="true">{{ __('vnesti 2') }}</editor_block> @else {{ __('vnesti 2') }} @endif
                                                                </button>
                                                            </div>
                                                        </fieldset>
                                                    @endif
                                                </form>
                                            </section>
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
        $(function () {
            $('a[href="#next"]').on('click', function (e) {
                $('.spinner-wrapper').show()
            });
        })
    </script>
    <script src="{{ asset('adminos/plugins/jquery.steps/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('adminos/js/pages-js/forms-wizard-validation/form-wizard.js') }}"></script>
    <script>
        $(function () {
            $('a[href="#next"]').click();
        })

        $(document).ready(function () {
            $(".replenishment-method-item").on('click', function () {
                $("input[name='currency']").each(function (i,el) {
                    $(el).prop('checked', false).removeAttr('checked');
                });
                $(this).find("input[name='currency']").prop('checked', true).attr('checked', 'checked');

                $([document.documentElement, document.body]).animate({
                    scrollTop: $(this).offset().top - 150
                }, 1);
            });
            $(".btn-previous").on('click', function (e) {
                var paySystem = $("input[name='payment_system']:checked").attr('data-name');
                $('#payName').html("");
            });
            $('a[href="#next"]').on('click', function (e) {

                var paySystem = $("input[name='payment_system']:checked").attr('data-name');
                $('#payName').html(paySystem);



                var manual = $("input[name='payment_system']:checked").attr('data-manual');
                if (manual == 'true'){
                    var $id = $("input[name='payment_system']:checked").val();
                    // $(".item-list-wrapper").empty().html('<div class="loader-box" style="height: 24px; margin: 50px auto 30px">' +
                    //     '<div class="loader-3"></div>' +
                    //     '</div>');
                    // $(".f1-buttons").hide();
                    if ($id !== '{{ $id }}') {
                        var $url = "{{ route('accountPanel.replenishment.manual') }}/" + $id;
                        location.href = $url;
                    }
                }

            });
        });
    </script>
@endpush

