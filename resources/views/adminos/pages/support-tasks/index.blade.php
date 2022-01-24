@extends('adminos.layouts.account')
@section('title')
    Support tasks
@endsection
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        @include('adminos.partials.breadcrumbs')
                        <div class="row">
                            <div class="col-xl-12 col-md-12 box-col-12">
                                <div class="email-right-aside bookmark-tabcontent">
                                    <div class="card email-body radius-left">
                                        <div class="ps-0">
                                            <div class="tab-content">
                                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                                    <div class="card mb-0">
                                                        <div class="card-header d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='Created by me' contenteditable="true">{{ __('Created by me') }}</editor_block> @else {{ __('Created by me') }} @endif</h5>
                                                            <a href="{{ route('accountPanel.support-tasks.create') }}" class="btn btn-primary">
                                                                <i class="me-2" data-feather="check-circle"></i>
                                                                @if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='New Task' contenteditable="true">{{ __('New Task') }}</editor_block> @else {{ __('New Task') }} @endif
                                                            </a>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div class="taskadd">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                            <th></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @forelse($tasks as $task)
                                                                        <tr>
                                                                            <th scope="row"></th>
                                                                            <td>{{ $task->title }}</td>
                                                                            <td>{{ $task->description }}</td>
                                                                            <td>
                                                                                <a class="me-2" href="{{ route('accountPanel.support-tasks.show', $task->id) }}">
                                                                                    <i class="fa fa-eye"></i>
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        @empty
                                                                            <tr>
                                                                                <td>
                                                                                    <div class="d-flex justify-content-center">
                                                                                        <p>@if(canEditLang() && checkRequestOnEdit()) <editor_block data-name='No tasks' contenteditable="true">{{ __('No tasks') }}</editor_block> @else {{ __('No tasks') }} @endif</p>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        @endforelse
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
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
            </div>
        </div>

@endsection

@push('scripts')

@endpush
