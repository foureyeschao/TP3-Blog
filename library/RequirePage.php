<?php

class RequirePage{
    static function requireModel($page){
        return require_once 'model/Model'.$page.'.php';
    }

    static function redirect($url){
        header("location: http://localhost:8888/TP3-Blog/$url");
    }

    static function absolutPath($page){
        return 'http://localhost:8888/TP3-Blog/'.$page;
    }

    static function requireLibrary($page){
        return require_once 'library/'.$page.'.php';
    }
}