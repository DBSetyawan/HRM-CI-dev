<?php
error_reporting(0);
session_start();
include('koneksi.php');
include('fungsi_indotgl.php');
include('fungsi_indotgl2.php');
include('fungsi_ribuan.php');


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/Ionicons/css/ionicons.min.css">

		<!-- AdminLTE Skins. Choose a skin from the css/skins
		   folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/skins/_all-skins-template2.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/AdminLTE_Template2.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/dist/css/AdminLTE.min.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/morris.js/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/jvectormap/jquery-jvectormap.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/plugins/iCheck/all.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/select2/dist/css/select2.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/jquery-ui/jquery-ui.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/toastr/toastr.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/kendo/kendo.common.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/kendo/kendo.default.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/Trumbowyg/dist/ui/trumbowyg.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/vendor/clockpicker/dist/bootstrap-clockpicker.min.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/css/hrsale/animate.css">
		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<link rel="stylesheet" href="..//skin/hrsale_assets/vendor/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
		<link rel="stylesheet" href="../skin/hrsale_assets/theme_assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<script type="text/javascript" src="../skin/hrsale_assets/vendor/jquery/jquery-3.2.1.min.js"></script> 
		<script src="../skin/hrsale_assets/theme_assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="../skin/hrsale_assets/theme_assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script> 
</head>
<body><br />
	<form method="POST" action="aksi_ijin.php?h=leave&act=apphrga">
		<input type='hidden' name='user_hrd' value='<?php echo $_GET[user]; ?>' />
       <table id="example" class="table table-striped " style="width:100%">
          <thead>
            <tr>
              <th>
									<input type="checkbox" name='all' id="all" ></th>
              <th>Jenis Cuti</th>
              <th>Departemen</th>
              <th>Karyawan</th>
              <th><i class="fa fa-calendar" aria-hidden="true"></i> Durasi Permintaan</th>
              <th><i class="fa fa-calendar" aria-hidden="true"></i> Diterapkan Pada</th>
            </tr>
          </thead>
          <tbody>

          	<?php
          		$i=1;
          		$app = mysqli_query($connhrm, "SELECT a.*, e.first_name, e.last_name, m.Nama, d.department_name FROM xin_leave_applications a 
          																					left join xin_employees e on a.employee_id = e.user_id 
          																			 		left join masterijin m on a.leave_type_id = m.Jenis
          																			 		left join xin_departments d on e.department_id = d.department_id
          																			 WHERE a.approved_hrd NOT IN ('2') and a.approved_mgr='2' AND a.status='2'");
          		while($ap = mysqli_fetch_array($app)){
          			$jarak = strtotime($ap[to_date]) - strtotime($ap[from_date]);
								$hari = $jarak / 60 / 60 / 24;
								$hari = $hari+1;

								// for($h=0;$h<$hari;$h++){
								// 	$date = strtotime("+$h day", strtotime("$ap[from_date]"));
								// 	echo date("Y-m-d", $date)."<br>";
								// }

								
          			echo "
          			<tr>	
          				<th align='center'><input type='checkbox' name='cek_cuti[]' value='$ap[leave_id]' />";
          				if($ap[leave_type_id]=='C'){
          					echo "<input type='hidden' name='jum_cuti[]' value='$hari'>";
          				}
          				echo"</th>
          				<th width='30%'><font color='#848585' style='font-style: font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; ;'>$ap[Nama]</font>
          						<br> <font color='#aaabab' style='font-size: 12px ;'><i>Alasan: $ap[reason]</i></font>
          						<br> <font color='#aaabab' style='font-size: 12px ;'><i>Perusahaan: PT Krisanthium Offset Printing</i></font></th>
          				<th><font color='#848585' style='font-style: font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; ;'>$ap[department_name]</th>
          				<th><font color='#848585' style='font-style: font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; ;'>$ap[first_name] $ap[last_name]</font></th>
          				<th><font color='#848585' style='font-style: font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; ;'>".tgl_indo2($ap[from_date])." to ".tgl_indo2($ap[to_date])."<br>Total hari: $hari <br></font></th>
          				<th><font color='#848585' style='font-style: font-family: Century Gothic, CenturyGothic, AppleGothic, sans-serif; ;'>".tgl_indo2($ap[created_at])."</font></th>
          			</tr>";
          			$i++;
          		}
	          	
            ?>
           </tbody>
        </table><br />
        <?php if(mysqli_num_rows($app) >0){ ?>
    							<p align='center'><button type='submit' class="btn btn-xs btn-primary">Approve</button></p>
    		<?php }else{ ?>
    							<p align='center'><button type='submit' class="btn btn-xs btn-primary" disabled='disabled'>Approve</button></p>
    		<?php } ?>
    </form>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
	} );

 $('#all').on('click', function(){
        $(':checkbox').attr("checked",$(this).is(':checked'));
  });
</script>
