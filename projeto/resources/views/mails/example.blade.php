@component('mail::message')

Hi <b>{{$name}}</b>,

Thank you for yor contact. In a few days we will contact you back.

This is an automatic response.

Review your contact:

Name: {{$name}}
Mail: {{$email}}
Message:{{$message}}





Regards,<br />
BioMed Search Team.

@endcomponent