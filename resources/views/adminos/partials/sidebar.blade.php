<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="logo-element fixed-brand">
                <img class="mini-logo" src="/adminos/img/LOGO_3.png" alt="">
            </div>
            <div class="dropdown profile-element">
                <div class="sidebar-header">
                    <div class="sidebar-nav-search">
                        <div class="input-group mb-3 input-group-sm input-group-border"></div>
                    </div>
                    <div class="profile-bg"><img src="/adminos/img/profile_bg.JPG" alt=""></div>
                    <div class="search-toggle toggle-btn"><i class="feather icon-chevron-up"></i></div>
                    <div class="user-profile-info">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" alt="User picture" src="{{ $user->getAvatar() }}">
                        </div>
                        <div class="user-info">
                                        <span class="user-name">
                                            <strong>{{ $user->login }}</strong>
                                        </span>
                            <span class="user-role">
                                {{ __(App\Models\DepositBonus::find($user->userCurrentRank()->deposit_bonus_id ?? null)->status_name ?? '') }}
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
            <a href="{{ route('accountPanel.transactions') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-list"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Transactions' contenteditable="true">{{ __('Transactions') }}</editor_block> @else {{ __('Transactions') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.referrals.progress') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.referrals.progress') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-users"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referrals' contenteditable="true">{{ __('Referrals') }}</editor_block> @else {{ __('Referrals') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.referrals.tree') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.referrals.tree') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-area-chart"></i>
                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Referral tree' contenteditable="true">{{ __('Referral tree') }}</editor_block> @else {{ __('Referral tree') }} @endif
            </a>
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
        <li class="nav-item {{ Route::is('accountPanel.nft-market.index') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.nft-market.index') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-space-shuttle"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='NFT-маркет' contenteditable="true">{{ __('NFT-маркет') }}</editor_block> @else {{ __('NFT-маркет') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.chat') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.chat') }}"
               @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-commenting-o"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Chat' contenteditable="true">{{ __('Chat') }}</editor_block> @else {{ __('Chat') }} @endif</span>
                <span class="label label-info">{{ $total_unread_messages > 0 ? "+" . $total_unread_messages : 0 }}</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.settings.profile') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.settings.profile') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="nav-label">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Settings' contenteditable="true">{{ __('Settings') }}</editor_block> @else {{ __('Settings') }} @endif</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('accountPanel.settings.verify') ? 'active' : '' }}">
            <a href="{{ route('accountPanel.settings.verify') }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="nav-link">
                <i class="fa fa-user-secret"></i>
                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Verify' contenteditable="true">{{ __('Verify') }}</editor_block> @else {{ __('Verify') }} @endif
            </a>
        </li>
    </ul>
    <div class="sidebar-footer hidden-small d-flex justify-content-center">
        <a href="{{ route('accountPanel.settings.profile') }}" class="setting-btn" data-toggle="tooltip" data-placement="top" title="Open Settings Menu" data-original-title="Settings">
            <span class="feather icon-settings" aria-hidden="true"></span>
        </a>
        <a onclick="toggleFullScreen();" class="toggle-full-screen" data-toggle="tooltip" data-placement="top" title="Go FullScreen" data-original-title="FullScreen">
            <span id="full-screen" class="feather icon-maximize full-screen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout From Site" href="{{ route('logout') }}" data-original-title="Logout">
            <span class="feather icon-power" aria-hidden="true"></span>
        </a>
    </div>
</div>
