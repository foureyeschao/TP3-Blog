<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('Post');
RequirePage::requireModel('User');
RequirePage::requireModel('Category');
RequirePage::requireLibrary('Validation');

//classe de ControllerPost, responsable de tous les contrôles sur les articles de blog
class ControllerPost {

    public function index() {
        CheckSession::SessionAuth();
    }

    //afficher un article par article id
    public function show($id){
        CheckSession::SessionAuth();
        $post = new ModelPost;
        $selectId = $post->selectId($id);
        $userId = $selectId['creatorId'];

        $users = New ModelUser;
        $user = $users ->selectId($userId);

        $id = $_SESSION['privilege_id'];
        $userSessionId = $_SESSION['user_id'];

        return Twig::render('post-show.php', ['post' => $selectId,'user'=> $user, 'privilegeId' => $id, 'usid' => $userSessionId]);

    }
    
   //afficher les articles par id de l'utilisateur


   public function list() {
     CheckSession::SessionAuth();
     $posts = new ModelPost;
     $users = New ModelUser;
     $selectsPost = $posts->select();
     $selectsUser = $users->select();
     $userId = $_SESSION['user_id'];
     return Twig::render('post-list.php', ['posts' => $selectsPost,'userId'=> $userId, 'users' => $selectsUser]);

   }


    //Charger du rendu de la page où l'article de blog est créé et de la transmission des données requises par la page
    public function create(){
        CheckSession::SessionAuth();
        $categories = New ModelCategory;
        $category = $categories->select();
        $creatorId = $_SESSION['user_id'];
        return Twig::render('post-insert.php', ['category'=> $category, 'userId' => $creatorId]);
    }
    
    //Vérifiez les données entrantes du formulaire frontal et écrivez les données dans la base de données une fois la vérification réussie
    //Si la validation échoue, afficher un message d'erreur sur la page d'ajoute
    public function insert() {
        CheckSession::SessionAuth();
        $validation = new Validation;
        extract($_POST);
        $validation->name('title')->value($title)->pattern('text')->required()->max(30);
        $validation->name('content')->value($content)->pattern('text')->required()->max(5000);
        if($validation->isSuccess()){
            $post = new ModelPost;
            $insert = $post->insert($_POST);
            RequirePage::redirect('post/show/'.$insert);
        }else{

            $errors =  $validation->displayErrors();

            $categories = New ModelCategory;
            $category = $categories->select();


            return Twig::render('post-edit.php', ['errors' => $errors,'post' => $_POST,
                                                  'category'=>$category]);
        }
    }

    //Charger du rendu de la page où l'article de blog est mise à jour et de la transmission des données requises par la page
    public function edit($id) {
        CheckSession::SessionAuth();
        $post = new ModelPost;
        $selectId = $post->selectId($id);

        $categories = New ModelCategory;
        $category = $categories->select();
        $currentCategory = $categories->selectId($selectId['cid']);

        return Twig::render('post-edit.php', ['post' => $selectId,'category' => $category,'current' => $currentCategory]);
    }

    //Vérifiez les données entrantes du formulaire frontal et mettre à jour les données dans la base de données une fois la vérification réussie
    //Si la validation échoue, afficher un message d'erreur sur la page de mise à jour
    public function update($id){
        CheckSession::SessionAuth();
        $validation = new Validation;
        extract($_POST);
        $validation->name('title')->value($title)->pattern('text')->required()->max(30);
        $validation->name('content')->value($content)->pattern('text')->required()->max(5000);
        if($validation->isSuccess()){
            $post = new ModelPost;
            $insert = $post->update($_POST);
            RequirePage::redirect('post/show/'.$id);
        }else{

            $errors =  $validation->displayErrors();

            $categories = New ModelCategory;
            $category = $categories->select();


            return Twig::render('post-edit.php', ['errors' => $errors,'post' => $_POST,
                                                  'category'=>$category]);
        }
    }

    //Effacer un article par article id
    public function delete($id){
        CheckSession::SessionAuth();
        $post= new ModelPost;
        $delete = $post->delete($id);
        RequirePage::redirect('');
    }
}