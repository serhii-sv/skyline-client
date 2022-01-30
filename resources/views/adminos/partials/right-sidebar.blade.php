<div id="right-sidebar" class="animated">
    <div class="sidebar-container">
        <ul class="nav nav-tabs navs-3 setting-menu default-theme" id="mySidenav">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-1">
                    @if(canEditLang() && checkRequestOnEdit())
                        <editor_block data-name='Skin' contenteditable="true">
                            {{ __('Skin') }}
                        </editor_block>
                    @else
                        {{ __('Skin') }}
                    @endif
                </a>
            </li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-2"><i class="fa fa-cogs"></i></a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <div class="sidebar-title">
                    <h5><i class="fa fa-th" aria-hidden="true"></i>
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Select Skins' contenteditable="true">
                                {{ __('Select Skins') }}
                            </editor_block>
                        @else
                            {{ __('Select Skins') }}
                        @endif
                    </h5>
                </div>
                <br>
                <div class="color-theme-panel">
                    <div class="themes-scroll">
                        <h6>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Sidebar Layout' contenteditable="true">
                                    {{ __('Sidebar Layout') }}
                                </editor_block>
                            @else
                                {{ __('Sidebar Layout') }}
                            @endif
                        </h6>
                        <div class="theme-color">
                            <a class="btn-sidebar-theme" data-myattr="white-theme" href="#">
                                <div class="sidebar-white"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="default-theme" href="#">
                                <div class="sidebar-colored"></div>
                            </a>
                        </div>
                        <h6>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Top Navbar' contenteditable="true">
                                    {{ __('Top Navbar') }}
                                </editor_block>
                            @else
                                {{ __('Top Navbar') }}
                            @endif
                        </h6>
                        <div class="theme-color">
                            <a class="btn-header-theme" data-myattr="topNav-white-theme" href="#">
                                <div class="theme-29"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-default-theme" href="#">
                                <div class="theme-5"></div>
                            </a>
                        </div>
                        <h6>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Header Color' contenteditable="true">
                                    {{ __('Header Color') }}
                                </editor_block>
                            @else
                                {{ __('Header Color') }}
                            @endif
                        </h6>
                        <div class="theme-color">
                            <a class="btn-header-theme" data-myattr="topNav-blue-theme" href="#">
                                <div class="theme-1"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-brown-theme" href="#">
                                <div class="theme-2"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-dark-gray-theme" href="#">
                                <div class="theme-3"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-dark-pink-theme" href="#">
                                <div class="theme-4"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-default-theme" href="#">
                                <div class="theme-5"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-gray-theme" href="#">
                                <div class="theme-6"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-green-theme" href="#">
                                <div class="theme-7"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-light-blue-theme" href="#">
                                <div class="theme-8"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-light-green-theme" href="#">
                                <div class="theme-9"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-orange-theme" href="#">
                                <div class="theme-10"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-purple-theme" href="#">
                                <div class="theme-11"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-red-theme" href="#">
                                <div class="theme-12"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-sky-theme" href="#">
                                <div class="theme-13"></div>
                            </a>
                            <a class="btn-header-theme" data-myattr="topNav-yellow-theme" href="#">
                                <div class="theme-14"></div>
                            </a>
                        </div>
                        <h6>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Sidebar Color' contenteditable="true">
                                    {{ __('Sidebar Color') }}
                                </editor_block>
                            @else
                                {{ __('Sidebar Color') }}
                            @endif
                        </h6>
                        <div class="theme-color">
                            <a class="btn-sidebar-theme" data-myattr="blue-theme" href="#">
                                <div class="theme-15"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="brown-theme" href="#">
                                <div class="theme-16"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="dark-gray-theme" href="#">
                                <div class="theme-17"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="dark-pink-theme" href="#">
                                <div class="theme-18"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="default-theme" href="#">
                                <div class="theme-19"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="gray-theme" href="#">
                                <div class="theme-20"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="green-theme" href="#">
                                <div class="theme-21"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="light-blue-theme" href="#">
                                <div class="theme-22"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="light-green-theme" href="#">
                                <div class="theme-23"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="orange-theme" href="#">
                                <div class="theme-24"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="purple-theme" href="#">
                                <div class="theme-25"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="red-theme" href="#">
                                <div class="theme-26"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="sky-theme" href="#">
                                <div class="theme-27"></div>
                            </a>
                            <a class="btn-sidebar-theme" data-myattr="yellow-theme" href="#">
                                <div class="theme-28"></div>
                            </a>
                        </div>
                    </div>
                    <div class="sidebar-content">
                        <strong>
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Notes:' contenteditable="true">
                                    {{ __('Notes:') }}
                                </editor_block>
                            @else
                                {{ __('Notes:') }}
                            @endif
                        </strong>
                        <div class="small">
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.' contenteditable="true">
                                    {{ __('Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.') }}
                                </editor_block>
                            @else
                                {{ __('Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane">
                <div class="sidebar-title">
                    <h5><i class="fa fa-gears"></i>
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Theme Settings' contenteditable="true">
                                {{ __('Theme Settings') }}
                            </editor_block>
                        @else
                            {{ __('Theme Settings') }}
                        @endif
                    </h5>
                </div>
                <div class="setting-scroll">
                    <div class="setings-item">
                                <span>
                                    @if(canEditLang() && checkRequestOnEdit())
                                        <editor_block data-name='Fix Navbar' contenteditable="true">
                            {{ __('Fix Navbar') }}
                        </editor_block>
                                    @else
                                        {{ __('Fix Navbar') }}
                                    @endif
                                </span>
                        <div class="switch float-right">
                            <div class="onoffswitch">
                                <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                       id="fixed-top-navbar">
                                <label class="onoffswitch-label" for="fixed-top-navbar">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="setings-item">
                                <span>
                                    @if(canEditLang() && checkRequestOnEdit())
                                        <editor_block data-name='Fixed Footer' contenteditable="true">
                            {{ __('Fixed Footer') }}
                        </editor_block>
                                    @else
                                        {{ __('Fixed Footer') }}
                                    @endif
                                </span>
                        <div class="switch float-right">
                            <div class="onoffswitch">
                                <input type="checkbox" checked name="collapsemenu" class="onoffswitch-checkbox"
                                       id="fixed-footer">
                                <label class="onoffswitch-label" for="fixed-footer">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-content">
                    <strong>
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Notes:' contenteditable="true">
                                {{ __('Notes:') }}
                            </editor_block>
                        @else
                            {{ __('Notes:') }}
                        @endif
                    </strong>
                    <div class="small">
                        @if(canEditLang() && checkRequestOnEdit())
                            <editor_block data-name='Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.' contenteditable="true">
                                {{ __('Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.') }}
                            </editor_block>
                        @else
                            {{ __('Other Settings is just for demo purpose and it dose not have any javascript configuration script, you can add more configuration buttons to other settings panel.') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
