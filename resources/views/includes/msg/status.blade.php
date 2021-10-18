@if (session('statusMsg'))
    <div class="alert @if (session('statusError'))
        {{ "alert-danger" }}
    @else
        {{"alert-success" }}
    @endif  alert-dismissible ">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('statusMsg') }}
    </div>
@endif

 