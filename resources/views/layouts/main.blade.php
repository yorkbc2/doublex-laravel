<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@isset($title)
			{{$title}} :: Бердичів.com.ua - Сайт для всіх: від молоді до старих
		@else
			Бердичів.com.ua - Сайт для всіх: від молоді до старих
		@endisset
		</title>
	<link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="/css/desktop.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
	@yield("content")
	
	<script src="/js/app.js"></script>
</body>
</html>