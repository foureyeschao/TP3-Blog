<!-- Template de création de la nouvelle article -->
  {{ include('header.php', {title:"Ajoute de l'article"})}}
   <div class='blog__list'>
            <form class="blog__list" method="POST" action="{{ path }}post/insert">
                <input type="hidden" name="creatorId" value="{{ userId }}" >
                <legend class="mb-2 text-center title">AJOUTER L'ARTICLE</legend>
                {% if errors is defined %}
                <span class="msg--err">{{ errors|raw }}</span>
                {% endif %}
                Titre de l'article : <input type="text" name="title" class="mb-2" value=""/><br>
                Categoire: <select name="cid" id="">
                    {% for item in category %}
                    <option value='{{ item.id }}' >{{ item.name }}
                    </option>
                    {% endfor %}

                </select><br>
                Texte de l'article : <textarea name="content" type="text"></textarea><br>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

    </div>


    {{ include('footer.php') }}