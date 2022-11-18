{% extends "layout.php" %}

{% block title %}
All posts
{% endblock %}

{% block content %}


{% for post in posts %}
<div class="container my-5" id="post-{{ post.id }}">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <input id="post-title-{{ post.id }}" class="mb-1" value="{{ post.title|e }}" placeholder="Post title" onkeydown="onEdit({{ post.id }})"/>
                <textarea onkeydown="onEdit({{ post.id }})" id="post-content-{{ post.id }}" class="edit-post-content mb-auto" rows="15" placeholder="Type something awesome">{{ post.content }}</textarea>
                <div class="mb-3 mt-3 text-right">
                    <button type="button" class="btn btn-success btn-sm" onclick="updatePost({{ post.id }})">Save changes</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="deletePost({{ post.id }})">Delete post</button>
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
{% endfor %}

<div class="container my-5">
    <div class="row col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <input id="new-title" type="text" class="mb-1" placeholder="Post title"/>
                <textarea id="new-content" class="edit-post-content mb-auto" rows="15" placeholder="Type something awesome"></textarea>
                <div class="mb-3 mt-3 text-right">
                    <button type="button" class="btn btn-success btn-sm" onclick="createPost()">Post</button>
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

{% block scripts %}
<script>
    $("#loginForm").submit(function (event) {
        event.preventDefault();
        $.post("{{ path_for('loginPost') }}", $(this).serialize())
            .done(function (data) {
                console.log(data)
            });
    });

    function deletePost(id) {
        $.post("{{ path_for('deletePost') }}", {id:id})
            .done(function (data) {
                $("#post-"+id).remove();
            });
    }

    function onEdit(id) {
        $("#post-title-"+id).css("color", "#b73b0c");
        $("#post-content-"+id).css("color", "#b73b0c");

    }

    function updatePost(id) {
        const titleInput = $("#post-title-"+id);
        const contentInput = $("#post-content-"+id);
        $.post("{{ path_for('updatePost') }}", {id:id, title:titleInput.val(), content:contentInput.val()})
            .done(function (data) {
                titleInput.css("color", "green");
                contentInput.css("color", "green");
            });
    }

    function createPost() {
        const title = $("#new-title").val();
        const content = $("#new-content").val();
        $.post("{{ path_for('createPost') }}", {title:title, content:content})
            .done(function (data) {
                location.href = "/admin";//way faster compared to making new block :D
            });
    }
</script>
{% endblock %}