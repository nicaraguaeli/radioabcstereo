<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
</head>
<body>
        
<h4>Nombre: </h4> {{ $datos['name'] }}
<h4>Asunto: </h4> {{ $datos['subject'] }}.
<h4>Correo: </h4> {{$datos['email']}}
<h4>Mensaje</h4>  {{$datos['message']}}

<p>Favor no responder a este correo, Soporte ABC</p>


</body>
</html>