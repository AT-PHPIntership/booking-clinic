<h1>{{ config('app.name') }}</h1>
<strong>Greeting!</strong>
<p>This is your <a href="{{ route('admin.register', ['q' => $clinic->query]) }}">register link</a>.</p>
<em>Best regards</em>
