
@if ($message = Session::get('success'))
    <div class="alert success-alert">
        <p class="mb-0 flex-1">{{ $message }}</p>
        <a class="close">&times;</a>
    </div>
@endif

@if ($message = Session::get('danger2'))
    <div class="alert danger-alert">
        <p class="mb-0 flex-1">{{ $message }}</p>
        <a class="close">&times;</a>
    </div>
@endif

@if ($message = Session::get('info'))
    <div class="alert info-alert">
        <p class="mb-0 flex-1">{{ $message }}</p>
        <a class="close">&times;</a>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert warning-alert">
        <p class="mb-0 flex-1">{{ $message }}</p>
        <a class="close">&times;</a>
    </div>
@endif

@if ($message = Session::get('primary'))
    <div class="alert primary-alert">
        <p class="mb-0 flex-1">{{ $message }}</p>
        <a class="close">&times;</a>
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

  .alert {
      width: 20%;
      margin: 20px auto;
      padding: 30px;
      position: fixed;
      bottom: 20px;
      right: 20px;
      border-radius: 5px;
      box-shadow: 0 0 15px 5px #ccc;
  }

  .close {
      position: absolute;
      width: 30px;
      height: 30px;
      opacity: 0.5;
      border-width: 1px;
      border-style: solid;
      border-radius: 50%;
      right: 15px;
      top: 25px;
      text-align: center;
      font-size: 1.6em;
      cursor: pointer;
  }

  .simple-alert {
      background-color: #ebebeb;
      border-left: 5px solid #9a9a9a;
  }

  .simple-alert .close {
      border-color: #9a9a9a;
      color: #9a9a9a;
  }

  .success-alert {
      background-color: #a8f0c6;
      border-left: 5px solid #68c997;
  }

  .success-alert .close {
      border-color: #68c997;
      color: #68c997;
  }

  .danger-alert {
      background-color: #fdd1da;
      border-left: 5px solid #f80031;
  }

  .danger-alert .close {
      border-color: #f80031;
      color: #f80031;
  }

  .warning-alert {
      background-color: #fee6e0;
      border-left: 5px solid #ff3709;
  }

  .warning-alert .close {
      border-color: #ff3709;
      color: #ff3709;
  }

  .info-alert {
      background-color:#aaedf9;
      border-left: 5px solid #03acca;
  }

  .info-alert .close {
      border-color: #03acca;
      color: #03acca;
  }

  .primary-alert {
      background-color:#eaecfb;
      border-left: 5px solid #2643e9;
  }

  .primary-alert .close {
      border-color: #2643e9
      color: #2643e9
  }

</style>



 <script>
  $(".close").click(function() {
  $(this)
    .parent(".alert")
    .fadeOut();
});



 </script>
