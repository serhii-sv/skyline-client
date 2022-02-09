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
                                                <i class="fa fa-circle text-success"></i>
                                                <strong>John Carlos</strong>
                                            </h5>
                                        </div>
                                        <div class="panel-box-content msg-menu">
                                            <ul class="messages messages-responsive">
                                                <li class="message left appeared">
                                                    <div class="avatar female-pic">
                                                        <img src="adminos/img/users/user4.jpg" alt="">
                                                    </div>
                                                    <div class="text_wrapper">
                                                        <div class="text">Hello John! :)</div>
                                                    </div>
                                                </li>
                                                <li class="message right appeared">
                                                    <div class="avatar male-pic"><img src="adminos/img/users/user2.jpg" alt="">
                                                    </div>
                                                    <div class="text_wrapper">
                                                        <div class="text">Hi Ninna! How are you?</div>
                                                    </div>
                                                </li>
                                                <li class="message left appeared">
                                                    <div class="avatar female-pic"><img src="adminos/img/users/user4.jpg"
                                                                                        alt=""></div>
                                                    <div class="text_wrapper">
                                                        <div class="text">I'm fine, thank you!</div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="bottom_wrapper clearfix">
                                                <div class="d-flex">
                                                    <a class="nav-link" href="#"><i class="feather icon-mic"></i></a>
                                                    <a class="nav-link" href="#"><i class="feather icon-camera"></i></a>
                                                    <a class="nav-link" href="#"><i class="feather icon-paperclip"></i></a>
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true" href="#"><i class="feather icon-more-horizontal"></i></a>
                                                    <ul class="dropdown-menu dropdown-user dropdown-menu-right">
                                                        <li><a href="#">Config option 1</a></li>
                                                        <li><a href="#">Config option 2</a></li>
                                                    </ul>
                                                </div>
                                                <div class="message_input_wrapper">
                                                    <input class="message_input" id="send-text" placeholder="Type your message here..." />
                                                </div>
                                                <div class="send_message">
                                                    <div class="icon"></div>
                                                    <div class="text">Send</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col call-chat-sidebar col-sm-12" style="margin-top:20px;">
                                <div class="card">
                                    <div class="card-body chat-body">
                                        <div class="chat-box">
                                            <!-- Chat left side Start-->
                                            <div class="chat-left-aside">
                                                <div class="media">
                                                    <img class="rounded-circle user-image" src="{{ $myAvatar ?? asset('accountPanel/images/user/user.png') }}" alt="">
                                                    <div class="about">
                                                        <div class="name f-w-600">{{ auth()->user()->name }}</div>
                                                        <div class="status">{{ auth()->user()->login }}</div>
                                                    </div>
                                                </div>
                                                <div class="people-list" id="people-list">
                                                    <div class="search">
                                                        <form class="theme-form" action="{{ route('accountPanel.chat') }}">
                                                            <div class="mb-3">
                                                                <input class="form-control" type="text" name="login" placeholder="Search" data-bs-original-title="" title="" value="{{ $login }}">
                                                                <i class="fa fa-search"></i>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <ul class="list">
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
                                                                <li class="clearfix">
                                                                    <a href="{{ route('accountPanel.chat', auth()->user()->partner()->first()->getPartnerChatId()) }}">
                                                                        <img class="rounded-circle user-image" src="{{ auth()->user()->partner()->first()->avatar ? route('accountPanel.profile.get.avatar',auth()->user()->partner()->first()->id) : asset('accountPanel/images/user/user.png')  }}" alt="">
                                                                        <div class="status-circle {{  auth()->user()->partner()->first()->getLastActivityAttribute()['is_online'] ? 'online' : 'offline' }}"></div>
                                                                        <div class="about">
                                                                            <div class="name">{{ auth()->user()->partner()->first()->login }}</div>
                                                                            <div class="status">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Partner' contenteditable="true">{{ __('Partner') }}</editor_block> @else {{ __('Partner') }} @endif</div>

                                                                        </div>
                                                                        <span class="unread badge round-badge-primary">{{auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) > 0 ? '+' .  auth()->user()->partner()->first()->getPartnerChat()->getUnreadMessagesCount(auth()->user()->id) : '' }}</span>
                                                                    </a>
                                                                </li>
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
                                                    </ul>

                                                </div>
                                            </div>
                                            <!-- Chat left side Ends-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col call-chat-body" style="margin-top: 20px">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="row chat-box">
                                            <!-- Chat right side start-->
                                            <div class="col pe-0 chat-right-aside">
                                                <!-- chat start-->
                                                <div class="chat">
                                                @if(!empty($chat))
                                                    <!-- chat-header start-->
                                                        @if(!empty($companion))
                                                            <div class="chat-header clearfix">
                                                                <img class="rounded-circle" src="{{ $companion->avatar ? route('accountPanel.profile.get.avatar',$companion->id) : asset('accountPanel/images/user/user.png') }}" alt="">
                                                                <div class="about">
                                                                    <div class="name">{{ $companion->name }}&nbsp;&nbsp;({{ $companion->login }})&nbsp;&nbsp;
                                                                        <span class="font-primary f-12">{{ $companion->getLastActivityAttribute()['is_online'] ? 'online' : 'offline' }}</span>
                                                                    </div>
                                                                    <div class="status">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Last Seen' contenteditable="true">{{ __('Last Seen') }}</editor_block> @else {{ __('Last Seen') }} @endif {{ $companion->getLastActivityAttribute()['last_seen'] }}</div>
                                                                </div>
                                                                <ul class="list-inline float-start float-sm-end chat-menu-icons">

                                                                </ul>
                                                            </div>
                                                    @endif
                                                    <!-- chat-header end-->
                                                        <div class="chat-history chat-msg-box custom-scrollbar">

                                                            <ul class="chat-msg-list">
                                                                @if(!empty($chat_messages))
                                                                    @foreach($chat_messages as $message)
                                                                        @if($message->user_id == auth()->user()->id)
                                                                            <li>
                                                                                <div class="message my-message mb-0">
                                                                                    <img class="rounded-circle float-start chat-user-img img-30" src="{{ $myAvatar ?? asset('accountPanel/images/user/user.png') }}" alt="">
                                                                                    <div class="message-data text-end">
                                                                                        <span class="message-data-time">{{ $message->created_at->format('d.M H:i:s') }}</span>
                                                                                    </div>
                                                                                    {{ $message->message }}
                                                                                </div>
                                                                            </li>
                                                                        @else
                                                                            <li class="clearfix">
                                                                                <div class="message other-message pull-right">
                                                                                    <img class="rounded-circle float-end chat-user-img img-30" src="{{ asset('accountPanel/images/user/12.png') }}" alt="">
                                                                                    <div class="message-data">
                                                                                        <span class="message-data-time">{{ $message->created_at->format('d.M H:i:s') }}</span>
                                                                                    </div>
                                                                                    {{ $message->message }}
                                                                                </div>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                @endif


                                                            </ul>

                                                        </div>
                                                        <!-- end chat-history-->
                                                        <div class="chat-message clearfix">
                                                            <div class="row">
                                                                <div class="col-xl-12 d-flex">
                                                                    <div class="input-group text-box">
                                                                        <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message-to-send" placeholder="Type a message.." data-bs-original-title="" title="">
                                                                        <button class="input-group-text btn btn-primary send-message-btn" type="button" data-bs-original-title="" title="">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Send' contenteditable="true">{{ __('Send') }}</editor_block> @else {{ __('Send') }} @endif</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                @endif
                                                <!-- end chat-message-->
                                                    <!-- chat end-->
                                                    <!-- Chat right side ends-->
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
                            <div class="online-friends">
                                <div class="friends  show-chat-msg" data-user-id="1" data-username="John Carlos" data-toggle="tooltip" title="John Carlos">
                                    <img alt="image" class="img-friends" src="img/2.jpg">
                                    <strong class="username pt-3" data-current-username="John Carlos" data-current-id="1">John Carlos</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-success" data-toggle="tooltip" title="Online"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="2" data-username="Andrew Smith" data-toggle="tooltip" title="Andrew Smith">
                                    <img alt="image" class="img-friends" src="img/9.jpg">
                                    <strong class="username pt-3" data-current-username="Andrew Smith" data-current-id="2">Andrew Smith</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-success" data-toggle="tooltip" title="Online"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="3" data-username="Mark Albert" data-toggle="tooltip" title="Mark Albert">
                                    <img alt="image" class="img-friends" src="img/users/user1.jpg">
                                    <strong class="username pt-3">Mark Albert</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-success" data-toggle="tooltip" title="Online"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="4" data-username="Harry Kim" data-toggle="tooltip" title="Harry Kim">
                                    <img alt="image" class="img-friends" src="img/users/user2.jpg">
                                    <strong class="username pt-3">Harry Kim</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-success" data-toggle="tooltip" title="Online"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="5" data-username="Nina Stephan" data-toggle="tooltip" title="Nina Stephan">
                                    <img alt="image" class="img-friends" src="img/users/user5.jpg">
                                    <strong class="username pt-3">Nina Stephan</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-warning" data-toggle="tooltip" title="Away"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="6" data-username="Bill Smith" data-toggle="tooltip" title="Bill Smith">
                                    <img alt="image" class="img-friends" src="img/users/user6.jpg">
                                    <strong class="username pt-3">Bill Smith</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-muted" data-toggle="tooltip" title="Offline"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="7" data-username="Delos Frank" data-toggle="tooltip" title="Delos Frank">
                                    <img alt="image" class="img-friends" src="img/users/user4.jpg">
                                    <strong class="username pt-3">Delos Frank</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-success" data-toggle="tooltip" title="Online"></i></div>
                                </div>
                                <div class="friends  show-chat-msg" data-user-id="8" data-username="Danny Larry" data-toggle="tooltip" title="Danny Larry">
                                    <img alt="image" class="img-friends" src="img/users/user3.jpg">
                                    <strong class="username pt-3">Danny Larry</strong>
                                    <div class="online float-right"><i class="fa fa-circle text-warning" data-toggle="tooltip" title="Away"></i></div>
                                </div>
                            </div>
                            <div class="des">
                                <strong>Notes:</strong>
                                <p class="small">Online friends panel is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script src="{{ asset('adminos/plugins/mervick/emojionearea.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#send-text").emojioneArea({
                search: false,
                recentEmojis: false
            });
        });
    </script>
    @if($chat)
        <script src="{{ asset('/js/app.js') }}"></script>
        <script>
            $(document).ready(function () {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "June",
                    "July", "Aug", "Sep", "Oct", "Nov", "Dec"
                ];

                function scrollChat() {
                    var container = $('.chat-history'),
                        scrollTo = $('.chat-msg-list');
                    container.scrollTop(scrollTo.prop('scrollHeight'));
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
                        $(".chat-msg-list").append('<li>' +
                            '<div class="message my-message mb-0">' +
                            '  <img class="rounded-circle float-start chat-user-img img-30" src="{{ $myAvatar ?? asset('accountPanel/images/user/16.png') }}" alt="">' +
                            '   <div class="message-data text-end">' +
                            '    <span class="message-data-time">' + $data.time + '</span>' +
                            '   </div>' +
                            $data.message +
                            '  </div>' +
                            '</li>');
                    } else {
                        $(".chat-msg-list").append('<li class="clearfix">' +
                            '<div class="message other-message pull-right">' +
                            '<img class="rounded-circle float-end chat-user-img img-30" src="{{ $companion->avatar ? route('accountPanel.profile.get.avatar',$companion->id) : asset('accountPanel/images/user/16.png') }}" alt="">' +
                            '<div class="message-data">' +
                            '  <span class="message-data-time">' + $data.time + '</span>' +
                            ' </div>' +
                            $data.message +
                            ' </div>' +
                            '</li>');
                    }
                    scrollChat();
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
                    }
                    $("#message-to-send").val('');
                });
                $("#message-to-send").keyup(function (event) {
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
                        }
                        $(this).val('');
                    }
                });

                function addZeroBefore(n) {
                    return (n < 10 ? '0' : '') + n;
                }
            });

        </script>
    @endif
@endpush
