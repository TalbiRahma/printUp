@if($message = Session::get('warning'))
  <div class="alert alert-warning" role="alert">
    <p class="mb-0 flex-1">{{$message}}</p>
  </div>
@endif