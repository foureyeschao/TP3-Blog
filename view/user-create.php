{{ include ('header.php', {title:'Ajouter User'})}}

<div class='blog__list'>
        <h1>Nouvel utilisateur</h1>
        {% if errors is defined %}
            <span class="msg--err">{{ errors|raw }}</span>
        {% endif %}
        
        <form class="blog__list" action="{{path}}user/store" method="post">
            <label class="mb-5"> Nom de Utilisateur
                <input type="email" name="username" value="{{ user.username }}">
            </label>
            <label class="mb-5"> Mot de Passe
                <input type="password" name="password" value="{{ user.password }}">
            </label>
            <label class="mb-5"> Privilege
                <select type="text" name="privilege_id">
                {% for privilege in privileges %}
                    <option value='{{privilege.id}}'>{{privilege.privilege}}</option>
                {% endfor %}
                </select>
            </label>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
</div>
{{ include ('footer.php') }}