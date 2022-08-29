<!-- Template de page de journal de board -->
{{ include('header.php', {title:'Journal de Board'})}}


<div class='blog__list'>

    {% if session.privilege_id == 1 %}
    <div class='journal-top-bar mb-5'>
        <div>Bienvenue {{ user.username}}, Vous êtes un administrateur</div>
        <div>IP: {{ ip }}</div>
        <div>Date: {{ date }}</div>
    </div>
        <div class='journal-gestion'>
            <a href="{{path}}user/list">Liste de l'utilisateur</a>
            <a href="{{path}}user/create">Ajouter l'utilisateur</a>
            <a href="{{path}}post/create">Ajouter Blog</a>
            <a href="{{path}}post/list">Liste de mon Blogs</a>
        </div>
    
    {% elseif session.privilege_id == 2 %}
    <div class='journal-top-bar mb-5'>
        <div>Bienvenue {{ user.username}}, Vous êtes un utilisateur</div>
        <div>IP: {{ ip }}</div>
        <div>Date: {{ date }}</div>
    </div>
    <div class='journal-gestion'>
        <a href="{{path}}post/list">Liste de mon Blogs</a>
        <a href="{{path}}post/create">Ajouter Blog</a>
    </div>
    {% else %}
    <div class='journal-top-bar mb-5'>
        <div>Bienvenue visiteur, Vous êtes un visiteur</div>
        <div>IP: {{ ip }}</div>
        <div>Date: {{ date }}</div>
    </div>
    <div class='journal-gestion'>
        <a href="{{path}}">All Blogs</a>
        <a href="{{path}}login">Login</a>
    </div>
    {% endif %}


</div>





{{ include('footer.php') }}