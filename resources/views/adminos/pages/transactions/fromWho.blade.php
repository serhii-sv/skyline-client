@if($operation->type_id == $transferOut->id)
    @if($operation->_teamleader)
        - {{ $operation->_teamleader->login }}
    @elseif($operation->_upliner)
        - {{ $operation->_upliner->login }}
    @endif
@endif
