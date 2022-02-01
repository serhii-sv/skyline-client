@extends('adminos.layouts.account')
@section('title')
    Stikers
@endsection
@push('scripts')
    <link rel="stylesheet" href="{{ asset('adminos/plugins/bootstrap4-editable/css/bootstrap-editable.css') }}">
    <style>
        .has-error {
            border-color: #dc3545;
        }
    </style>
@endpush
@section('content')
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <!--Page Content-->
                    <div class="wrapper wrapper-content">
                        {{ Breadcrumbs::render('shop') }}
                        <div class="row">
                            <div class="col-lg-12">
                                <button data-toggle="modal" data-target="#createModal" type="button" class="btn btn-primary float-right">
                                    @if(canEditLang() && checkRequestOnEdit())
                                        <editor_block data-name='Добавить стикер' contenteditable="true">{{ __('Добавить стикер') }}</editor_block>
                                    @else
                                        {{ __('Добавить стикер') }}
                                    @endif
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="pin-board" id="draggablePanelList">
                                @foreach($stickers as $sticker)
                                    <li class="pin-board-info" id="sticker_{{ $sticker->id }}">
                                        <div class="change-color sticker-wrap" style="color: {{ $sticker->text_color }}; background-color: {{ $sticker->sticker_color }}">
                                            <small class="task editable" data-type="text" data-field="category" data-placement="right" data-title="Введите тему">{{ $sticker->category }}</small>
                                            <small class="pull-right editable editable-click date" data-type="text" data-placement="right" style="padding-top: 2px;">
                                                <i class="far fa-clock"></i> {{ $sticker->created_at->format('Y-m-d H:i') }}
                                            </small>
                                            <h4 class="editable editable-click pin-board-title" data-type="text" data-field="title" data-placement="right" data-title="Введите заголовок">{{ $sticker->title }}</h4>
                                            <p style="color: {{ $sticker->text_color }}" data-type="textarea" data-pk="1" data-field="description" data-placeholder="Ваше сообщение здесь" data-title="Введите сообщение" class="editable editable-pre-wrapped editable-click pin-board-text pin-board-message change-color">{{ $sticker->description }}</p>
                                            <a href="#" class="pin-board-delete">
                                                <i style="color: {{ $sticker->text_color }}" class="fa fa-trash change-color"></i>
                                            </a>
                                            <a class="settings" href="#" data-toggle="modal" data-target="#settingsModal" data-text_color="{{ $sticker->text_color }}" data-sticker_color="{{ $sticker->sticker_color }}" data-sticker_id="{{ $sticker->id }}">
                                                <i style="color: {{ $sticker->text_color }}" class="fa fa-gear change-color"></i>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @include('adminos.partials.footer')
                </div>
            </div>
        </div>

        <div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Настройки</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="" id="settingsForm">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="stickerColor">Цвет Стикера</label>
                                <input type="color" class="form-control" id="stickerColor" name="sticker_color" value="#FFFFFF">
                            </div>
                            <div class="form-group">
                                <label for="textColor">Цвет Текста</label>
                                <input type="color" class="form-control" id="textColor" name="text_color">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm close-modal" data-dismiss="modal">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Создать стикер</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="createForm" action="{{ route('accountPanel.stickers.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="category">Тема</label>
                                <input type="text" name="category" class="form-control" id="category">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" name="title" class="form-control" id="title">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="stickerColor">Цвет Стикера</label>
                                <input type="color" name="text_color" class="form-control" id="stickerColor" value="#FFFFFF">
                            </div>
                            <div class="form-group">
                                <label for="textColor">Цвет Текста</label>
                                <input type="color" name="sticker_color" class="form-control" id="textColor">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
    <script src="{{ asset('adminos/plugins/bootstrap4-editable/js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('adminos/plugins/sortable/js/Sortable.js') }}"></script>
    <script>
        $(function () {
            Sortable.create(draggablePanelList, {
                group: 'draggablePanelList',
                animation: 150
            });
        });

        let stickerID = 0;
        let text_color = null;
        let sticker_color = null;

        let $sticker = null;

        $('.settings').on('click', function(){
            let modal = $('#settingsModal');

            stickerID = $(this).data('sticker_id');

            text_color = $(this).data('text_color');
            sticker_color = $(this).data('sticker_color');

            modal.find('#textColor').val(text_color);
            modal.find('#stickerColor').val(sticker_color);

            $sticker = $('#sticker_' + stickerID)
        });

        let color = document.getElementById('textColor');

        color.addEventListener('input', function(e) {
            console.log($($sticker), $sticker)
            $($sticker).find('.change-color').css({"color": this.value})
        });

        let color2 = document.getElementById('stickerColor');

        color2.addEventListener('input', function(e) {
            $($sticker).find('.sticker-wrap').css({"background-color": this.value})
        });

        $('.close-modal').click(function () {
            $($sticker).find('.change-color').css({"color": text_color})
            $($sticker).find('.sticker-wrap').css({"background-color": sticker_color})
        })

        $('#settingsForm').submit(function () {
            $.ajax({
                method: 'post',
                url: '/stickers/update/' + stickerID + '/color',
                data: $(this).serialize(),
                dataType: 'json',
                success: (response) => {
                    (new PNotify({
                        type: response.success ? 'success' : 'error',
                        text: response.message,
                    })).get();

                    setTimeout(() => {
                        location.reload();
                    }, 1000)
                },
                error: (xhr) => {
                    (new PNotify({
                        type: 'error',
                        text: 'Неизвестная ошибка',
                    })).get();
                }
            })
            return false;
        })

        let field = null;

        $('.editable').click(function () {
            stickerID = $(this).closest('.pin-board-info').attr('id').replace('sticker_', '')
            field = $(this).data('field');
        });

        $(document).on('click', '.editable-submit', function () {
            let data = {};

            data['field'] = field;
            data[field] = $('.editable-input input').val();
            data['_token'] = $('meta[name="csrf-token"]').attr('content')

            $.ajax({
                method: 'post',
                url: '/stickers/update/' + stickerID,
                data: data,
                dataType: 'json',
                success: (response) => {
                    (new PNotify({
                        type: response.success ? 'success' : 'error',
                        text: response.message,
                    })).get();
                },
                error: (xhr) => {
                    (new PNotify({
                        type: 'error',
                        text: 'Неизвестная ошибка',
                    })).get();

                    return false;
                }
            })
        })

        //Pin Board bg-info
        $('.pin-board-info .task').editable({
            showbuttons: 'bottom',
        });

        $('.pin-board-info .task').editable({
            showbuttons: 'bottom'
        });
        // $('.pin-board-info .date').editable({
        //     showbuttons: 'bottom'
        // });
        $('.pin-board-title').editable({
            showbuttons: 'bottom'
        });
        $('.pin-board-message').editable({
            showbuttons: 'bottom'
        });
        //Delete Pin Board Info
        $('.pin-board-delete').click(function(){
            stickerID = $(this).closest('.pin-board-info').attr('id').replace('sticker_', '')
            swal({
                    title: "Уверены что хотите удалить стикер?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Да",
                    cancelButtonText: "Нет",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((isConfirm) => {
                    if (isConfirm) {
                        $.ajax({
                            method: 'get',
                            url: '/stickers/delete/' + stickerID,
                            dataType: 'json',
                            success: (response) => {
                                (new PNotify({
                                    type: response.success ? 'success' : 'error',
                                    text: response.message,
                                })).get();
                                $(this).closest('.pin-board-info').css('display', 'none');
                            },
                            error: (xhr) => {
                                (new PNotify({
                                    type: 'error',
                                    text: 'Неизвестная ошибка',
                                })).get();

                                return false;
                            }
                        })
                    }
                });

        });

        $('#createForm').submit(function () {
            clearErrors();
            $.ajax({
                method: 'post',
                url: '{{ route('accountPanel.stickers.store') }}',
                data: $(this).serialize(),
                dataType: 'json',
                success: (response) => {
                        (new PNotify({
                            type: response.success ? 'success' : 'error',
                            text: response.message,
                        })).get();

                        setTimeout(() => {
                            location.reload();
                        }, 1000)
                },
                error: (xhr) => {
                    let errors = xhr.responseJSON.errors
                    Object.keys(errors).map((field) => {
                        console.log(field)
                        let error = errors[field][0]
                        let wrap = $('#' + field).closest('div');

                        wrap.find('.form-control').addClass('has-error');
                        wrap.find('.invalid-feedback').text(error).show()
                    })
                }
            })
            return false;
        })

        function clearErrors() {
            $('.form-control').removeClass('has-error');
            $('.invalid-feedback').hide();
        }
    </script>
@endpush
