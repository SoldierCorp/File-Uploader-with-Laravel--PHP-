<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="js/functions.js"></script>

</head>
<body>
	<h1>Uploader de archivos con Laravel</h1>
	<hr><hr>
	<h3>Suba su imagen de perfil</h3>
	<div id="preview" class="thumbnail">
	    <a href="#" id="file-select" class="btn btn-default">Elegir archivo</a>
	    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNzEiIGhlaWdodD0iMTgwIj48cmVjdCB3aWR0aD0iMTcxIiBoZWlnaHQ9IjE4MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijg1LjUiIHk9IjkwIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTcxeDE4MDwvdGV4dD48L3N2Zz4="/>

	</div>
	<span class="alert alert-info" id="file-info">No hay archivo aún</span>

	<form id="file-submit" enctype="multipart/form-data" method="post" action="store">
	    <input id="filename" name="filename" type="file"/>
	    <input type="submit" value="Guardar" id="file-save" class="btn btn-primary"/>
	</form>
	
	@if(Session::has('message'))
		<div class="alert alert-{{ Session::get('class') }}">{{ Session::get('message')}}</div>
	@endif
	<hr>
	<div id="files-uploaded">
		<h4>Imágenes subidas</h4>
		<ul>
			@foreach($images as $image)
				<li title="{{ basename($image) }}">
					<a href="#">
						<img src="{{ $image; }}" alt="">
					</a>
					<span>
						<a href="{{ $image; }}" title="Ver"><span class="glyphicon glyphicon-eye-open"></a>
						<a href="{{ url('destroy',basename($image)) }}" title="Eliminar"><span class="glyphicon glyphicon-remove"></a>
					</span>
				</li>
			@endforeach
		</ul>
	</div>
</body>
</html>