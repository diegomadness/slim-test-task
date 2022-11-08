{% extends "layout.php" %}

{% block title %}
All posts
{% endblock %}

{% block content %}
{% for post in posts %}
<div class="container my-5">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-1">{{ post.title|e }}</h3>
                <p class="card-text mb-auto">
                    {{ post.content }}
                </p>
            </div>
            <!--div class="col-auto d-none d-lg-block">
                <img src="public/img/post0.jpg" class="post-image" />
            </div-->
        </div>
    </div>
</div>
{% endfor %}
{% endblock %}