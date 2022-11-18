{% extends "layout.php" %}

{% block title %}
Sign in
{% endblock %}

{% block content %}
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 p-5 pt-0">
            <h1 class="fs-5">Sign in</h1>
            <form id="loginForm" method="post">
                <div class="form-floating mb-3">
                    <input class="form-control rounded-3" name="username" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control rounded-3" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>
{% endblock %}

{% block scripts %}
<script>
    $("#loginForm").submit(function (event) {
        event.preventDefault();
        $.post("{{ path_for('loginPost') }}", $(this).serialize())
            .done(function (data) {
            location.href ='/admin';
        });
    });
</script>
{% endblock %}