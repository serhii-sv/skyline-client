<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="logo-element fixed-brand">
                <img class="mini-logo" src="/adminos/img/LOGO_3.png" alt="">
            </div>
            <div class="dropdown profile-element">
                <div class="sidebar-header">
                    <div class="sidebar-nav-search">
                        <div class="input-group mb-3 input-group-sm input-group-border">
                            <input type="text" class="form-control input-group-text" id="search-menu" placeholder="Search Menu ...">
                            <div class="input-group-append">
                                <button class="btn btn-secondary toggle-btn" type="submit"><i class="feather icon-x-circle"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-bg"><img src="/adminos/img/profile_bg.JPG" alt=""></div>
                    <div class="search-toggle toggle-btn"><i class="feather icon-chevron-up"></i></div>
                    <div class="user-profile-info">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" alt="User picture" src="{{ $user->avatar ? route('accountPanel.profile.get.avatar', auth()->user()->id) : asset('accountPanel/images/user/user.png') }}">
                        </div>
                        <div class="user-info">
                                        <span class="user-name">
                                            <strong>{{ $user->login }}</strong>
                                        </span>
                            <span class="user-role">
                                @if(canEditLang() && checkRequestOnEdit())
                                    <editor_block data-name='{{ $user->roles()->first()->name ?? "Customer" }}' contenteditable="true">{{ __($user->roles()->first()->name ?? "Customer") }}</editor_block>
                                @else
                                    {{ __($user->roles()->first()->name ?? "Customer") }}
                                @endif
                            </span>
                            <span class="user-status">
                                            <i class="fa fa-circle text-success"></i>
                                            <span>Online</span>
                                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.customer.main') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.customer.main') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa feather icon-home"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Dashboard' contenteditable="true">{{ __('Dashboard') }}</editor_block> @else {{ __('Dashboard') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.replenishment') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.replenishment') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-dollar"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Replenishment' contenteditable="true">{{ __('Replenishment') }}</editor_block> @else {{ __('Replenishment') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.deposits.create') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.deposits.create') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-suitcase"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Create deposit' contenteditable="true">{{ __('Create deposit') }}</editor_block> @else {{ __('Create deposit') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.withdrawal') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.withdrawal') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-dollar"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Withdraw' contenteditable="true">{{ __('Withdraw') }}</editor_block> @else {{ __('Withdraw') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.transactions') || Route::is('accountPanel.calendar') ? 'active' : '' }}">
            <a href="#" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-list"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Transactions' contenteditable="true">{{ __('Transactions') }}</editor_block> @else {{ __('Transactions') }} @endif</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li class="nav-item">
                    <a href="{{ route('accountPanel.transactions') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-list"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='All transactions' contenteditable="true">{{ __('All transactions') }}</editor_block> @else {{ __('All transactions') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.calendar') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-calendar-check-o"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Calendar' contenteditable="true">{{ __('Calendar') }}</editor_block> @else {{ __('Calendar') }} @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.referrals.*') ? 'active' : '' }}">
            <a href="#" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-users"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referrals' contenteditable="true">{{ __('Referrals') }}</editor_block> @else {{ __('Referrals') }} @endif</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li class="nav-item">
                    <a href="{{ route('accountPanel.referrals.progress') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-line-chart"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Progress' contenteditable="true">{{ __('Progress') }}</editor_block> @else {{ __('Progress') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.referrals.banners') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa ffa-bullhorn"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Banners' contenteditable="true">{{ __('Banners') }}</editor_block> @else {{ __('Banners') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.referrals.tree') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-area-chart"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral tree' contenteditable="true">{{ __('Referral tree') }}</editor_block> @else {{ __('Referral tree') }} @endif
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.currency.exchange') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.currency.exchange') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-line-chart"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Currency exchange' contenteditable="true">{{ __('Currency exchange') }}</editor_block> @else {{ __('Currency exchange') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.products.index') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.products.index') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-shopping-bag"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Магазин' contenteditable="true">{{ __('Магазин') }}</editor_block> @else {{ __('Магазин') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.chat') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.chat') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-commenting-o"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Chat' contenteditable="true">{{ __('Chat') }}</editor_block> @else {{ __('Chat') }} @endif</span>
                <span class="label label-info">{{ $total_unread_messages > 0 ? "+" . $total_unread_messages : 0 }}</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.settings.*') || Route::is('accountPanel.support-tasks.*') ? 'active' : '' }}">
            <a href="#" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Settings' contenteditable="true">{{ __('Settings') }}</editor_block> @else {{ __('Settings') }} @endif</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="nav nav-second-level">
                <li class="nav-item">
                    <a href="{{ route('accountPanel.settings.profile') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-user"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Profile' contenteditable="true">{{ __('Profile') }}</editor_block> @else {{ __('Profile') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.settings.wallets') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-money"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Wallets' contenteditable="true">{{ __('Wallets') }}</editor_block> @else {{ __('Wallets') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.settings.verify') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-user-secret"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Verify' contenteditable="true">{{ __('Verify') }}</editor_block> @else {{ __('Verify') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.support-tasks.index') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-support"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Support tasks' contenteditable="true">{{ __('Support tasks') }}</editor_block> @else {{ __('Support tasks') }} @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('accountPanel.settings.security') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                        <i class="fa fa-key"></i>
                        @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Security' contenteditable="true">{{ __('Security') }}</editor_block> @else {{ __('Security') }} @endif
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-footer hidden-small">
        <a class="setting-btn" data-toggle="tooltip" data-placement="top" title="Open Settings Menu" data-original-title="Settings">
            <span class="feather icon-settings" aria-hidden="true"></span>
        </a>
        <a onclick="toggleFullScreen();" class="toggle-full-screen" data-toggle="tooltip" data-placement="top" title="Go FullScreen" data-original-title="FullScreen">
            <span id="full-screen" class="feather icon-maximize full-screen" aria-hidden="true"></span>
        </a>
        <a id="disable-click" data-toggle="tooltip" data-placement="top" title="Lock Sidebar" data-original-title="Lock">
            <span class="feather icon-eye" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout From Site" href="{{ route('logout') }}" data-original-title="Logout">
            <span class="feather icon-power" aria-hidden="true"></span>
        </a>
    </div>
</div>
