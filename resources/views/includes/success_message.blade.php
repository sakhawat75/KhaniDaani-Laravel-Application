@if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    <span class="alert_icon lnr lnr-checkmark-circle"></span>
    <strong>Well done!</strong> {!! Session::get('success') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span class="lnr lnr-cross" aria-hidden="true"></span>
    </button>
  </div>
@endif
