<h1>{{ config('app.name') }}</h1>
<strong>Greeting!</strong>
<p>Hello {{$appointment->user->name}}</p>
<p>Your appointment Id {{ $appointment->id }} book in {{ $appointment->book_time }} is {{$appointment->status}} </p>
<em>From {{ $appointment->clinic->name }}</em>
