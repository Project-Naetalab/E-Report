<?php
    function jin_date_sql($date){
    $exp = explode('-',$date);
    if(count($exp) == 3) {
        $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;
}?>
<?php
     
    require 'Database.php';

 
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
        $awal1 = $_POST['awalkeg'];
        $ahir        = $_POST['ahirkeg'];
        $awal      = jin_date_sql($_POST['awalkeg']);

         
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
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO proker (kdkeg,nmkeg,deskripsi,awalkeg,ahirkeg) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($kode,$nama,$deskripsi,$awal,$ahir));
            $sql2 = "INSERT INTO prokeruser (kdkeg,nmkeg,deskripsi,awalkeg,ahirkeg) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql2);
            $q->execute(array($kode,$nama,$deskripsi,$awal,$ahir));
            $sql3 = "INSERT INTO detailproker (kdkeg,nmkeg,deskripsi,awalkeg,ahirkeg) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql3);
            $q->execute(array($kode,$nama,$deskripsi,$awal,$ahir));
            Database::disconnect();
            header("Location: index.php?app=ctrl");
        }
    }
?>
<head>
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src=".js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
                
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#awalkeg').datepicker({
                    format: "yyyy/mm/dd"

                });
                $('#ahirkeg').datepicker({
                    format: "yyyy/mm/dd"

                });  
            
            });
        </script>
</head>
 
<body>
    <div class="container-fluid">
                    <div class="row">
                        <h3>Tambah Kegiatan</h3>
                    </div>
             
                    <form class="form-horizontal" action="index.php?app=ctrl&act=create" method="post">
                                           <div class="control-group <?php echo !empty($kodeError)?'error':'';?>">
                        <label class="control-label">ID Kegiatan</label>
                        <div class="controls">
                            <input name="kdkeg" type="text"  placeholder="Terisi Otomatis" value="<?php echo !empty($kode)?$kode:'';?> ">
                            <?php if (!empty($kodeError)): ?>
                                <span class="help-inline"><?php echo $kodeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($nama)?'error':'sv';?>">
                        <label class="control-label">Nama Kegiatan</label>
                        <div class="controls">
                            <input name="nmkeg" type="text" placeholder="Nama Kegiatan" value="<?php echo !empty($nama)?$nama:'';?>">
                            <?php if (!empty($namaError)): ?>
                               
                            <?php endif;?>
                        </div>
                      </div>
                      <div>
                        <label class="control-label">Deskripsi</label>
                        <div class="controls">
                            <input name="deskripsi" type="text"  placeholder="Deskripsi" value="<?php echo !empty($deskripsi)?$deskripsi:'';?>">
                        </div>
                      </div>
                      <div class="control-group"></div>
                        <label class="control-label">Waktu</label>

                        <div class="controls"><div class=>
                            <input name="awalkeg" id="awalkeg" type="text" placeholder="click to show datepicker"  value="<?php echo !empty($awal)?$awal:'';?>">
                       Sampai Dengan
                            <input name="ahirkeg" id="ahirkeg" type="text" placeholder="click to show datepicker"  value="<?php echo !empty($ahir)?$ahir:'';?>">
                        </div></div>
                        </div>    
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php?app=dataprogramkerja">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

