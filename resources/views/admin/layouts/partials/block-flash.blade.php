@if ($message = Session::get('flashMessage'))
<div class="alert alert-{{ Session::get('flashType') }}">
  <p>{{ $message }}</p>
</div>
@endif
