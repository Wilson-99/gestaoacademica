 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper text-dark">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Editar perfil</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
  
        <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar perfil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            include '../connect/connect.php';
            $select_user = mysqli_query($connect,"SELECT * FROM user WHERE id='$user_id'") or die('query failed');
            if(mysqli_num_rows($select_user) > 0){
               while($fetch_user = mysqli_fetch_assoc($select_user)){   
            ?>
            <form role="form" action="" method="POST" enctype="multipart/form-data">
              <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputNome1">Nome Completo</label>
                  <input type="text" name="name" required class="form-control" id="name" value="<?php echo $fetch_user['name']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" name="email" required class="form-control" id="email" value="<?php echo $fetch_user['email']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputSenha1">Senha</label>
                  <input type="password" name="password" required class="form-control" id="senha" value="<?php echo $fetch_user['password']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputSenha1">Telefone</label>
                  <input type="text" name="number" required class="form-control" id="number" value="<?php echo $fetch_user['number']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputSenha1">Disciplina de docencia</label>
                  <input type="text" name="subject" required class="form-control" id="subject" value="<?php echo $fetch_user['subject']; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputSenha1">Arquivo de imagem</label>
                  <div class="input-group-text">
                  <input type="file" name="image" id="image" value="<?php echo $fetch_user['image']; ?>">
                  </div>  
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="up_perfil" class="btn btn-success">Confirmar</button>
              </div>
            </form>
            <?php
         }
      }else{
         echo '<div class="container">
      <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
           &times;</button>Nenhum dado de perfil!</div>
           </div>';
      }
      ?>
          </div>
        </div>
          <!-- /.card -->
          <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title card-primary">Dados do perfil</h3>
              </div>
              <?php
               $select_user = mysqli_query($connect,"SELECT * FROM user WHERE id='$user_id'") or die('query failed');
               if(mysqli_num_rows($select_user) > 0){
                  while($fetch_user = mysqli_fetch_assoc($select_user)){   
               ?>
              <!-- /.card-header -->
              <div class="card-body p-0" style="margin-bottom: 98px; text-align:center;">
                <img src="../img/<?php echo $fetch_user['image']; ?>" alt="<?php echo $fetch_user['image']; ?>" style="width: 200px; border-radius: 100%; margin-top: 30px;">
                <h1>Nome: <?php echo $fetch_user['name']; ?></h1>
                <p>Email: <?php echo $fetch_user['email']; ?></p>
                <p>Telefone: <?php echo $fetch_user['number']; ?></p>
                <p>Disciplina de docencia: <?php echo $fetch_user['subject']; ?></p>
                <?php
         }
      }else{
         echo '<div class="container">
      <div class="alert alert-danger">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
           &times;</button>Nenhum dado de perfil!</div>
           </div>';
      }
      ?>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
