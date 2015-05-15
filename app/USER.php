<?php empty( $app ) ? header('location:../index.php') : '' ; ?>
<head>

    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery-1.9.1.min.js"></script>
        <script src="../asset/js/bootstrap-datepicker.js"></script>

</head>
<div>

</div>
<title></title>
<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
    <thead><?php
mysql_connect("localhost", "root", "");
mysql_select_db("dbreport"); ?> 
        <tr>
            <th width='3%' >No</th>
            <th width='5%'>Kode</th>
            <th width="15%">Nama Kegiatan</th>
            <th>Deskripsi</th>
            <th>Waktu</th>
            <th>photo</th>
            <th>Status </th>

                                
                            </th>
            
        </tr><?php
    $sql    = "SELECT * FROM prokeruser ORDER BY kdkeg";
    $query  = mysql_query($sql);
    while($rows=mysql_fetch_array($query)){?>   
            <tr>
                <td align='center'><?php echo $no;?></td>
                <td align='center'><?php echo $rows['kdkeg'];?></td>
                <td align='center'><?php echo $rows['nmkeg'];?></td>
                <td align='center'><?php echo $rows['deskripsi']; ?></td>
                <td width="13%"><?php echo $rows['awalkeg']; echo $rows['ahirkeg'];?></td>
  <td> <?php                                 echo '<td><form action="action.php?kdkeg='.$rows['kdkeg'].' " methode="GET" enctype="multipart/form-data"></td>'; 
                                echo '<td>Konfirmasi Kode Kegiatan<br><input type="text"  name="kdkeg">
                           
                                <input type="submit"  value="submit"></form></td>';
                       
                    ?> </td>

  <td></td>
            <?php
                          }   
?>            </tr>

    </tbody>
</table>
</div>

