@if (session('info'))
  <div class="alert alert-success">
    <strong>{{  session('info') }}</strong>
  </div>
@endif

@if (session('danger'))
  <div class="alert alert-danger">
    <strong>{{  session('danger') }}</strong>
  </div>
@endif