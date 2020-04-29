<html>
<?php
include('config.php');
session_start();

               $query = $dbh->prepare("SELECT * FROM `jabatan`;");
              $query ->execute();
              $jabatan = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="/assets/css/login.css">
</head>
<!--Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dasbor.php">Dashboard Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">logout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">logout</a>
      </li>

    </ul>

  </div>
</nav>

<!-- Akhir dari Navbar -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h3>Data Pegawai Kantor Gubernur</h3>
      <hr />
      <?php
                   if(isset($_SESSION['flash'])){
                     foreach ($_SESSION['flash'] as $key => $value) {
                      echo '<p class="alert alert-success">'.$value.'</p></br>';
                     }
                 unset($_SESSION['flash']);
            }
            ?>
          <?php
                if(isset($_POST['update'])){
                  $id = $_POST['id'];
                  $editNama = $_POST['nama'];
                  $editAlamat = $_POST['alamat'];
                  $EditGolongan= $_POST['golongan'];

                  $query = $dbh->prepare("UPDATE `pejabat` SET `nama` = :nama, `alamat` = :alamat, `jabatan` = :golongan WHERE `pejabat`.`id` = :id;");
                  $query->bindParam('nama',$editNama);
                  $query ->bindParam('alamat',$editAlamat);
                  $query ->bindParam('golongan',$editGolongan);
                  $query ->bindParam('id',$id);
                  $query -> execute();


                  $_SESSION['flash']['msg']='Data Berhasil di Update';

                    unset($_SESSION['data']);
                }
              ?>
              <?php
              if(isset($_POST['insert'])){

                 $inputNama = $_POST['nama'];
                 $inputAlamat = $_POST['alamat'];
                 $inputGolongan= $_POST['golongan'];
                 $query = $dbh->prepare("INSERT INTO `pejabat` ( `nama`, `alamat`, `jabatan`) VALUES ( '$inputNama', '$inputAlamat', '$inputGolongan');");

                  $query->execute();

                 $_SESSION['flash']['msg']='Data Berhasil di Tambahkan';
              }
              ?>
              <?php
                if(isset($_POST['delete'])){
                  $ids= $_POST['ids'];
                  $query = $dbh->prepare("DELETE FROM `pejabat` WHERE `pejabat`.`id` = $ids");
                  $query -> execute();

                }
              ?>
      <button class="btn btn-primary" data-toggle="modal" data-target="#insertRecord"> Insert Record</button>
      <!--Modal Insert Record -->

      <div class="modal fade" id="insertRecord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Insert Record</h5>

            </div>
            <div class="modal-body">
              <form method="POST">

                <div class="form-group">
                  <label for="nama">Full Name</label>
                  <input type="text" class="form-control" id="nama" placeholder="nama" name="nama"  required>
                </div>
                <div class="form-group">
                  <label for="alamat"> address</label>
                  <input type="text" class="form-control text-area" id="alamat" aria-describedby="Alamat"
                    placeholder="Enter Alamat" name="alamat" required >
                </div>
                <div class="form-group">
                  <label for="golongan"> golongan</label>
                  <select class="custom-select" id="golongan" name="golongan" required >

                    <option >Open this select menu</option>
                    <option value="I.a" ><?=$jabatan[0]['golongan']." ".$jabatan[0]['pangkat']?></option>
                    <option value="I.b"  ><?=$jabatan[1]['golongan']." ".$jabatan[1]['pangkat']?></option>
                    <option value="I.c"  ><?=$jabatan[2]['golongan']." ".$jabatan[2]['pangkat']?></option>
                    <option value="I.d"  ><?=$jabatan[3]['golongan']." ".$jabatan[3]['pangkat']?></option>
                    <option value="II.a" ><?=$jabatan[4]['golongan']." ".$jabatan[4]['pangkat']?></option>
                    <option value="II.b"  ><?=$jabatan[5]['golongan']." ".$jabatan[5]['pangkat']?></option>
                    <option value="II.c"  ><?=$jabatan[6]['golongan']." ".$jabatan[6]['pangkat']?></option>
                    <option value="II.d"  ><?=$jabatan[7]['golongan']." ".$jabatan[7]['pangkat']?></option>
                    <option value="III.a" ><?=$jabatan[8]['golongan']." ".$jabatan[8]['pangkat']?></option>
                    <option value="III.b"  ><?=$jabatan[9]['golongan']." ".$jabatan[9]['pangkat']?></option>
                    <option value="III.c"  ><?=$jabatan[10]['golongan']." ".$jabatan[10]['pangkat']?></option>
                    <option value="III.d"  ><?=$jabatan[11]['golongan']." ".$jabatan[11]['pangkat']?></option>
                    <option value="IV.a" ><?=$jabatan[12]['golongan']." ".$jabatan[12]['pangkat']?></option>
                    <option value="IV.b"  ><?=$jabatan[13]['golongan']." ".$jabatan[13]['pangkat']?></option>
                    <option value="IV.c"  ><?=$jabatan[14]['golongan']." ".$jabatan[14]['pangkat']?></option>
                    <option value="IV.d"  ><?=$jabatan[15]['golongan']." ".$jabatan[15]['pangkat']?></option>
                    <option value="IV.e"  ><?=$jabatan[16]['golongan']." ".$jabatan[16]['pangkat']?></option>
                  </select>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="insert">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Akhir Modal Insert -->

      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th>id</th>
            <th>Full Name</th>
            <th>Alamat</th>
            <th>Golongan</th>
            <th>Jabatan</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            <?php
             $select = $dbh->prepare("SELECT * FROM `pejabat`,`jabatan` WHERE `pejabat`.`jabatan` = `jabatan`.`golongan`;");
             $select -> execute();
             $data = $select->fetchall(PDO::FETCH_ASSOC);
             if(count($data)>0){
              foreach ($data as $value) {?>
            <tr>
              <td><?php echo $value['id']?></td>
              <td><?php echo $value['nama']?></td>
              <td><?php echo $value['alamat']?></td>
              <td><?php echo $value['jabatan']?></td>
              <td><?php echo $value['pangkat']?></td>
              <td><button class="btn btn-warning" name="edit" data-toggle="modal"
                  data-target="#editRecord<?=$value['id']?>">Edit</button></td>
              <td><button class="btn btn-danger" name="delete" data-toggle="modal"
                  data-target="#deleteRecord<?=$value['id']?>">Delete</button></td>
            </tr>
            <!--Modal Edit -->

      <div class="modal fade" id="editRecord<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>

            </div>
            <div class="modal-body">
              <form method="POST">
                <div class="form-group">
                  <label for="id">ID</label>
                  <input type="text" class="form-control" id="id" placeholder="id" name="id" value=<?=$value['id']?> readonly>
                </div>
                <div class="form-group">
                  <label for="nama">Full Name</label>
                  <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value=<?=$value['nama']?>>
                </div>
                <div class="form-group">
                  <label for="alamat"> address</label>
                  <input type="text" class="form-control text-area" id="alamat" aria-describedby="Alamat"
                    placeholder="Enter Alamat" name="alamat" value=<?=$value['alamat']?>>
                </div>
                <div class="form-group">
                  <label for="golongan"> golongan</label>
                  <select class="custom-select" id="golongan" name="golongan" >

                    <option >Open this select menu</option>
                    <option value="I.a" <?php if($value['jabatan']=='I.a'){echo 'selected';}?>><?=$jabatan[0]['golongan']." ".$jabatan[0]['pangkat']?></option>
                    <option value="I.b" <?=$value['jabatan']=='I.b'? 'selected':''?> ><?=$jabatan[1]['golongan']." ".$jabatan[1]['pangkat']?></option>
                    <option value="I.c" <?=$value['jabatan']=='I.c'? 'selected':''?> ><?=$jabatan[2]['golongan']." ".$jabatan[2]['pangkat']?></option>
                    <option value="I.d" <?=$value['jabatan']=='I.d'? 'selected':''?> ><?=$jabatan[3]['golongan']." ".$jabatan[3]['pangkat']?></option>
                    <option value="II.a" <?=$value['jabatan']=='II.a'? 'selected':''?>><?=$jabatan[4]['golongan']." ".$jabatan[4]['pangkat']?></option>
                    <option value="II.b" <?=$value['jabatan']=='II.b'? 'selected':''?> ><?=$jabatan[5]['golongan']." ".$jabatan[5]['pangkat']?></option>
                    <option value="II.c" <?=$value['jabatan']=='II.c'? 'selected':''?> ><?=$jabatan[6]['golongan']." ".$jabatan[6]['pangkat']?></option>
                    <option value="II.d" <?=$value['jabatan']=='II.d'? 'selected':''?> ><?=$jabatan[7]['golongan']." ".$jabatan[7]['pangkat']?></option>
                    <option value="III.a" <?=$value['jabatan']=='III.a'? 'selected':''?>><?=$jabatan[8]['golongan']." ".$jabatan[8]['pangkat']?></option>
                    <option value="III.b" <?=$value['jabatan']=='III.b'? 'selected':''?> ><?=$jabatan[9]['golongan']." ".$jabatan[9]['pangkat']?></option>
                    <option value="III.c" <?=$value['jabatan']=='III.c'? 'selected':''?> ><?=$jabatan[10]['golongan']." ".$jabatan[10]['pangkat']?></option>
                    <option value="III.d" <?=$value['jabatan']=='III.d'? 'selected':''?> ><?=$jabatan[11]['golongan']." ".$jabatan[11]['pangkat']?></option>
                    <option value="IV.a" <?=$value['jabatan']=='IV.a'? 'selected':''?>><?=$jabatan[12]['golongan']." ".$jabatan[12]['pangkat']?></option>
                    <option value="IV.b" <?=$value['jabatan']=='IV.b'? 'selected':''?> ><?=$jabatan[13]['golongan']." ".$jabatan[13]['pangkat']?></option>
                    <option value="IV.c" <?=$value['jabatan']=='IV.c'? 'selected':''?> ><?=$jabatan[14]['golongan']." ".$jabatan[14]['pangkat']?></option>
                    <option value="IV.d" <?=$value['jabatan']=='IV.d'? 'selected':''?> ><?=$jabatan[15]['golongan']." ".$jabatan[15]['pangkat']?></option>
                    <option value="IV.e" <?=$value['jabatan']=='IV.e'? 'selected':''?> ><?=$jabatan[16]['golongan']." ".$jabatan[16]['pangkat']?></option>
                  </select>
                </div>




            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="update">Save changes</button>
              </form>


            </div>
          </div>
        </div>
      </div>
      <!--Akhir Modal Edit -->
      <!-- Modal Delete -->

<div class="modal fade" id="deleteRecord<?=$value['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu Ingin Menghapus data Ini?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST">
                <div class="form-group ">

                  <input type="hidden" class="form-control" id="ids" placeholder="id" name="ids" value=<?=$value['id']?> readonly>
                </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="delete">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
      <!-- akhir Modal Delete -->
            <?php
              }
             }else{

             }

            ?>

          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<body>

  <!--Javascript-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>
</body>

</html>