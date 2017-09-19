<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		@isset($title)
			{{$title}}
		@else
			{{__("titles.index")}}
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