
<?php
    require '../inc/database.php';
    $kdkeg = null;
    if ( !empty($_GET['kdkeg'])) {
        $kdkeg = $_REQUEST['kdkeg'];
    }
     
    if ( null==$kdkeg ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM proker where kdkeg = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($kdkeg));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
 
<!DOCTYPE html>


                        <label class="control-label">Kode Kegiatan</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['kdkeg'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Nama Kegiatan</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['nmkeg'];?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Deskripsi</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['deskripsi'];?>
                            </label>
                        </div>
                      </div>
                        <div class="form-actions">
                          <a class="btn" href="../">Back</a>
                       </div>
