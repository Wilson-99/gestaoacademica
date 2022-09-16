<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper text-dark">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <div class="card">
          <div class="card-header d-flex">
            <?php 
               $select_user = mysqli_query($connect,"SELECT subject FROM user WHERE id='$user_id'") or die ('query failed'); 
               if(mysqli_num_rows($select_user)>0){
                while($fetch_user = mysqli_fetch_assoc($select_user)){
                  echo  "<h3 class='card-title text-dark' style='font-size: 30px;'><strong>Mapa de aproveitamento de $fetch_user[subject]</strong></h3>";
                }
            } 
            ?>
            <a href="home?pg=add_student" class="btn btn-primary" style="margin-left: 45%;"><i class="fa-solid fa-plus"></i> Adicionar aluno</a> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
<table class="table table-bordered">
  <thead>
                    <tr>
                    <th rowspan="2" class="text-center">Nº</th>
                    <th rowspan="2" class="text-center">Nome</th>
                    <th colspan="3" class="text-center">Iº Trimestre</th>
                    <th colspan="3" class="text-center">IIº Trimestre</th>
                    <th colspan="3" class="text-center">IIIº Trimestre</th>
                    <th rowspan="2" class="text-center">CAP</th>
                    <th rowspan="2" class="text-center">PE</th>
                    <th rowspan="2" class="text-center">CF</th>
                    <th rowspan="2" class="text-center">OBS</th>
                    <th rowspan="2" colspan="2" class="text-center">Acções</th>
                    </tr>
                    <tr class="info">
                    <td class="text-center">MAC1</td>
                    <td class="text-center">PP1</td>
                    <td class="text-center">CT1</td>
                    <td class="text-center">MAC2</td>
                    <td class="text-center">PP2</td>
                    <td class="text-center">CT2</td>
                    <td class="text-center">MAC3</td>
                    <td class="text-center">PP3</td>
                    <td class="text-center">CT3</td>
                </tr>
  </thead>
  <tbody>
    <?php
  $select_student = mysqli_query($connect,"SELECT * FROM student WHERE user_id='$user_id' ORDER BY number") or die('query failed');
         if(mysqli_num_rows($select_student) > 0){
            while($fetch_student = mysqli_fetch_assoc($select_student)){   
         ?>
        <tr>
            <td class="text-center"><b><?php echo $fetch_student['number']?></b></td>
            <td><b><?php echo $fetch_student['name']?></b></td>
            <td class="text-center"><?php echo $fetch_student['mac1']?></td>
            <td class="text-center"><?php echo $fetch_student['pp1']?></td>
            <td class="text-center"><?php echo $fetch_student['ct1']?></td>
            <td class="text-center"><?php echo $fetch_student['mac2']?></td>
            <td class="text-center"><?php echo $fetch_student['pp2']?></td>
            <td class="text-center"><?php echo $fetch_student['ct2']?></td>
            <td class="text-center"><?php echo $fetch_student['mac3']?></td>
            <td class="text-center"><?php echo $fetch_student['pp3']?></td>
            <td class="text-center"><?php echo $fetch_student['ct3']?></td>
            <td class="text-center"><?php echo $fetch_student['cap']?></td>
            <td class="text-center"><?php echo $fetch_student['pe']?></td>
            <td class="text-center"><?php echo $fetch_student['cf']?></td>
            <td class="text-center"><?php echo $fetch_student['obs']?></td>
            <td><div class="btn-group">
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
            <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>