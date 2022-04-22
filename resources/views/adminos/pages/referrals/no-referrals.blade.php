<div class="d-flex justify-content-center w-100">
    @if(canEditLang() && checkRequestOnEdit())
        <editor_block data-name='У этого пользователя еще нет рефералов' contenteditable="true">{{ __('У этого пользователя еще нет рефералов') }}</editor_block>
    @else
        {{ __('У этого пользователя еще нет рефералов') }}
    @endif
</div>
