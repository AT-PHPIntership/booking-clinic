<h1>{{ config('app.name') }}</h1>
<strong>Greeting!</strong>
<p>Hello {{$appointment->user->name}}</p>
<p>Your appointment # {{ $appointment->id }} book in
  {{ $appointment->book_time->day . '/' . $appointment->book_time->month . '/' . $appointment->book_time->year }}
  on {{ $appointment->book_time->hour . ':' . $appointment->book_time->hour . ':' . $appointment->book_time->second }} is {{$appointment->status}} </p>
<em>From {{ $appointment->clinic->name }} clinic</em>
