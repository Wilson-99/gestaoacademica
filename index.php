<?php

ob_start();//armazena os dados em cash
session_start();

if(isset($_SESSION['user_id'])){
   header('Location: users/home.php');
}
if(isset($_SESSION['admin_id'])){
  header('Location: admin/admin_page');
}
require_once 'connect/connect.php';
            if(isset($_POST['submit'])){

              $email = $_POST['email'];
              $password = md5($_POST['password']);
           
              $select_users = mysqli_query($connect, "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'") or die('query failed');
           
              if(mysqli_num_rows($select_users) > 0){
           
                 $row = mysqli_fetch_assoc($select_users);
           
                 if($row['user_type'] == 'admin'){
           
                    $_SESSION['admin_name'] = $row['name'];
                    $_SESSION['admin_email'] = $row['email'];
                    $_SESSION['admin_id'] = $row['id'];
                    echo '<div class="container"><div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                    <p style="font-size: 24px;">&nbsp;&nbsp;Você será direcionado para a página de administrador!</p>
                    </div>
                  </div></div>';
                    header('Refresh: 3, admin/admin_page.php');
           
                 }elseif($row['user_type'] == 'user'){
           
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    echo '<div class="container"><div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                    <p style="font-size: 24px;">&nbsp;&nbsp;Você será direcionado para a página de usuário!</p>
                    </div>
                  </div></div>';
                  header('Refresh: 3, users/home.php');
                 }
           
              }else{
                 echo '<div class="container"><div class="alert alert-danger d-flex align-items-center" role="alert">
                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                 <div>
                 <p style="font-size: 24px;">&nbsp;&nbsp;Email e/ou Senha incorrectas!</p>
                 </div>
               </div></div>';
                 header('Refresh: 3, index.php');
              }
           
           }
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../fotos/favicon.png" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <title>Escola</title>
</head>
<style type="text/css">
  .error{
    color: red;
  }
</style>
<body>
<div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 text-center">
                <h1 class="display-4 mt-2 text-white">Escola....</h1>
            </div>
            <div class="col-12 col-md-1 text-center">
                <img src="fotos/logo.png" alt="image" class="img-fluid">
            </div>  
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 offset-md-4 col-md-4">
            <h4 class="text-danger text-center">Cadastrar</h4>
            <form method="POST" id="myform">
                 <div class="form-group">
                  Email
                  <div class="input-group-text">
                      <input type="email" class="form-control" name="email" id="email" placeholder="nome@exemplo.com">
                         <div class="input-group-append">
                         &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-envelope"></i>
                         </div>
                   </div>      
                </div>
                <div class="form-group">
                  Senha
                  <div class="input-group-text">
                      <input type="password" class="form-control" name="password" id="password" placeholder="senha">
                         <div class="input-group-append">
                         &nbsp;&nbsp;&nbsp;<i class="fa-solid fa-lock"></i>
                         </div>
                   </div>      
                </div>
            
          <button class="w-100 btn btn-lg btn-success" type="submit" name="submit">Confirmar</button><br><br>
          <p class="mb-0 text-center">
               Ainda não tem um cadastro? <a href="register.php" class="text-center" style="text-decoration: none;"><b>Cadastrar!</b></a>
                </p>
            </form>
        </div>
    </div>
</div>
  
   <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<script src="dist/js/bootstrap.js"></script>
<script>
    $( "#myform" ).validate({
      rules: {
        email: {
          required: true
        },
        password: {
          required: true
        }
        
      },
      messages:{
       
        email: {
        required: "Campo obrigatório",
        email: "digite um email válido!"
        },
        password: {
        required: "Campo obrigatório",
        password: "digite uma password válida!"
        }
       
      }
    });
    </script>

</body>
</html>