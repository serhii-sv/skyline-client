
    <thead>
    <tr>
        <th class="f-22">
            @if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='User acc' contenteditable="true">{{ __('User acc') }}</editor_block> @else {{ __('User acc') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Telephone acc' contenteditable="true">{{ __('Telephone acc') }}</editor_block> @else {{ __('Telephone acc') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Date/Time of registration acc' contenteditable="true">{{ __('Date/Time of registration acc') }}</editor_block> @else {{ __('Date/Time of registration acc') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Upliner login acc' contenteditable="true">{{ __('Upliner login acc') }}</editor_block> @else {{ __('Upliner login acc') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Invested acc' contenteditable="true">{{ __('Invested acc') }}</editor_block> @else {{ __('Invested acc') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Reward acc 3' contenteditable="true">{{ __('Reward acc 3') }}</editor_block> @else {{ __('Reward acc 3') }} @endif
        </th>
        <th>@if(canEditLang() && checkRequestOnEdit())
                <editor_block data-name='Accruals acc' contenteditable="true">{{ __('Accruals acc') }}</editor_block> @else {{ __('Accruals acc') }} @endif
        </th>
    </tr>
    </thead>
