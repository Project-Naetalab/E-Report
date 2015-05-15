<?php empty( $app ) ? header('location:../index.php') : '' ; ?>

<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
    <div class="container">
            <div class="panel-heading + panel-collapse panel-body">
                
        
                            
                <table class="table table-striped table-bordered ">
                  <thead>
                    <tr>
                      <th>Id Kegiatan</th>
                      <th>Nama Kegiatan</th>
                      <th>Deskripsi</th>
                       <th>Awal Kegiatan</th>
                       <th>Ahir Kegiatan </th>
                       <th>Photo</th>
                       <th>Status</th>
                       <th>Tanggal Upload</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'inc/Database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM detailproker ORDER BY kdkeg DESC';
                  
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['kdkeg'] . '</td>';
                            echo '<td>'. $row['nmkeg'] . '</td>';
                            echo '<td>'. $row['deskripsi'] . '</td>';
                            echo '<td>'. $row['awalkeg'] . '</td>';
                            echo '<td>'. $row['ahirkeg'] . '</td>';
                            echo '<td>'. $row['photo'] . '</td>';
                            echo '<td>'. $row['status'] . "Hari";'</td>';
                              
                             echo '<td>'. $row['upload'] . '</td>';

                            echo '<td><a class="btn btn-primary" href="app/inc/read.php?kdkeg='.$row['kdkeg'].'">vew</a></td>';
                                                               echo '';?>

                               <?php  if($_SESSION['level']=='admin') {
                                echo ' ';

                                echo '<a class="btn btn-danger" href="app/inc/delete.php?kdkeg='.$row['kdkeg'].'">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?><?php } ?>
                  </tbody>
            </table>
    <!-- /container -->
        </div>
    </div> 