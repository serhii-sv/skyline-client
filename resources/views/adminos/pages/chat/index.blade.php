@extends('adminos.layouts.account')
@section('title')
    Chat page
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminos/plugins/mervick/emojionearea.css') }}">

    <style>
        .search i {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 14px;
        }

        strong.username {
            color: black;
        }

        .online.float-right {
            margin-top: 10px;
        }

        .message_input {
            width: 80% !important;
        }
    </style>
@endpush

@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-9">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('settings.profile') }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="chat-messenger">
                                    <div class="chat_window-responsive panel-box">
                                        <div class="top_menu panel-box-title">
                                            <h5 class="text-center" id="username">
                                                @if(!empty($companion))
                                                    <i class="fa fa-circle text-{{ $companion->getLastActivityAttribute()['is_online'] ? 'success' : 'danger' }}"></i>
                                                    <strong>{{ $companion->name }}&nbsp;&nbsp;({{ $companion->login }})&nbsp;&nbsp;</strong>
                                                @endif
                                            </h5>
                                        </div>
                                        <div class="panel-box-content msg-menu chat-history">
                                            <ul class="messages messages-responsive chat-msg-list">
                                                @if(!empty($chat_messages))
                                                    @foreach($chat_messages as $message)
                                                        @if($message->user_id == auth()->user()->id)
                                                            <li class="message left appeared">
                                                                <div class="avatar">
                                                                    <img src="{{ $myAvatar ?? asset('accountPanel/images/user/user.png') }}" alt="">
                                                                </div>
                                                                <div class="text_wrapper">
                                                                    <div class="text">{{ $message->message }}</div>
                                                                </div>
                                                            </li>
                                                        @else
                                                            <li class="message right appeared">
                                                                <div class="avatar male-pic"><img src="{{ asset('accountPanel/images/user/12.png') }}" alt="">
                                                                </div>
                                                                <div class="text_wrapper">
                                                                    <div class="text">{{ $message->message }}</div>
                                                                </div>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <div class="bottom_wrapper clearfix">
                                                <div class="message_input_wrapper mt-4">
                                                    <input class="message_input" id="message-to-send" value="" placeholder="Type your message here..." />
                                                </div>
                                                <div class="send_message mt-4">
                                                    <div class="icon"></div>
                                                    <div class="text send-message-btn">
                                                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Send' contenteditable="true">{{ __('Send') }}</editor_block> @else {{ __('Send') }} @endif
                                                    </div>
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
                <div class="col-xl-3">
                    <div id="chat" class="sticky-top chat-open">
                        <div class="chat-messages">
                            <div class="search-friends">
                                <form class="theme-form" action="{{ route('accountPanel.chat') }}">
                                    <div class="input-group mb-3 search">
                                        <input type="text" class="form-control" id="search-users" name="login" placeholder="Search" value="{{ $login }}">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </form>
                            </div>
                            @if(!empty($filteredReferrals))
                                @forelse($filteredReferrals as $filteredReferral)
                                    <li class="clearfix">
                                        <a href="{{ route('accountPanel.chat', $filteredReferral->getReferralChatId()) }}">
                                            <img class="rounded-circle user-image" src="{{ $filteredReferral->avatar ? route('accountPanel.profile.get.avatar',auth()->user()->partner()->first()->id) : asset('accountPanel/images/user/user.png')  }}" alt="">
                                            <div class="status-circle {{  $filteredReferral->getLastActivityAttribute()['is_online'] ? 'online' : 'offline' }}"></div>
                                            <div class="about">
                                                <div class="name">{{ $filteredReferral->login }}</div>
                                                <div class="status">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral' contenteditable="true">{{ __('Referral') }}</editor_block> @else {{ __('Referral') }} @endif</div>
                                            </div>
                                            <span class="unread badge round-badge-primary">{{$filteredReferral->getReferralChat()->getUnreadMessagesCount(auth()->user()->id) > 0 ? '+' .  $filteredReferral->getReferralChat()->getUnreadMessagesCount(auth()->user()->id) : '' }}</span>
                                        </a>
                                    </li>
                                    <div class="friends  show-chat-msg">
                                        <a href="{{ route('accountPanel.chat', $filteredReferral->getReferralChatId()) }}">
                                            <img alt="image" class="img-friends" src="{{ $filteredReferral->avatar ? route('accountPanel.profile.get.avatar',auth()->user()->partner()->first()->id) : asset('accountPanel/images/user/user.png')  }}">
                                            <strong class="username pt-3">{{ auth()->user()->partner()->first()->login }} (@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Partner' contenteditable="true">{{ __('Partner') }}</editor_block> @else {{ __('Partner') }} @endif)</strong>
                                            <span class="unread badge round-badge-primary">{{auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) > 0 ? '+' .  auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) : '' }}</span>
                                            <div class="online float-right">
                                                <i class="fa fa-circle {{  auth()->user()->partner()->first()->getLastActivityAttribute()['is_online'] ? 'text-success' : 'text-danger' }}"></i>
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <li class="clearfix">
                                  <span>
                                      @if(canEditLang() && checkRequestOnEdit())
                                          <editor_block data-name='Пользователь с таким логином не найден' contenteditable="true">{{ __('Пользователь с таким логином не найден') }}</editor_block>
                                      @else
                                          {{ __('Пользователь с таким логином не найден') }}
                                      @endif
                                  </span>
                                    </li>
                                @endforelse
                            @else
                                @if(!empty(auth()->user()->partner()->first()))
                                    <div class="friends  show-chat-msg">
                                        <a href="{{ route('accountPanel.chat', auth()->user()->partner()->first()->getPartnerChatId()) }}">
                                            <img alt="image" class="img-friends" src="{{ auth()->user()->partner()->first()->avatar ? route('accountPanel.profile.get.avatar',auth()->user()->partner()->first()->id) : asset('accountPanel/images/user/user.png')  }}">
                                            <strong class="username pt-3">{{ auth()->user()->partner()->first()->login }} (@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Partner' contenteditable="true">{{ __('Partner') }}</editor_block> @else {{ __('Partner') }} @endif)</strong>
                                            <span class="unread badge round-badge-primary">{{auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) > 0 ? '+' .  auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) : '' }}</span>
                                            <div class="online float-right">
                                                <i class="fa fa-circle {{  auth()->user()->partner()->first()->getLastActivityAttribute()['is_online'] ? 'text-success' : 'text-danger' }}"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                {{--                    @if(!empty(auth()->user()->hasReferrals()))--}}
                                @foreach($activeChats as $activeChat)
                                    <li class="clearfix">
                                        <a href="{{ route('accountPanel.chat', $activeChat->userReferral->getReferralChatId()) }}">
                                            <img class="rounded-circle user-image" src="{{ $activeChat->userReferral->avatar ? route('accountPanel.profile.get.avatar',$activeChat->userReferral->id) : asset('accountPanel/images/user/user.png') }}" alt="">
                                            <div class="status-circle {{ $activeChat->userReferral->getLastActivityAttribute()['is_online'] ? 'online' : 'offline' }}"></div>
                                            <div class="about">
                                                <div class="name">{{ $activeChat->userReferral->login }}</div>
                                                <div class="status">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral' contenteditable="true">{{ __('Referral') }}</editor_block> @else {{ __('Referral') }} @endif</div>
                                            </div>
                                            <span class="unread badge round-badge-primary">{{ $activeChat->userReferral->getReferralChat()->getUnreadMessagesCount(auth()->user()->id) > 0 ? '+' .  $activeChat->userReferral->getReferralChat()->getUnreadMessagesCount(auth()->user()->id) : '' }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script src="{{ asset('adminos/plugins/mervick/emojionearea.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $("#message-to-send").emojioneArea({
        //         search: false,
        //         recentEmojis: false
        //     });
        // });
    </script>
    @if($chat)
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June",
                    "July", "Aug", "Sep", "Oct", "Nov", "Dec"
                ];

                function scrollChat() {
                    $('.chat-msg-list').animate({
                        scrollTop: $('.chat-msg-list li:last-child').offset().top
                    }, 1000);
                }

                scrollChat();
                Pusher.logToConsole = true;

                window.Echo.private('chat.{{ $chat->id }}').listen('PrivateChat', (data) => {
                    var $data = data;
                    var $message_id = $data.message_id;

                    if (!($data.user == "{{ auth()->user()->id }}")) {
                        var $options = {
                            method: "post",
                            url: "{{ route('accountPanel.chat.message.read') }}",
                            data: {
                                user: "{{ auth()->user()->id }}",
                                message_id: $message_id,
                            }
                        }
                        window.axios($options);
                    }

                    if ($data.chat_id == "{{ $chat->id }}" && $data.user == "{{ auth()->user()->id }}") {

                        $(".chat-msg-list").append('<li class="message left appeared">' +
                            '<div class="avatar">' +
                            '<img src="{{ $myAvatar ?? asset('accountPanel/images/user/16.png') }}" alt=""></div>' +
                        '<div class="text_wrapper"><div class="text">' + $data.message + '</div> </div>' +
                    '</li>');
                    } else {
                        $(".chat-msg-list").append('<li class="message right appeared">' +
                            '<div class="avatar">' +
                            '<img src="{{ $companion->avatar ? route('accountPanel.profile.get.avatar',$companion->id) : asset('accountPanel/images/user/16.png') }}" alt=""></div>' +
                            '<div class="text_wrapper"><div class="text">' + $data.message + '</div> </div>' +
                            '</li>');
                    }
                    document.querySelectorAll(".chat-msg-list li")[$('.chat-msg-list li').length - 1].scrollIntoView();
                });

                $(".send-message-btn").on('click', function (e) {
                    var $message = $("#message-to-send").val();
                    if ($message.length > 0) {
                        var $options = {
                            method: "post",
                            url: "{{ route('accountPanel.chat.send.message') }}",
                            data: {
                                user: "{{ auth()->user()->id }}",
                                message: $message,
                                chat_id: "{{ $chat->id }}",
                                type: "message",
                            }
                        }
                        window.axios($options);
                        $("#message-to-send").val('');
                    }
                });
                $("#message-to-send").unbind();
                $("#message-to-send").keyup(function (event) {
                    console.log(event.keyCode)
                    if (event.keyCode == 13) {
                        var $message = $(this).val();
                        if ($message.length > 0) {
                            var $options = {
                                method: "post",
                                url: "{{ route('accountPanel.chat.send.message') }}",
                                data: {
                                    user: "{{ auth()->user()->id }}",
                                    message: $message,
                                    chat_id: "{{ $chat->id }}",
                                    type: "message",
                                }
                            }
                            window.axios($options);
                            $(this).val('');
                        }
                    }
                });
            });

        </script>
    @endif
@endpush
