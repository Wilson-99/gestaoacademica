 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 text-dark">
          <h1>Cadastro de alunos</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-4">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Cadastrar aluno</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="POST" id="myform">
              <div class="card-body text-dark">
              <div class="form-group">
                  <label>Número</label>
                  <input type="number" name="number" class="form-control" id="number" placeholder="número">
                </div>
              <div class="form-group">
                  <label>Nome Completo</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="nome completo">
                </div>
               <center><strong class="text-center text-danger" style="font-size: 18px;">Iº Trimestre</strong></center>
                <div class="col-12 d-flex">
                <div class="form-group">
                  <label>MAC1</label>
                  <input type="float" name="mac1" class="form-control" id="mac1" placeholder="mac1">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                  <label>PP1</label>
                  <input type="float" name="pp1" class="form-control" id="pp1" placeholder="pp1">
                </div>
                </div>
                <center><strong class="text-center text-danger" style="font-size: 18px;">IIº Trimestre</strong></center>
                <div class="col-12 d-flex">
                <div class="form-group">
                  <label>MAC2</label>
                  <input type="float" name="mac2" class="form-control" id="mac2" placeholder="mac2">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                  <label>PP2</label>
                  <input type="float" name="pp2" class="form-control" id="pp2" placeholder="pp2">
                </div>
                </div>
                <center><strong class="text-center text-danger" style="font-size: 18px;">IIIº Trimestre</strong></center>
                <div class="col-12 d-flex">
                <div class="form-group">
                  <label>MAC3</label>
                  <input type="float" name="mac3" class="form-control" id="mac3" placeholder="mac3">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                  <label>PP3</label>
                  <input type="float" name="pp3" class="form-control" id="pp3" placeholder="pp3">
                </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="check">
                  <label class="form-check-label" for="exampleCheck1">Autorizo o cadastro do aluno</label>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-success">Confirmar</button>
              </div>
            </form>
            <?php 
            
            ?>
          </div>
        </div>
          <!-- /.card -->
          <div class="col-md-8">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Alunos Recentes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped text-dark">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">Nº</th>
                      <th class="text-center">Nome Completo</th>
                      <th class="text-center">MAC1</th>
                      <th class="text-center">PP1</th>
                      <th class="text-center">MAC2</th>
                      <th class="text-center">PP2</th>
                      <th class="text-center">MAC3</th>
                      <th class="text-center">PP3</th>
                      <th style="width: 40px" class="text-center">Acções</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                $select_student = mysqli_query($connect,"SELECT * FROM student WHERE user_id='$user_id' ORDER BY id DESC LIMIT 9") or die('query failed');
         if(mysqli_num_rows($select_student) > 0){
            while($fetch_student = mysqli_fetch_assoc($select_student)){   
         ?>
                    <tr>
                      <td class="text-center"><?php echo $fetch_student['number']?></td>
                      <td><?php echo $fetch_student['name']?></td>
                      <td class="text-center"><?php echo $fetch_student['mac1']?></td>
                      <td class="text-center"><?php echo $fetch_student['pp1']?></td>
                      <td class="text-center"><?php echo $fetch_student['mac2']?></td>
                      <td class="text-center"><?php echo $fetch_student['pp2']?></td>
                      <td class="text-center"><?php echo $fetch_student['mac3']?></td>
                      <td class="text-center"><?php echo $fetch_student['pp3']?></td>
                      <td class="text-center"><div class="btn-group">
                        <a href="home.php?pg=edit_student&id=<?php echo $fetch_student['id']?>" class="btn btn-warning" title="editar contacto"><i class="fas fa-user-edit"></i></a>&nbsp;
                        <a href="delete_student.php?id=<?php echo $fetch_student['id']?>" onclick="return confirm('Deseja remover o aluno?')" class="btn btn-danger" title="remover contacto"><i class="fas fa-user-times"></i></a>
                      </div></td>
                    </tr>
                    <?php
                   }

                  }else{
                    echo '<div class="container">
                    <div class="alert alert-warning">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                         &times;</button>Nenhum dado cadastrado ainda!</div>
                         </div>';
                  }
                 ?>
                  </tbody>
                </table>
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
