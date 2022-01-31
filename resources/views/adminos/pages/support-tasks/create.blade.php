@extends('adminos.layouts.account')
@section('title')
    Create task
@endsection
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <!--Page Content-->
                <div class="wrapper wrapper-content">
                    {{ Breadcrumbs::render('settings.support-tasks.create') }}
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-content">
                                    <form class="form-horizontal m-4" novalidate="novalidate" method="post" action="{{ route('accountPanel.support-tasks.store') }}">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Task Title' contenteditable="true">{{ __('Task Title') }}</editor_block> @else {{ __('Task Title') }} @endif</label>
                                            <div class="col-sm-6">
                                                <input class="form-control" type="text" name="title" placeholder="{{ __('Task Title') }}" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="address">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Task Description' contenteditable="true">{{ __('Task Description') }}</editor_block> @else {{ __('Task Description') }} @endif</label>
                                            <div class="col-sm-6">
                                                <textarea class="form-control" name="description" rows="5" cols="5" placeholder="{{ __('Task Description') }}">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9 offset-sm-4">
                                                <button type="submit" class="btn btn-primary">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Save' contenteditable="true">{{ __('Save') }}</editor_block> @else {{ __('Save') }} @endif</button>
                                                <a class="btn btn-light" href="{{ route('accountPanel.support-tasks.index') }}">@if(canEditLang() && checkRequestOnEdit())<editor_block data-name='Cancel' contenteditable="true">{{ __('Cancel') }}</editor_block> @else {{ __('Cancel') }} @endif</a>
                                            </div>
                                        </div>
                                    </form>
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

@push('scripts')

@endpush
