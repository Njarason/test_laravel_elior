@component('mail::message')
# Cher {{ $data->expediteur }},
<div>
 <?php 
        echo($data->content_email.'<span style="color: blue"><u>'.$data->code.'</u></span>');
    ?>
</div>       
<br><br>
Bien à vous,<br>
{{ config('app.name') }}
@endcomponent