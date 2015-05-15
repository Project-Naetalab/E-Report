<?php

// Sesuai nama database anda
   require 'Database.php';

    function jin_date_sql($date){
    $exp = explode('-',$date);
    if(count($exp) == 3) {
        $date = $exp[2].'-'.$exp[1].'-'.$exp[0];
    }
    return $date;





      
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql2 = "INSERT INTO detailproker (kdkeg,nmkeg,deskripsi,awalkeg,ahirkeg) values(?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql2);
            $q->execute(array($kode,$nama,$deskripsi,$awal,$ahir,now()));
            Database::disconnect();
            header("Location: index.php?app/inc/user.php");
        
    }
?>





<?php
CLASS Database
{
    private static $dbName = 'dbreport' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
 
<?php $kdkeg = 0;
     
    if ( !empty($_GET['kdkeg'])) {
        $kdkeg = $_REQUEST['kdkeg'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $kdkeg = $_POST['kdkeg'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT * FROM proker  WHERE kdkeg = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($kdkeg));
        Database::disconnect();
        empty( $app ) ? header('location:../home.php') : '' ; 


         
    }
?>


              
                  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

            
        <div class="container">
     
                <div class="container">

                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="kdkeg" value="<?php echo $kdkeg;?>"/>
                      <p class="alert alert-error">Are you sure to delete ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="../home.php">No</a>
                        </div>
                    </form>
                </div>
                 
    </div>
     <!-- /container -->

</html>



















        <script language="JavaScript">
            alert('Data kegiatan berhasil di tambah!');
            document.location='../user.php';
</script