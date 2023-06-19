
@if ($message = Session::get('success1'))
    <div class="alert1 success1-alert alert-container">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 flex-1">{{ $message }}</p>
            </div>
            <div class="col-2">
                    <button class="btn-close" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('danger1'))
    <div class="alert1 danger1-alert alert-container">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 flex-1">{{ $message }}</p>
            </div>
            <div class="col-2">
                    <button class="btn-close" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('info1'))
    <div class="alert1 info1-aler alert-container">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 flex-1">{{ $message }}</p>
            </div>
            <div class="col-2">
                    <button class="btn-close" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('warning1'))
    <div class="alert1 warning1-alert alert-container">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 flex-1">{{ $message }}</p>
            </div>
            <div class="col-2">
                    <button class="btn-close" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('primary1'))
    <div class="alert1 primary1-alert alert-container">
        <div class="row">
            <div class="col-10">
                <p class="mb-0 flex-1">{{ $message }}</p>
            </div>
            <div class="col-2">
                    <button class="btn-close" aria-hidden="true">&times;</button>
            </div>
        </div>
    </div>
@endif

<style>
  @import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');

  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
  }

  h3 {
      font-family: Quicksand;
  }

  .alert1 {
      width: 20%;
      margin: 20px auto;
      padding: 30px;
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 5px;
      box-shadow: 0 0 15px 5px #ccc;
  }

  

  .simple1-alert {
      background-color: #ebebeb;
      border-left: 5px solid #9a9a9a;
  }

  .simple1-alert .close {
      border-color: #9a9a9a;
      color: #9a9a9a;
  }

  .success1-alert {
      background-color: #a8f0c6;
      border-left: 5px solid #68c997;
  }

  .success1-alert .close {
      border-color: #68c997;
      color: #68c997;
  }

  .danger1-alert {
      background-color: #fdd1da;
      border-left: 5px solid #f80031;
  }

  .danger1-alert .close {
      border-color: #f80031;
      color: #f80031;
  }

  .warning1-alert {
      background-color: #fee6e0;
      border-left: 5px solid #ff3709;
  }

  .warning1-alert .close {
      border-color: #ff3709;
      color: #ff3709;
  }

  .info1-alert {
      background-color:#aaedf9;
      border-left: 5px solid #03acca;
  }

  .info1-alert .close {
      border-color: #03acca;
      color: #03acca;
  }

  .primary1-alert {
      background-color:#eaecfb;
      border-left: 5px solid #2643e9;
  }

  .primary1-alert .close {
      border-color: #2643e9
      color: #2643e9
  }

</style>




