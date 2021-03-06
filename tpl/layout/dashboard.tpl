<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>{% block title %}{% endblock %}</title>

		<!-- Bootstrap core CSS -->
		<link href="/css/libs/bootstrap/bootstrap.min.css" rel="stylesheet">
		<!-- Bootstrap theme -->
		<link href="/css/libs/bootstrap/bootstrap-theme.min.css" rel="stylesheet">
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="/css/libs/bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="/css/recept.css" rel="stylesheet">
	</head>

	<body role="document">
		{% block menu %}
		<!-- Fixed navbar -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Cookbook.dev</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="/recepten">Recepten</a></li>
						<li><a href="/ingredienten">Ingrediënten</a></li>
						<li><a href="/hoeveelheden">Hoeveelheden</a></li>
						<li><a href="/logout">Uitloggen</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		{% endblock %}

		{% block content %}{% endblock %}

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
		<script src="/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="/js/libs/bootstrap/ie10-viewport-bug-workaround.js"></script>
		{% if js %}{% for jsfile in js %}
			<script src="{{ jsfile }}"></script>
		{% endfor %}{% endif %}
	</body>
</html>
