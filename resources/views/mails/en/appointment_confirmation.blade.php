@component('mail::message')
# Clinic confirms appointment email

Hello **{{ $appointment->user->name }}**.
Your appointment **#{{ $appointment->id }}**
booked in **{{ $appointment->book_time->format('Y-m-d') }}**
on **{{ $appointment->book_time->format('H:i:s')}}** is **{{ $appointment->status }}**

@component('mail::panel')
{{ $appointment->description }}
@endcomponent

*From {{ $appointment->clinic->name }} clinic*

@endcomponent
