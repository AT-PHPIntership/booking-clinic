@if (Session::has('flashMessage'))
<div class="alert alert-{{ Session::get('flashType') }}">
  <p>{{ Session::get('flashMessage') }}</p>
</div>
@endif
