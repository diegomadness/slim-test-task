{% extends "layout.php" %}

{% block title %}
All posts
{% endblock %}

{% block content %}
<div class="container my-5">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <input class="mb-1" value="Dog hugs goose" placeholder="Post title"/>
                <textarea class="edit-post-content mb-auto" rows="15" placeholder="Type something awesome">
Aren't these two just the cutest? As you can see, the poster captioned the video with,
                    "What Disney movie is this?" And their sweet hug really does look like something out of a Disney movie doesn't it?
Reddit users were quick to give their suggestions for the title of the hypothetical film in the comments.
                    <br>
                    <br>
                    Here are some of the best possible titles that people have come up with so far: Beauty and the Geese,
                    The Honk and the Hound, Beauty and the Beagle, Ducky and the Tramp.
                </textarea>
                <div class="mb-3 mt-3 text-right">
                    <button type="button" class="btn btn-success btn-sm">Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm">Delete post</button>
                </div>
            </div>
            <!--div class="col-auto d-none d-lg-block">
                <img src="/public/img/post0.jpg" class="post-image" />
                <div class="mt-3 mb-3 text-center">
                    <button type="button" class="btn btn-success btn-sm">Attach image</button>
                </div>
                <div class="mt-3 mb-3 text-center">
                    <button type="button" class="btn btn-danger btn-sm">Remove image</button>
                </div>
            </div-->

        </div>
    </div>
</div>


<div class="container my-5">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <input type="text" class="mb-1" placeholder="Post title"/>
                <textarea class="edit-post-content mb-auto" rows="15" placeholder="Type something awesome"></textarea>
                <div class="mb-3 mt-3 text-right">
                    <button type="button" class="btn btn-success btn-sm">Post</button>
                    <button type="button" class="btn btn-danger btn-sm">Discard changes</button>
                </div>
            </div>
            <!--div class="col-auto d-none d-lg-block">

                <div class="mt-3 mb-3 text-center">
                    <form method="POST" action="{{ path_for('index') }}" enctype="multipart/form-data">
                        <input type="image" class="form-control" name="image" />
                        <button type="button" class="btn btn-success btn-sm">Attach image</button>
                    </form>
                </div>
                <div class="mt-3 mb-3 text-center">
                    <button type="button" class="btn btn-danger btn-sm">Remove image</button>
                </div>
            </div-->

        </div>
    </div>
</div>
{% endblock %}