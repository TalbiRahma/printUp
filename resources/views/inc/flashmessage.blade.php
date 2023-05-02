@if($message = Session::get('warning'))
  <div class="alert alert-warning" role="alert">
    <p class="mb-0 flex-1">{{$message}}</p>
  </div>
@endif


@if($message = Session::get('success'))
  <div class="alert alert-success" role="alert">
    <p class="mb-0 flex-1">{{$message}}</p>
  </div>
@endif

@if($message = Session::get('danger'))
<div class="alert alert-danger" role="alert">
    <p class="mb-0 flex-1">{{$message}}</p>
  </div>
@endif