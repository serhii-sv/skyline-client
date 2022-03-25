@if($operation->source)
    @php $user = \App\Models\User::where('email', $operation->source)->orWhere('id', $operation->source)->first() @endphp
    @if($user)
        - {{ $user->login }}
    @endif
@endif
