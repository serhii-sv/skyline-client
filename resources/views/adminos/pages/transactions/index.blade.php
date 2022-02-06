@extends('adminos.layouts.account')
@section('title')
    Transactions
@endsection
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/vendors/calendar.css') }}">

    <style>
        .tabs-container .tabs-left>.nav-tabs, .tabs-container .tabs-right>.nav-tabs {
            width: 100% !important;
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('transactions.index') }}
                        <div class="row">
                            <div class="col col-xl-4 box-col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="tabs-container">
                                            <div class="tabs-left">
                                                <ul class="nav nav-tabs mertial-tab-left">
                                                    @forelse($transaction_types as $transaction_type)
                                                        <li class="nav-item">
                                                            <a href="{{ route('accountPanel.transactions', $transaction_type->id) }}"
                                                               @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link @if($transaction_type->id == $type || ($type == null && $loop->iteration == 1)) active @endif" data-toggle="tab">
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='{{ 'locale.' . $transaction_type->name }}' contenteditable="true">{{ __('locale.' . $transaction_type->name) }}</editor_block>
                                                                @else
                                                                    {{ __('locale.' . $transaction_type->name) }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                        <li class="nav-item">
                                                            <a href="{{ route('accountPanel.transactions', 'event-calendar') }}"
                                                               @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link @if('event-calendar' == $type) active @endif" data-toggle="tab">
                                                                @if(canEditLang() && checkRequestOnEdit())
                                                                    <editor_block data-name='{{ 'Календарь Начислений' }}' contenteditable="true">{{ __('Календарь Начислений') }}</editor_block>
                                                                @else
                                                                    {{ __('Календарь Начислений') }}
                                                                @endif
                                                            </a>
                                                        </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-xl-8 box-col-6">
                                @if($type == 'event-calendar')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Calendar page' contenteditable="true">{{ __('Calendar page') }}</editor_block> @else {{ __('Calendar page') }} @endif</h5>
                                                </div>
                                                <div class="card-block row">
                                                    <div class="col-sm-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex event-calendar">
                                                            <div id="lnb">
                                                                <div class="lnb-calendars" id="lnb-calendars">
                                                                    <div class="lnb-calendars-d1" id="calendarList">
                                                                        <div class="lnb-calendars-item">
                                                                            <label style="">
                                                                                <input type="checkbox" class="tui-full-calendar-checkbox-round" value="1" checked="" data-bs-original-title="" title="">
                                                                                <span style="border-color: rgb(158, 95, 255); background-color: rgb(158, 95, 255);"></span>
                                                                                <span>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Accruals' contenteditable="true">{{ __('Accruals') }}</editor_block> @else {{ __('Accruals') }} @endif</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="lnb-calendars-item">
                                                                            <label style=""><input type="checkbox" class="tui-full-calendar-checkbox-round" value="2" checked="" data-bs-original-title="" title="">
                                                                                <span style="border-color: rgb(0, 169, 255); background-color: rgb(0, 169, 255);"></span>
                                                                                <span>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Conclusions' contenteditable="true">{{ __('Conclusions') }}</editor_block> @else {{ __('Conclusions') }} @endif</span>
                                                                            </label>
                                                                        </div>
                                                                        <div class="lnb-calendars-item">
                                                                            <label style=""><input type="checkbox" class="tui-full-calendar-checkbox-round" value="3" checked="" data-bs-original-title="" title="">
                                                                                <span style="border-color: rgb(0, 169, 255); background-color: rgb(0, 169, 255);"></span>
                                                                                <span>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral' contenteditable="true">{{ __('Referral') }}</editor_block> @else {{ __('Referral') }} @endif</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="right">
                                                                <div id="calendar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                <div class="card">
                                    <div class="card-header">
                                        <h5>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Total transactions' contenteditable="true">{{ __('Total transactions') }}</editor_block> @else {{ __('Total transactions') }} @endif: {{ $transactions_count ?? 0 }}</h5>
                                    </div>
                                    <div class="card-block row">
                                        <div class="col-sm-12 col-lg-12 col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="bg-primary">
                                                    <tr>
                                                        <th scope="col">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Transaction type' contenteditable="true">{{ __('Transaction type') }}</editor_block> @else {{ __('Transaction type') }} @endif</th>
                                                        <th scope="col">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Amount' contenteditable="true">{{ __('Amount') }}</editor_block> @else {{ __('Amount') }} @endif</th>
                                                        <th scope="col">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Payment system' contenteditable="true">{{ __('Payment system') }}</editor_block> @else {{ __('Payment system') }} @endif</th>
                                                        <th scope="col">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Status 22' contenteditable="true">{{ __('Status 22') }}</editor_block> @else {{ __('Status 22') }} @endif</th>
                                                        <th scope="col">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Date of operation' contenteditable="true">{{ __('Date of operation') }}</editor_block> @else {{ __('Date of operation') }} @endif</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($transactions as $operation)
                                                            <tr>
                                                                <td>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='{{ 'locale.' . $operation->type->name }}' contenteditable="true">{{ __('locale.' . $operation->type->name) }}</editor_block> @else {{ __('locale.' . $operation->type->name) }} @endif</td>
                                                                <td>
                                                                    <span class="">{{$operation->currency->symbol}} {{ number_format($operation->amount, $operation->currency->precision, '.', ',') ?? 0 }}</span>
                                                                    @if(!preg_match('/USD/', $operation->currency->code))
                                                                        <br>
                                                                        <span class="badge rounded-pill pill-badge-info">$ {{ number_format($operation->main_currency_amount, 2, '.', ',') ?? 0 }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    {{ $operation->paymentSystem->name ?? $operation->currency->code }}
                                                                    <br>
                                                                    <span class="badge rounded-pill pill-badge-info">{{ $operation->external ?? '' }}</span>
                                                                </td>
                                                                <td>@switch($operation->approved)
                                                                        @case(1)
                                                                        <span class="btn-success p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Confirmed' contenteditable="true">{{ __('Confirmed') }}</editor_block>
                                                                            @else {{ __('Confirmed') }}@endif</span>
                                                                        @break
                                                                        @case(2)
                                                                        <span class="btn-danger p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Rejected' contenteditable="true">{{ __('Rejected') }}</editor_block>
                                                                            @else {{ __('Rejected') }}@endif</span>
                                                                        @break
                                                                        @default
                                                                        <span class="btn-light p-2 ps-4 pe-4" style="display: inline-block; min-width: 200px;text-align: center">@if(canEditLang() && checkRequestOnEdit())
                                                                                <editor_block data-name='Not confirmed' contenteditable="true">{{ __('Not confirmed') }}</editor_block>
                                                                            @else {{ __('Not confirmed') }}@endif</span>
                                                                        @break
                                                                    @endswitch</td>
                                                                <td>{{ $operation->created_at->format('d-m-Y H:i') }}</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6">
                                                                    <div class="alert alert-light inverse alert-dismissible fade show d-flex justify-content-center align-items-center" role="alert">
                                                                        <p style="font-size: 16px;">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='No operations' contenteditable="true">{{ __('No operations') }}</editor_block> @else {{ __('No operations') }} @endif</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                {{ $transactions->appends(request()->except('page'))->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
            $('.wrapper .nav-link').click(function () {
                location.href = $(this).attr('href');
                return false;
            })
        });
    </script>

    @if($type == 'event-calendar')
        <script src="{{ asset('accountPanel/js/calendar/tui-code-snippet.min.js') }}"></script>
        {{-- <script src="{{ asset('accountPanel/js/calendar/tui-time-picker.min.js') }}"></script>
         <script src="{{ asset('accountPanel/js/calendar/tui-date-picker.min.js') }}"></script>--}}
        <script src="{{ asset('accountPanel/js/calendar/moment.min.js') }}"></script>
        <script src="{{ asset('accountPanel/js/calendar/chance.min.js') }}"></script>
        <script src="{{ asset('accountPanel/js/calendar/tui-calendar.js') }}"></script>
        <script src="{{ asset('accountPanel/js/calendar/calendars.js') }}"></script>
        <script src="{{ asset('accountPanel/js/calendar/schedules.js') }}"></script>
        <script src="{{ asset('accountPanel/js/calendar/app.js') }}"></script>
        <script>
            var title = "Test";
            var isAllDay = true;
            var start = new Date();
            var end = new Date();
            var calendarList = document.getElementById('calendarList');
            var html = [];
            CalendarList.forEach(function (calendar) {
                @if($partners)
                    @foreach($partners as $day => $items)
                    @foreach($items as $item)
                if (calendar.id == 1) {
                    window.cal.createSchedules([{
                        id: String(chance.guid()),
                        calendarId: calendar.id,
                        title: "Реферальные {{ $item->main_currency_amount }}$",
                        body: "Вам начислено {{ $item->amount . $item->currency->symbol }} ({{ $item->main_currency_amount }}$) за реферальные",
                        isAllDay: isAllDay,
                        start: "{{ $day }}",
                        end: "{{ $day }}",
                        category: isAllDay ? 'allday' : 'time',
                        dueDateClass: '',
                        color: calendar.color,
                        bgColor: calendar.bgColor,
                        dragBgColor: calendar.bgColor,
                        borderColor: calendar.borderColor,
                    }]);
                }
                @endforeach
                    @endforeach
                    @endif
                    @if($bonuses)
                    @foreach($bonuses as $day => $items)
                    @foreach($items as $item)
                if (calendar.id == 1) {
                    window.cal.createSchedules([{
                        id: String(chance.guid()),
                        calendarId: calendar.id,
                        title: "Бонус {{ $item->main_currency_amount }}$",
                        body: "Вам начислен бонус, в размере {{ $item->amount . $item->currency->symbol }} ({{ $item->main_currency_amount }}$) ",
                        isAllDay: isAllDay,
                        start: "{{ $day }}",
                        end: "{{ $day }}",
                        category: isAllDay ? 'allday' : 'time',
                        dueDateClass: '',
                        color: calendar.color,
                        bgColor: calendar.bgColor,
                        dragBgColor: calendar.bgColor,
                        borderColor: calendar.borderColor,
                    }]);
                }
                @endforeach
                    @endforeach
                    @endif
                    @if($dividends)
                    @foreach($dividends as $day => $items)
                    @foreach($items as $item)
                if (calendar.id == 1) {
                    window.cal.createSchedules([{
                        id: String(chance.guid()),
                        calendarId: calendar.id,
                        title: "Дивиденды {{ $item->main_currency_amount }}$",
                        body: "Вам начислено {{ $item->amount . $item->currency->symbol }} ({{ $item->main_currency_amount }}$) за депозит {{ $item->rate->name ?? '' }}",
                        isAllDay: isAllDay,
                        start: "{{ $day }}",
                        end: "{{ $day }}",
                        category: isAllDay ? 'allday' : 'time',
                        dueDateClass: '',
                        color: calendar.color,
                        bgColor: calendar.bgColor,
                        dragBgColor: calendar.bgColor,
                        borderColor: calendar.borderColor,
                    }]);
                }
                @endforeach
                    @endforeach
                    @endif
                    @if($transfers)
                    @foreach($transfers as $day => $items)
                    @foreach($items as $item)
                if (calendar.id == 1) {
                    window.cal.createSchedules([{
                        id: String(chance.guid()),
                        calendarId: calendar.id,
                        title: "Перевод средств {{ $item->main_currency_amount }}$",
                        body: "Вам перевели {{ $item->amount . $item->currency->symbol }} ({{ $item->main_currency_amount }}$)",
                        isAllDay: isAllDay,
                        start: "{{ $day }}",
                        end: "{{ $day }}",
                        category: isAllDay ? 'allday' : 'time',
                        dueDateClass: '',
                        color: calendar.color,
                        bgColor: calendar.bgColor,
                        dragBgColor: calendar.bgColor,
                        borderColor: calendar.borderColor,
                    }]);
                }
                @endforeach
                    @endforeach
                    @endif

                    @foreach($withdraws as $day => $items)
                    @foreach($items as $item)
                if (calendar.id == 2) {
                    window.cal.createSchedules([{
                        id: String(chance.guid()),
                        calendarId: calendar.id,
                        title: "Вывод средств {{ $item->main_currency_amount }}$",
                        body: "Вы вывели {{ $item->amount . $item->currency->symbol }} ({{ $item->main_currency_amount }}$)",
                        isAllDay: isAllDay,
                        start: "{{ $day }}",
                        end: "{{ $day }}",
                        category: isAllDay ? 'allday' : 'time',
                        dueDateClass: '',
                        color: calendar.color,
                        bgColor: calendar.bgColor,
                        dragBgColor: calendar.bgColor,
                        borderColor: calendar.borderColor,
                    }]);
                }
                @endforeach
                    @endforeach

                    calendarList.innerHTML
                    = html.join('\n');
                html.push('<div class="lnb-calendars-item"><label>' +
                    '<input type="checkbox" class="tui-full-calendar-checkbox-round" value="' + calendar.id + '" checked>' +
                    '<span style="border-color: ' + calendar.borderColor + '; background-color: ' + calendar.borderColor + ';"></span>' +
                    '<span>' + calendar.name + '</span>' +
                    '</label></div>'
                );
            });
            calendarList.innerHTML = html.join('\n');

        </script>
    @endif
@endpush
