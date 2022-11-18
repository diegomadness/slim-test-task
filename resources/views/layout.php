<!DOCTYPE html>
<html>
<head>
    {% block head %}
    <link rel="stylesheet" href="/public/css/app.css"/>
    <title>{% block title %}{% endblock %} - Slim Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    {% endblock %}
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ path_for('index') }}">Slim blog</a>
        <a class="btn btn-outline-success" href="{{ path_for('login') }}">Log in</a>
    </div>
</nav>
<div id="content">
    {% block content %}{% endblock %}
</div>

{% block scripts %}
{% endblock %}
</body>
</html>