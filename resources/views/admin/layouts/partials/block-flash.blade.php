@if (Session::has('flashMessage'))
<div id="flash" class="alert alert-{{ Session::get('flashType') }}">
  <p>{!! Session::get('flashMessage') !!}</p>
</div>
@endif
