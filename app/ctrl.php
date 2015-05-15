<?php empty( $app ) ? header('location:../index.php') : '' ; if(isset($_SESSION['level'])){?>
<head>
        <link rel="stylesheet" href="css/bootflat.css">
</head>
              <p>
	<a href="index.php?app=ctrl&act=create" > Add New</a>
</p>


<?php 
$p=isset($_GET['act'])?$_GET['act']:null;
switch ($p) {
		default:
		# code...
	include "show.php";
		break;
	case "create":
		# code...
	include "inc/create.php";
		break;
			case "delete":
				# code...
			include "inc/delete.php";
				break;
}
?>
<?php } ?>