<?php empty( $app ) ? header('location:../index.php') : '' ; ?>
<head>
<title></title>
<div class="tab-content">
<table class="table table-bordered table-condensed table-hover">
    <thead><?php
mysql_connect("localhost", "root", "");
mysql_select_db("dbreport"); ?> 
<?php
ini_set('display_errors', 1); ini_set('error_reporting', E_ERROR);
?>
        <tr>
            <th width='3%' >No</th>
            <th width='5%'>Kode</th>
            <th width="15%">Nama Kegiatan</th>
            <th>Deskripsi</th>
            <th>Waktu</th>

            <th width='10%'>Status</th>
            
        </tr><?php
    $sql    = "SELECT * FROM proker $where ORDER BY awalkeg";
    $query  = mysql_query($sql);
    $no=1;
    while($rows=mysql_fetch_array($query)){?>   
            <tr>
                <td align='center'><?php echo $no;?></td>
                <td align='center'><?php echo $rows['kdkeg'];?></td>
                <td align='center'><?php echo $rows['nmkeg'];?></td>
                <td align='center'><?php echo $rows['deskripsi']; ?></td>
                <td width="13%"><?php echo $rows['awalkeg'];?>
                <?php echo $rows['ahirkeg'];?></td>
                <td align='center'><?php echo $rows['status'];?></td>
            </tr>
<?php $no++;
    }
?>
    </tbody>
</table>
</div>

<?php include 'controller/show.php';?>
