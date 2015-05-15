<?php
    require 'app/inc/Database.php';
    $kdkeg = null;
    if ( !empty($_GET['kdkeg'])) {
        $kdkeg = $_REQUEST['kdkeg'];
    }
     
    if ( null==$kdkeg ) {
        header("Location: index.php?app=USER");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $kodeError = null;
        $namaError = null;
        $awalError = null;
        $ahirError = null;
         
        // keep track post values
        $kode = $_POST['kdkeg'];
        $nama = $_POST['nmkeg'];
        $deskripsi = $_POST['deskripsi'];
        $awal = $_POST['awalkeg'];
        $ahir = $_POST['ahirkeg'];
        $photo = $_POST['photo'];
        $kdkeg = $_POST['kdkeg'];
        $date2= date('y-m-d');
        $datetime1 = new DateTime($ahir);
        $datetime2 = new DateTime($date2);
        $difference = $datetime1->diff($datetime2);
        $tgl = $difference->days;
        $upload = Date('y-m-d');

        // validate input
               // validate input
        $valid = true;
        if (empty($kode)) {
            $kodeError = 'Masukan ID Kegiatan';
            $valid = false;
        }
         
        if (empty($nama)) {
            $namaError = 'Masukan Nama Kegiatan';
            $valid = false;
        } 
         
       if (empty($awal)) {
            $awalError = 'Masukan Tanggal Dimulai';
            $valid = false;
        }
        if (empty($ahir)) {
            $ahirError = 'Masukan Tanggal berakhir';
            $valid = false;
        }

    

        // update data

        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE detailproker  set kdkeg= ?, nmkeg = ?, deskripsi = ?, awalkeg = ?, ahirkeg = ?, photo= ?, status=?, upload = ? WHERE kdkeg = $kdkeg";
            $q = $pdo->prepare($sql);
            $q->execute(array($kode,$nama,$deskripsi,$awal,$ahir, $photo, $tgl, $upload));
            $sql1 = "DELETE FROM prokeruser  WHERE kdkeg = $kdkeg";
            $q = $pdo->prepare($sql1);
    } 
            $q->execute(array('m_data',$kdkeg, $tgl));
            Database::disconnect();
            header("Location: app/user.php");
        
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM proker where kdkeg = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($kdkeg));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $kode = $data['kdkeg'];
        $nama = $data['nmkeg'];
        $deskripsi = $data['deskripsi'];
        $awal = $data['awalkeg'];
        $ahir = $data['ahirkeg'];
        Database::disconnect();
  }  
?>
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
    <div class="container-fluid">
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Tambahkan Gambar </h3>
                    </div>
             
                    <form class="form-horizontal" action="" method="post">
                      <div class="control-group <?php echo !empty($kodeError)?'error':'';?>">
                        <label class="control-label">ID Kegiatan</label>
                        <div class="controls">
                            <input name="kdkeg" type="text"  placeholder="Id Kegiatan" readonly="readonly"value="<?php echo !empty($kode)?$kode:'';?>">
                            <?php if (!empty($kodeError)): ?>
                                <span class="help-inline"><?php echo $kodeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nama)?'error':'';?>">
                        <label class="control-label">Nama Kegiatan</label>
                        <div class="controls">
                            <input name="nmkeg" type="text" placeholder="Nama Kegiatan" readonly="readonly" value="<?php echo !empty($nama)?$nama:'';?>">
                            <?php if (!empty($namaError)): ?>
                                <span class="help-inline"><?php echo $namaError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div>
                        <label class="control-label">Deskripsi</label>
                        <div class="controls">
                            <input name="deskripsi" type="text" readonly="readonly" placeholder="Deskripsi" value="<?php echo !empty($deskripsi)?$deskripsi:'';?>">
                        </div>
                      </div>
                      <div>
                        <label class="control-label">Waktu</label>
                        <div class="controls">
                            <input name="awalkeg" type="text"  placeholder="click to show datepicker"  value="<?php echo !empty($awal)?$awal:'';?>">
                            <input name="ahirkeg" type="text" placeholder="click to show datepicker"  value="<?php echo !empty($ahir)?$ahir:'';?>">
                            <input type="file" name="photo" required /> 
                        </div>
                        </div>    
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success" name="save">Update</button>
                          <a class="btn" href="app/user.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
