<div class="row border-bottom">
    <nav class="navbar navbar-static-top navbar-fixed-top topNav-white-theme" id="topNavbar">
        <div class="navbar-header left">
            <a class="nav-link navbar-mini mini-style" href="#"><i class="feather icon-menu icon-toggle-left"></i></a>
            <div class="searchbar">
                <input class="search_input" type="text" placeholder="Search...">
                <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
            </div>
        </div>
        <ul class="nav navbar-top-links navbar-right ml-auto">
            <li class="nav-item">
                <a class="nav-link btn-full-screen toggle-full-screen" onclick="toggleFullScreen();" data-toggle="tooltip" data-placement="top" title="Go FullScreen" data-original-title="FullScreen">
                    <span id="top-full-screen" class="feather icon-maximize full-screen" aria-hidden="true"></span>
                </a>
            </li>
            <li class="nav-item dropdown message-dropdown">
                <a class="nav-link dropdown-toggle count-msg show-notification" data-toggle="dropdown" href="#" data-keyboard="false" data-backdrop="static">
                    <i class="fa fa-envelope-o"></i> <span class="label label-success">{{ $counts['notifications'] ?? 0 }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right notifications bounce animated  ml-auto">
                    <li class="notification-heading">
                        <h6 class="menu-title">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Уведомления' contenteditable="true">{{ __('Уведомления') }}</editor_block> @else {{ __('Уведомления') }} @endif</h6>
                    </li>
                    <li>
                        <ul class="dropdown-messages">
                            @forelse($navbar_notifications as $item)
                                <?php
                                if ($item->notification == null) {
                                    continue;
                                }
                                ?>
                                <li class="nav-item notification" data-id="{{ $item->id }}" data-count="{{ $counts['notifications'] ?? 0 }}">
                                    <div class="dropdown-messages-box">
                                        <div class="media-body" style="padding: 0 15px">
                                            <small
                                                class="float-right">@if($item->notification->created_at){{ $item->notification->created_at->diffForHumans() }}@endif</small>
                                            <strong>{{ $item->notification->text ?? '' }}</strong><br>
                                        </div>
                                    </div>
                                </li>
                                @if($loop->iteration != $loop->count)
                                    <li class="divider"></li>
                                @endif
                            @empty
                                <li class="nav-item">
                                    <div class="dropdown-messages-box">
                                        <div class="media-body" style="padding: 0 15px">
                                            <strong>@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='No notifications!' contenteditable="true">{{ __('No notifications!') }}</editor_block> @else {{ __('No notifications!') }} @endif
                                            </strong>
                                        </div>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </li>
                </ul>
            </li>
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link dropdown-toggle count-msg show-chat-list" data-toggle="dropdown" href="#">--}}
            {{--                    <i class="fa fa-bell-o"></i>--}}
            {{--                    <span class="label label-danger">12</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            <li class="nav-item user-profile header-notification">
                <div class="nav-link dropdown-primary dropdown config">
                    <div class="dropdown-toggle" aria-expanded="true" data-toggle="dropdown" role="menu">
                        <img class="img-radius" alt="User-Profile-Image" src="{{ $user->avatar ? route('accountPanel.profile.get.avatar', auth()->user()->id) : asset('accountPanel/images/user/user.png') }}">
                        <span class="text-light"> {{ $user->login }} </span>
                        <i class="feather icon-chevron-down"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-right mb-3 menu-log flipInX animated  ml-auto" data-dropdown-out="fadeOut" data-dropdown-in="fadeIn">
                        <li class="nav-item">
                            <a href="{{ route('accountPanel.settings.profile') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                                <i class="fa fa-user"></i>
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Account' contenteditable="true">{{ __('Account') }}</editor_block> @else {{ __('Account') }} @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accountPanel.settings.security') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                                <i class="fa fa-gear"></i>
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Settings' contenteditable="true">{{ __('Settings') }}</editor_block> @else {{ __('Settings') }} @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('accountPanel.user-products.index') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                                <i class="fa fa-shopping-basket"></i>
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Покупки' contenteditable="true">{{ __('Покупки') }}</editor_block> @else {{ __('Покупки') }} @endif
                            </a>
                        </li>
                        @if(canEditLang() && checkRequestOnEdit())
                            <li>
                                <a href="{{ url()->current() }}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>{{ __('Default mode') }}</span>
                                </a>
                            </li>
                        @elseif(canEditLang())
                            <li>
                                <a href="{{ url()->current() . '?edit=true' }}" class="nav-link">
                                    <i class="fa fa-edit"></i>
                                    <span>{{ __('Edit text') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                                <i class="fa fa-shopping-basket"></i>
                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Log out' contenteditable="true">{{ __('Log out') }}</editor_block> @else {{ __('Log out') }} @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>
