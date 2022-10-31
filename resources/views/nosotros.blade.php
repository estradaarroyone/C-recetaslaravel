<h1> Desde nosotros blade.php</h1>
@php
  $variable=20;
@endphp
{{"El valor de la variable es: ".$variable}}
<br>
@if($variable===20)
{{"Si es 20"}}
@endif
