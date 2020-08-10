@if($errors->any() && $errors || session("error"))
<div class="alert alert-danger">
    <ul>
        @if($errors->any() && $errors)
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        @if(session("error"))
            <li>{{ session("error") }}</li>
        @endif
    </ul>
</div>
@endif
@if(session("success"))
    <div class="alert alert-success">{{ session("success") }}</div>
@endif
