@if(session()->has('alert-message'))
    <div class="alert {{ session('alert-type', 'alert-success') }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('alert-message') }}
    </div>
@endif
