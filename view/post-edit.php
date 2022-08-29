<!-- Template de mise à jour de l'article -->
{{ include('header.php') }}
        <div class='blog__list'>
            <form class="blog__list" method="POST" action="{{ path }}post/update/{{ post.id }}">
                <input type="hidden" name="id" value="{{ post.id }}">
                <input type="hidden" name="creatorId" value="2">
                <legend class="mb-2 text-center title">METTRE À JOUR L'ARTICLE</legend>
                {% if errors is defined %}
                <span class="msg--err">{{ errors|raw }}</span>
                {% endif %}
                Titre de l'article : <input type="text" name="title" class="mb-2" value="{{ post.title }}"/><br>
                Categoire: <select name="cid" id="">
                    {% for item in category %}
                    <option value='{{ item.id }}' {% if item.name== current.name %} selected {% endif %}>{{ item.name
                        }}
                    </option>
                    {% endfor %}

                </select><br>
                Texte de l'article : <textarea name="content" type="text">{{ post.content }}</textarea><br>

                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </form>
        </div>

    </div>


{{ include('footer.php') }}