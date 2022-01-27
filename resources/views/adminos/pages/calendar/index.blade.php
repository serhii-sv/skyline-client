@extends('adminos.layouts.account')
@section('title')
    Calendar page
@endsection
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
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
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('accountPanel/css/vendors/calendar.css') }}">
@endpush
@push('scripts')
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
        console.log(window.cal);
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
@endpush
