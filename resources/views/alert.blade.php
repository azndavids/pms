@if(session()->has('alert-msg'))
    <div class="alert alert-{{ session('alert-type') }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('alert-msg') }}
    </div>
@endif
