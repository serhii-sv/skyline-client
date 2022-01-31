@extends('adminos.layouts.account')
@section('title')
    Wallets
@endsection

@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('settings.wallets') }}
                        <div class="row">
                            <div class="col-sm-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Payment system details' contenteditable="true">{{ __('Payment system details') }}</editor_block> @else {{ __('Payment system details') }} @endif</h5>
                                    </div>
                                    <div class="card-body">
                                        @include('partials.inform')
                                        <div class="row">
                                            <div class="col-sm-3 tabs-responsive-side">
                                                <div class="nav flex-column nav-pills border-tab nav-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    @forelse($wallets as $wallet)
                                                        <?php
                                                        /** @var \App\Models\Currency $currency */
                                                        $currency = $wallet->currency;
                                                        $walletName = $currency->name;
                                                        if ($currency->code == 'USD') {
                                                            $walletName = 'PerfectMoney / Payeer';
                                                        } elseif ($currency->code == 'UAH') {
                                                            $walletName = 'UAH VISA/MASTERCARD';
                                                        } elseif ($currency->code == 'RUB') {
                                                            $walletName = 'RUB VISA/MC / QIWI';
                                                        } elseif ($currency->code == 'KZT') {
                                                            $walletName = 'KZT VISA/MASTERCARD';
                                                        } elseif ($currency->code == 'EUR') {
                                                            $walletName = 'EUR VISA/MASTERCARD';
                                                        }
                                                        ?>
                                                        <a class="nav-link @if($loop->first) active @endif" id="v-pills-{{ $wallet->id }}-tab" data-bs-toggle="pill" href="#v-pills-{{ $wallet->id }}" role="tab" aria-controls="v-pills-{{ $wallet->id }}">{{ $walletName }}</a>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    @forelse($wallets as $wallet)
                                                        <div class="tab-pane fade @if($loop->first) active show @endif" id="v-pills-{{ $wallet->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $wallet->id }}-tab">

                                                            <form action="{{ route('accountPanel.profile.wallet.details.update') }}" method="post" class="mb-3">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                                <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                                                                <input type="hidden" name="currency_id" value="{{ $wallet->currency->id }}">

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="">
                                                                            <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external {{ $wallet->currency_id }}' contenteditable="true">{{ __('Wallet external '.$wallet->currency_id) }}</editor_block> @else {{ __('Wallet external '.$wallet->currency_id) }} @endif</label>
                                                                            <input class="form-control input-air-primary" type="text" name="external" value="{{ $wallet->external ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                        </div>

                                                                        @if($wallet->currency->code == 'USD')
                                                                            <div style="margin-top:30px;">
                                                                                <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external Payeer' contenteditable="true">{{ __('Wallet Payeer') }}</editor_block> @else {{ __('Wallet external Payeer') }} @endif</label>
                                                                                <input class="form-control input-air-primary" type="text" name="external_payeer" value="{{ $wallet->external_payeer ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                            </div>
                                                                        @endif

                                                                        @if($wallet->currency->code == 'RUB')
                                                                            <div style="margin-top:30px;">
                                                                                <label>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallet external Qiwi' contenteditable="true">{{ __('Wallet Qiwi') }}</editor_block> @else {{ __('Wallet external Qiwi') }} @endif</label>
                                                                                <input class="form-control input-air-primary" type="text" name="external_qiwi" value="{{ $wallet->external_qiwi ?? '' }}" placeholder="" data-bs-original-title="" title="">
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @if($wallet->currency->code == 'USD' || $wallet->currency->code == 'RUB')
                                                                        <div style="clear:both; margin:20px 0 20px 0;"></div>
                                                                    @endif
                                                                    <div class="col align-self-end">
                                                                        <button class="btn btn-success">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Save' contenteditable="true">{{ __('Save') }}</editor_block> @else {{ __('Save') }} @endif</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    @empty
                                                    @endforelse
                                                </div>
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
        $(document).ready(function () {
            $('.card .nav-link').click(function () {
                let hash = $(this).attr('href')
                $('.card .nav-link').removeClass('active');
                $(this).addClass('active');

                $('.tab-pane').removeClass('active show');
                $('.tab-pane[id="' +hash.substring(1) +'"]').addClass('active show');
                return false;
            })
        });
    </script>
@endpush
