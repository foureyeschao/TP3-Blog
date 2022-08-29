<!-- Template de page de liste de mon blog-->
{{ include('header.php', {title:'Journal de Board'})}}

<div class='blog__list'>
  {% for post in posts %}
    {% if post.creatorId == userId %}
         <div class='card mb-4' style='width: 60vw;'>
              
                 <div class='card-body'>
                    <h5 class='card-title'>{{post.title}}</h5>
                    <h6 class='card-subtitle mb-4 text-muted'>
                       {% for user in users %}
                          {% if user.id == post.creatorId %}
                            Auteur: <span class='span--modify'>{{user.username}}</span>
                          {% endif %}
                        {% endfor %}
                    </h6>
                    <p class='card-text'>{{post.content}}</p>
                    <p>
                        <span class='span--modify'><a href='{{ path }}post/edit/{{post.id}}'>modifier</a></span>
                        <span class='span--modify'><a href='{{ path }}post/delete/{{post.id}}'>effacer</a></span>
                    </p>
                </div>
            </div>
    {% endif %}
  {% endfor %}
 </div>
       
   
   

{{ include('footer.php') }}