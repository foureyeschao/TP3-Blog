<!-- Template de page d'accueil -->
{{ include('header.php', {title:'Accueil'})}}
        <div class="blog__list">
            {% for post in posts %}

             <div class='card mb-4' style='width: 60vw;'>
                <div class='card-body'>
                    <h5 class='card-title'>{{ post.title }}</h5>
                    {% for user in users %}
                      {% if user['id'] == post['creatorId']   %}
                         <h6 class='card-subtitle mb-4 text-muted'>Auteur: {{ user.username }}</h6>
                      {% endif %}
                    {% endfor %}
                    <p class='card-text'>{{ post.content }}
                    </p> 
                    {% if privilegeId == 1 %}
                       <p><a href='./post/show/{{ post.id }}'>Lire plus...</a></p>
                    {% endif %}
            
    
                </div>
            </div>
            {% endfor %}

        </div>

{{ include('footer.php') }}