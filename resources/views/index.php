{% extends "layout.php" %}

{% block title %}
All posts
{% endblock %}

{% block content %}
<div class="container my-5">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-1">Dog hugs goose</h3>
                <p class="card-text mb-auto">
                    Aren't these two just the cutest? As you can see, the poster captioned the video with,
                    "What Disney movie is this?" And their sweet hug really does look like something out of a Disney movie doesn't it?
                    Reddit users were quick to give their suggestions for the title of the hypothetical film in the comments.
                    <br>
                    <br>
                    Here are some of the best possible titles that people have come up with so far: Beauty and the Geese,
                    The Honk and the Hound, Beauty and the Beagle, Ducky and the Tramp.
                </p>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="public/img/post0.jpg" class="post-image" />
            </div>
        </div>
    </div>
</div>
{% endblock %}