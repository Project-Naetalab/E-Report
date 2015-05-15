<?php
    require 'Database.php';
    $kdkeg = 0;
     
    if ( !empty($_GET['kdkeg'])) {
        $kdkeg = $_REQUEST['kdkeg'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $kdkeg = $_POST['kdkeg'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM detailproker  WHERE kdkeg = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($kdkeg));
        Database::disconnect();
      header("Location: ../ctrl.php");
      ?>
 
         <?php
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="container-fluid">

                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="kdkeg" value="<?php echo $kdkeg;?>"/>
                      <p class="alert alert-error">Anda Akan Menghapus Data Dengan Kode <?php echo $kdkeg;?> ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="../ctrl.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>