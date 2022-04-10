@foreach($filteredReferrals as $self)
    <tr>
        <td>
            <div class="d-flex align-items-center">
                <div>
                    <img class="img-40 ml-15 rounded-circle align-top" src="{{ $self->image ? route('accountPanel.profile.get.avatar', $self->id) : asset('accountPanel/images/user/user.png') }}" alt="">
                </div>
                <div class="d-inline-block mt-3 ml-4">
                    <span style="font-size: 18px;">{{ $self->name }}</span>
                    <p class="font-roboto" style="font-size: 15px; margin-bottom:0;">{{ $self->login }}</p>
{{--                    <p style="margin-top:0;">линия {{ $level }}</p>--}}
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
@endforeach
