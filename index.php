<?php session_start(); $base_url = 'http://'.$_SERVER['HTTP_HOST'].'/revisi/'; isset ($_GET['app']) ? $app = $_GET['app'] : $app = 'home'; ?>
<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
?>
<!DOCTYPE html>
    <html lang="en">
        <head> 
        <meta charset="utf-8">
        <title>E-Report | Program Kerja</title>
        <link href="<?php echo $base_url;?>asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_url;?>asset/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo $base_url;?>asset/css/style.css" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo $base_url;?>asset/img/icon.png">
            <script type="text/javascript" src="<?php echo $base_url;?>asset/js/jquery.min.js"></script>
            <script type="text/javascript" src="<?php echo $base_url;?>asset/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="<?php echo $base_url;?>asset/js/scripts.js"></script>
        <head>
       
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="css/bootflat.css">
            
            <!-- Bootstrap -->
            <script src="jquery-1.11.0.min.js"></script>
            <script src="bootstrap.min.js"></script>

            <!-- Bootflat's JS files.-->
            <script src="js/icheck.min.js"></script>
            <script src="js/jquery.fs.selecter.min.js"></script>
            <script src="js/jquery.fs.stepper.min.js"></script>

        </head>
</head>
<body>
<div id="container">
                <div class="pull-right">
                    <?php
                        $tgl = date('l  d-m-Y');
                        echo $tgl;
                        ?> 
                </div>  
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="page-header header"><h3>Report Program Kerja</h3> </div>
              

                <ul class="nav nav-tabs">
                    <li <?php echo $app=='home'?'class="active"':'';?>><a href="index.php"><i class="icon-home"></i> Home</a></li>
                                                    <?php if($_SESSION['level']=='admin'){?>
                    <li <?php echo $app=='ctrl'?'class="active"':'';?>><a href="index.php?app=ctrl"><i class="icon-list-alt"></i> Data Program Kerja</a></li>
                                                                    <?php }?>
                                                                    <?php if($_SESSION['level']=='user'){?>
                    <li <?php echo $app=='USER'?'class="active"' :'';?>><a href="index.php?app=USER"><i class="icon-thumbs-up"></i> Data Yang Belum Dikerjakan</a></li>
                    <?php }?>
                    <li class="dropdown pull-right">
                                                    <?php if (isset($_SESSION['nama'])):?>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i>
                                                         <?php echo $_SESSION['nama'];?> 
                        <strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                                                            <?php else:?>

                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-user"></i> Account<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            
                            
                            <li><a href="index.php?app=login"><i class="icon-user"></i> Login</a></li>
                            <?php endif;?>                          
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<div id="content">
<?php   

if(isset($_SESSION['pesan'])){echo $_SESSION['pesan']; unset($_SESSION['pesan']);}
if(file_exists('app/'.$app.'.php')){
    include ('app/'.$app.'.php'); 
}else{
    echo '<div class="well" Error : Aplikasi tidak menemukan adanya file <b>'.$app.'.php </b> pada direktori <b>app/..</b></div>';
}

?>






</div>
 <div class="copyright clearfix">
<p class="footer">Developed By <a href=""><b>#eZ </b></a>Visit <a href="Yanamulyana.com"> <b>Site 2015</b></a> </p>
</div>
 <!doctype html>
    <html>
        </body>
    </html>

          
          </div>
