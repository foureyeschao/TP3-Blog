<!-- TEMPLATE de Header -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ path }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ path }}css/blog-style.css">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid">
        <div class="blog__header mb-4">
            <div class="blog__logo-wrapper text-center mt-4">
                <img class="blog__logo-img" src="{{ path }}images/logo-blue.svg" alt="" />
            </div>

            <ul class="blog__nav mt-3">
                <li><a class="nav__link" href="{{path}}">Accueil</a></li>
                <li><a class="nav__link" href="{{path}}journal">Journal de Board</a></li>
                {% if guest %}
                   <li><a class="nav__link" href="{{path}}login">Login</a></li>
                {% else %}
                  <li><a class="nav__link" href="{{path}}login/logout">Log out</a></li>
                {% endif %}
            </ul>