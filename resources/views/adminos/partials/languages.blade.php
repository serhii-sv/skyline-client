<div style="display: flex; justify-content: space-between; {{ !Route::is('accountPanel.*') ? 'margin-bottom: 20px;' : '' }} align-items: center">
    <div class="language">
        <p class="language__name"><span>{{ !empty(session('language')) ? session('language') : 'ru' }}</span></p>
        <ul class="language__list">
            @foreach(App\Models\Language::all() as $lang)
                <li class="language__item">
                    <a href="{{ route('set.lang', ['locale' => $lang->code]) }}"><button class="language__button">{{ session('lang') == 'ru' ? $lang->name : $lang->original_name }}</button></a>
                </li>
            @endforeach
        </ul>
    </div>
    @if(!Route::is('accountPanel.*'))
        <div class="">
            <a class="back" href="https://skyline.limited/" @if(canEditLang() && checkRequestOnEdit()) onclick="event.preventDefault()" @endif>
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Вернуться на сайт' contenteditable="true">{{ __('Вернуться на сайт') }}</editor_block>
                @else
                    {{ __('Вернуться на сайт') }}
                @endif
            </a>
        </div>
    @endif
</div>
