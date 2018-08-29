@component('mail::message')
# Clinic confirms appointment email

Hello **{{ $appointment->user->name }}**.
Your appointment **#{{ $appointment->id }}**
booked in **{{ $appointment->book_time->format('Y-m-d') }}**
on **{{ $appointment->book_time->format('H:i:s')}}** is **{{ $appointment->status }}**

{{ $appointment->description }}

@if ($appointment->isCompleted())
@component('mail::panel')
#Examination result

**Diagnostic:** {{ $appointment->examination->diagnostic}}

**Result:** {{ $appointment->examination->result}}
@endcomponent
@endif

*From {{ $appointment->clinic->name }} clinic*

@endcomponent
