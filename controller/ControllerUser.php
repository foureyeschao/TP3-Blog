<?php
RequirePage::requireModel('CRUD');
RequirePage::requireModel('User');
RequirePage::requireModel('Privilege');
RequirePage::requireLibrary('Validation');

class ControllerUser{

    public function create(){
        if($_SESSION['privilege_id'] == 1){
          CheckSession::SessionAuth();
          $privileges = new ModelPrivilege;
          $select = $privileges->select('privilege');    
          return Twig::render('user-create.php', ['privileges'=>$select]);}
        else
          RequirePage::redirect('');
          
    }

    public function list() {

     if($_SESSION['privilege_id'] == 1){
        CheckSession::SessionAuth();
        $users = new ModelUser;
        $selects = $users->select();
        
        $privileges = new ModelPrivilege;
        $select = $privileges->select('privilege');
        
        return Twig::render('user-list.php', ['users'=>$selects,'privileges'=>$select]);}
     else
        RequirePage::redirect('');
    }

    public function store(){

    if($_SESSION['privilege_id'] == 1){
        CheckSession::SessionAuth();
        $validation = new Validation;
        extract($_POST);
        $validation->name('username')->value($username)->pattern('email')->required();
        $validation->name('password')->value($password)->max(20)->min(6)->required();
        if($validation->isSuccess()){
         
            $options = [
                'cost' => 10,
            ];
            $hashPassword= password_hash($password, PASSWORD_BCRYPT, $options);
            //return $hashPassword;
    
            $user = new ModelUser;
            $_POST['email'] = $username;
            $_POST['password'] = $hashPassword;
            $insert = $user->insert($_POST);

            RequirePage::redirect('user/list');
        }else{
            
            $errors =  $validation->displayErrors();
            $privileges = new ModelPrivilege;
            $selectsPrivilege = $privileges->select('privilege');
            return Twig::render('user-create.php', ['errors' => $errors, 'user' => $_POST,'privileges' => $selectsPrivilege]);
        }
    } 
    else RequirePage::redirect('');
 }
}