<!-- Template de page de Login -->
{{ include('header.php', {title:'Login'})}}

<div class='blog__list'>
    <form class="blog__list" method="POST" action="{{ path }}login/authentication">
        <input type="hidden" name="creatorId" value="1">
        <legend class="mb-2 text-center title">Login</legend>
        {% if errors is defined %}
             <span class="msg--err">{{ errors|raw }}</span>
        {% endif %}
        
        Username : <input type="email" name="username" class="mb-2" value="" /><br>
        Password: <input type="password" name="password" class="mb-2" value="" /><br>


        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

{{ include('footer.php') }} 

