@if ($errors->any())
  <div class="my-3">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li><span class="alert_icon lnr lnr-warning"></span>
            <strong>Oh snap! </strong>{{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span class="lnr lnr-cross" aria-hidden="true"></span>
            </button>
          </li>
        @endforeach
      </ul>

    </div>
  </div>
@endif