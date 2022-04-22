<tr>
            @php($p = $level)
            <td style="padding-left:{{ $p * 15 }}px;">
                <div class="d-flex align-items-center">
                    <div>
                        <img class="img-40 ml-15 rounded-circle align-top" src="{{ $self->image ? route('accountPanel.profile.get.avatar', $self->id) : asset('accountPanel/images/user/user.png') }}" alt="">
                    </div>
                    <div class="d-inline-block mt-3 ml-4 mb-4">
                        <span style="font-size: 18px;">{{ $self->name }}</span>
                        <p class="font-roboto" style="font-size: 15px; margin-bottom:0;">{{ $self->login }}</p>
                        <p style="margin-top:0;">
                            @if(canEditLang() && checkRequestOnEdit())
                                <editor_block data-name='Линия' contenteditable="true">{{ __('Линия') }}</editor_block>
                            @else
                                {{ __('Линия') }}
                            @endif
                            {{ $level }}
                        </p>
                    </div>
                </div>
            </td>
            <td>{{ $self->phone ?? 'Не указан' }}</td>
            <td>{{ $self->created_at->format('d.m.Y H:i:s') }}</td>
            <td>
                <span class="badge badge-info" style="color: white;font-size: 16px;">{{ cache()->remember('user_partner_login.'.$self->id, now()->addHours(3), function() use($self) { return $self->partner->login ?? 'undefined'; }) }}</span>
            </td>
            <td>
                            <span class="label">
                              {{ number_format($self->invested(), 2, '.', ' ') ?? 0 }}$
                            </span>
            </td>
            <td>
                {{ number_format($self->referral_accruals(auth()->user()), 2, '.', ' ') }}$
            </td>
            <td class="">
                {{ number_format($self->deposits_accruals(), 2, '.', ' ') ?? 0 }}$
            </td>

        </tr>
<tr>
    <td colspan="7">
        <div class="wrap-collabsible">
            <input id="collapsible{{ $self->id }}" class="toggle" type="checkbox">
            <label for="collapsible{{ $self->id }}" data-user_id="{{ $self->id }}" data-level="{{ $level }}" class="lbl-toggle">
                @if(canEditLang() && checkRequestOnEdit())
                    <editor_block data-name='Показать рефералов пользователя' contenteditable="true">{{ __('Показать рефералов пользователя') }}</editor_block>
                @else
                    {{ __('Показать рефералов пользователя') }} {{ $self->login }}
                @endif
            </label>
            <div class="collapsible-content">
                <div class="content-inner">

                </div>
            </div>
        </div>
    </td>
</tr>
