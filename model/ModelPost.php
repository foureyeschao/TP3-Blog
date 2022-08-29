<?php
//Modèle de données de l'article
class ModelPost extends CRUD{
    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = ['creatorId', 'title', 'cid' ,'content'];

}


?>