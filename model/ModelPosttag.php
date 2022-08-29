<?php
    //Modèle de données des articles et les tags
    class ModelPosttag extends CRUD{
        protected $table = 'posts_tags';
        protected $primaryKey = 'id';
    }

?>