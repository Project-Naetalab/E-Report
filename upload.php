<?php

 if (isset($_POST['save'])){
	$fileName = $_FILES['photo']['name'];
		// Simpan ke Database
		
		// Simpan di Folder Gambar
		move_uploaded_file($_FILES['photo']['tmp_name'], "gambar/".$_FILES['photo']['name']);
		echo"<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";	
	} 
?>