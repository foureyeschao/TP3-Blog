<!-- Template de page d'utilisateur list -->
{{ include('header.php', {title:"Liste d'utilisateur"})}}

<h1>Utilisateur</h1>
    <table>
        <tr>
            <th>Nom de utilisateur</th>
            <th>Email</th>
            <th>privilège</th>
        </tr>
        {% for user in users %}
        <tr>
            <td>{{user.username }}</td>
            <td>{{user.email }}</td>
            {% if user.privilege_id == 1 %}
              <td>Administrateur</td>
            {% else %}
              <td>Utilisateur</td>
            {% endif %}
        </tr>
        {% endfor %}
    </table>
  




{{ include('footer.php') }}






