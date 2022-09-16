<?php
ob_start();//armazena os dados em cash
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('Location: ../index.php');
}
include '../connect/connect.php';
// Submit a new student************************************
            if(isset($_POST['submit'])){

                $number = $_POST['number'];
                $name = $_POST['name'];
                $mac1 = $_POST['mac1'];
                $pp1 = $_POST['pp1'];
                $mac2 = $_POST['mac2'];
                $pp2 = $_POST['pp2'];
                $mac3 = $_POST['mac3'];
                $pp3 = $_POST['pp3'];
                $user_id = $_SESSION['user_id'];

                $ct1 = (($mac1 + $pp1) / 2);
                $ct2 = (($mac2 + $pp2) / 2);
                $ct3 = (($mac3 + $pp3) / 2);
                $cap = (($ct1 + $ct2 + $ct3) / 3);
              
                $student = mysqli_query($connect, "SELECT number FROM `student` WHERE number = '$number'") or die('query failed');
              
                if(mysqli_num_rows($student) > 0){
                  echo '<div class="container"><div class="alert alert-warning d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <div>
                  <p style="font-size: 24px;">&nbsp;&nbsp;Aluno já existente!</p>
                  </div>
                </div></div>';
                  header('Refresh: 3, home?pg=add_student');
                }else{
                    mysqli_query($connect, "INSERT INTO `student`(number, name, mac1,pp1,mac2, pp2, mac3,pp3,ct1,ct2,ct3,cap,user_id) VALUES('$number', '$name', '$mac1','$pp1','$mac2', '$pp2', '$mac3', '$pp3','$ct1','$ct2','$ct3','$cap','$user_id')") or die('query failed');
                    echo '<div class="container"><div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                    <p style="font-size: 24px;">&nbsp;&nbsp;Aluno Cadastrado!</p>
                    </div>
                  </div></div>';
                    header('Refresh: 3, home?pg=add_student');
                }
                    
              }

  //Upadate the datas about a student ************************
              if(isset($_POST['update'])){
                $id = $_GET['id'];
                $number = $_POST['number'];
                $name = $_POST['name'];
                $mac1 = $_POST['mac1'];
                $pp1 = $_POST['pp1'];
                $mac2 = $_POST['mac2'];
                $pp2 = $_POST['pp2'];
                $mac3 = $_POST['mac3'];
                $pp3 = $_POST['pp3'];
                $user_id = $_SESSION['user_id'];

                $ct1 = (($mac1 + $pp1) / 2);
                $ct2 = (($mac2 + $pp2) / 2);
                $ct3 = (($mac3 + $pp3) / 2);
                $cap = (($ct1 + $ct2 + $ct3) / 3);

                $update= mysqli_query($connect, "SELECT number FROM `student` WHERE user_id = '$number'") or die('query failed');
                if(mysqli_num_rows($update) > 0){
                  echo '<div class="container"><div class="alert alert-warning d-flex align-items-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                  <div>
                  <p style="font-size: 24px;">&nbsp;&nbsp;Aluno já existente!</p>
                  </div>
                </div></div>';
                  header('Refresh: 3, home?pg=edit_student');
                }else{
                  
                mysqli_query($connect, "UPDATE `student` SET number = '$number', name = '$name', mac1 = '$mac1', pp1 = '$pp1',ct1='$ct1', mac2 = '$mac2', pp2 = '$pp2',ct2='$ct2', mac3 = '$mac3', pp3 = '$pp3',ct3='$ct3',cap='$cap' WHERE id = '$id'") or die('query failed');
               echo '<div class="container"><div class="alert alert-success d-flex align-items-center" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
               <div>
               <p style="font-size: 24px;">&nbsp;&nbsp;Actualizado com sucesso!</p>
               </div>
             </div></div>';
             header('Refresh: 3, home?pg=edit_student');
             }
            }

  //Update a user perfil***************************
            if(isset($_POST['up_perfil'])){
              $user_id = $_SESSION['user_id'];
              $name = $_POST['name'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $number = $_POST['number'];
              $image = $_FILES['image']['name'];
              $image_size = $_FILES['image']['size'];
              $image_tmp_name = $_FILES['image']['tmp_name'];
              $image_folder = 'img/'.$image;
              $subject = $_POST['subject'];

              $update_user= mysqli_query($connect, "SELECT user_type FROM `user` WHERE id = '$user_id'") or die('query failed');
              if(mysqli_num_rows($update_user) > 0){
                echo '<div class="container"><div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                <p style="font-size: 24px;">&nbsp;&nbsp;Usuário já existente!</p>
                </div>
              </div></div>';
                header('Refresh: 3, home?pg=perfil');
              }else{
                
              mysqli_query($connect, "UPDATE `user` SET name = '$name', number = '$number', password = '$password', number = '$number', image = '$image', subject = '$subject' WHERE id = '$user_id'") or die('query failed');
              if($image_size > 9000000){
                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>
                <p style="font-size: 24px;">&nbsp;&nbsp;A extensão da imagem é enorme!</p>
                </div>
              </div>';
                header('Refresh: 3, home?pg=perfil');
              }else{
                 move_uploaded_file($image_tmp_name, $image_folder);
                echo '<div class="container">
                <div class="alert alert-success d-flex align-items-center" role="alert">
      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
      <div>
      <p style="font-size: 24px;">&nbsp;&nbsp;Registado com sucesso!</p>
      </div>
    </div>
                </div>';
                header('Refresh: 3, home?pg=perfil');
              }
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
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
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
<body class="hold-transition sidebar-mini layout-fixed">

<?php include('body.php');?>