{{--<!--Main Content-->--}}
{{--<div class="row mb-3">--}}
{{--    <div class="col-sm-12 col-md-7 col-lg-8 col-xl-8">--}}
{{--        @if (isset($breadcrumbs) && count($breadcrumbs))--}}
{{--            <ol class="breadcrumb">--}}
{{--                @foreach ($breadcrumbs as $breadcrumb)--}}
{{--                    @if ($breadcrumb->url && !$loop->last)--}}
{{--                        <li class="breadcrumb-item">--}}
{{--                            <a href="{{ $breadcrumb->url }}" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif class="{{ $loop->first ? 'default' : '' }}">--}}
{{--                                @if(canEditLang() && checkRequestOnEdit())--}}
{{--                                    <editor_block data-name='{{ $breadcrumb->title  }}' contenteditable="true">--}}
{{--                                        {{ __( $breadcrumb->title ) }}--}}
{{--                                    </editor_block>--}}
{{--                                @else--}}
{{--                                    {{ __( $breadcrumb->title ) }}--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @else--}}
{{--                        <li class="breadcrumb-item active"><a href="#" class="{{ $loop->first ? 'default' : '' }}">--}}
{{--                                @if(canEditLang() && checkRequestOnEdit())--}}
{{--                                    <editor_block data-name='{{ $breadcrumb->title  }}' contenteditable="true">--}}
{{--                                        {{ __( $breadcrumb->title ) }}--}}
{{--                                    </editor_block>--}}
{{--                                @else--}}
{{--                                    {{ __( $breadcrumb->title ) }}--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                @endforeach--}}
{{--            </ol>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <div class="col-sm-12 col-md-5 col-lg-4 col-xl-4 text-center">--}}
{{--        <span id="today" class="float-right"></span>--}}
{{--    </div>--}}
{{--</div>--}}
