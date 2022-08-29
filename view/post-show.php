<!-- Template de Details de Blog -->
{{ include('header.php') }}
       <div class='blog__list'>
         {% if usid == post.creatorId or privilegeId == 1 %}
            <div class='card mb-4' style='width: 60vw;'>
                <div class='card-body'>
                    <h5 class='card-title'>{{post.title}}</h5>
                    <h6 class='card-subtitle mb-4 text-muted'>
                        Auteur: <span class='span--modify'>{{user.username}}</span>
                    </h6>
                    <p class='card-text'>{{post.content}}</p>
                    <p>
                        <span class='span--modify'><a href='{{ path }}post/edit/{{post.id}}'>modifier</a></span>
                        <span class='span--modify'><a href='{{ path }}post/delete/{{post.id}}'>effacer</a></span>
                    </p>
                </div>
            </div>
        {% endif %}
        <a href="{{path}}">Retour Accueil</a>
        </div>

 {{ include('footer.php') }}
























