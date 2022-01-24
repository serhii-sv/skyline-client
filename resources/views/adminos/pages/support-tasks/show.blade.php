@extends('adminos.layouts.account')
@section('title')
    Task details
@endsection
@push('styles')
    <style>
        .bottom_wrapper .message_input_wrapper .message_input {
            width: unset !important;
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
                    <div class="chat-messenger">
                        <div class="chat_window-responsive panel-box">
                            <div class="panel-box-content msg-menu">
                                <ul class="messages messages-responsive">
                                    @forelse($supportTask->messages as $message)
                                        @if($message->user_id == auth()->user()->id)
                                            <li class="message left appeared">
                                                <div class="avatar female-pic">
                                                    <img
                                                        src="{{ route('accountPanel.profile.get.avatar', $message->user_id) }}"
                                                        alt=""></div>
                                                <div class="text_wrapper">
                                                    <div class="text"> {{ $message->message }}</div>
                                                </div>
                                            </li>
                                        @else
                                            <li class="message right appeared">
                                                <div class="avatar male-pic"><img
                                                        src="{{ route('accountPanel.profile.get.avatar', $message->user_id) }}"
                                                        alt="">
                                                </div>
                                                <div class="text_wrapper">
                                                    <div class="text"> {{ $message->message }}</div>
                                                </div>
                                            </li>
                                        @endif
                                    @empty
                                        <div class="d-flex justify-content-center align-items-center"
                                             style="height: 100%">
                                            @if(canEditLang() && checkRequestOnEdit())
                                                <editor_block data-name="Wait for the administrator's response"
                                                              contenteditable="true">{{ __("Wait for the administrator's response") }}</editor_block> @else {{ __("Wait for the administrator's response") }} @endif
                                        </div>
                                    @endforelse
                                </ul>
                                @if($supportTask->status == \App\Models\SupportTask::ANSWERED_STATUS)
                                    <form method="post"
                                          action="{{ route('accountPanel.support-tasks.messages.store', $supportTask->id) }}">
                                        @csrf
                                        <div class="bottom_wrapper clearfix">
                                            <div class="message_input_wrapper mt-4">
                                                <input class="message_input" id="send-text"
                                                       placeholder="Type your message here..."/>
                                            </div>
                                            <div class="send_message mt-4">
                                                <div class="text"
                                                     @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>@if(canEditLang() && checkRequestOnEdit())
                                                        <editor_block data-name='SEND'
                                                                      contenteditable="true">{{ __('SEND') }}</editor_block> @else {{ __('SEND') }} @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            @include('partials.inform')
                                        </div>
                                    </form>
                                @endif
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
@endpush
