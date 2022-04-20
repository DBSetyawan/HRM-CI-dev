<?php
error_reporting(0);
session_start();
include('koneksi.php');
include('fungsi_indotgl.php');
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
<body>
	<?php
      			$kary = mysqli_query($connhrm, "SELECT *FROM xin_employees e WHERE user_id='$_GET[user]'");
      			$k 		= mysqli_fetch_array($kary);
      	?>
	<div class="box">
      <div class="box-header">
        <h3 class="box-title"> Mr. / Mrs. <?php echo "$k[first_name] $k[last_name]"; ?> </h3>
      </div>
      <div class="box-body">
      <div class="box-datatable table-responsive">
   <?php
   switch($_GET[act]){
		default:
	 ?>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Action</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody>
          	<?php
          		$periode_gaji = mysqli_query($conn, "SELECT * FROM periodegaji p where `Tgl Awal` between
																										  CONCAT((SELECT year(Tgl) FROM gaji where Nip='$k[employee_id]' order by Tgl asc LIMIT 1),'-',
																										         (SELECT month(Tgl) FROM gaji where Nip='$k[employee_id]' order by Tgl asc LIMIT 1)-1,'-26')
																										  AND CURRENT_DATE() order by `Tgl Awal` DESC;");
          		while($pg = mysqli_fetch_array($periode_gaji)){
			          ?>
			            <tr>
			                <td><a href='<?php echo "?user=$_GET[user]&nip=$k[employee_id]&act=detail-slip&tglawal=".$pg['Tgl Awal']."&tglakhir=".$pg['Tgl Akhir'];?> '>
			                			<button type='button' class='btn btn-primary btn-block btn-flat save'>Lihat</button>
			                		</a>
			                </td>
			                <td align='center'><?php echo tgl_indo($pg['Tgl Awal'])." - ".tgl_indo($pg['Tgl Akhir']); ?> </td>
			            </tr>
			        <?php
	          	}
            ?>
           </tbody>
        </table>
    <?php
    break;
    case "detail-slip":

    $nomLembur = 0;
    $absenSIM = 0;
    $absenLDPA = 0;

    $gajipokok = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@GajiPokok@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $t2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@TunjTetap@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $t3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@TunjLain@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $insentif = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@Insentif@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $kpi = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@TunjTdkTetap@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $lembur = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@Lembur@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $jamlembur = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@JamLembur@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $insenma = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@Insenma@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    //TOTAL BRUTO
    $tot_bruto = $gajipokok['Nilai']+$t2['Nilai']+$t3['Nilai']+$insentif['Nilai']+$kpi['Nilai']+$lembur['Nilai']+$insenma['Nilai'];

    $gajibpjs = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@GajiBPJS@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    $tunjAstek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@TunjAstek@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $tunjBPJS = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@TunjBPJS@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    //TOTAL DIBAYAR PERUSAHAAN
    $tot_tunj_perusahaan = $tunjAstek[Nilai]+$tunjBPJS[Nilai];

    $potAstek = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@PotAstek@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $potBPJS = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM gaji g where nip='$_GET[nip]' and Komponen = '@PotBPJS@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $hariSIM = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@HariSIM@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $potSIM = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@PotSIM@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $jamLDPA = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@JamLDPA@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $potLDPA = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@PotLDPA@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $potSPSI = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@PotSPSI@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    //TOTAL POTONGAN
    $tot_potongan = $potAstek[Nilai]+$potBPJS[Nilai]+$potSIM[Nilai]+$potLDPA[Nilai]+$potSPSI[Nilai];

    //GAJI NETTO
    $tot_gajinetto =  $tot_bruto-$tot_potongan;

    $revisiGaji = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@Revisi@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $thr = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@THR@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $bonus = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@Bonus@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));
    $rapel = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@Rapelan@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    $pph21 = mysqli_fetch_array(mysqli_query($conn, "SELECT sum(Nilai)Nilai FROM gaji g where nip='$_GET[nip]' and Komponen = '@SumPotPPh21@' and Tgl between '$_GET[tglawal]' and '$_GET[tglakhir]';"));

    $tot_terima = $tot_gajinetto+$revisiGaji[Nilai]+$thr[Nilai]+$bonus[Nilai]+$rapel[Nilai];

    	echo "
    		<table border='0' width='100%'>
    			<tr>
    				<td colspan='6'><b><i>PT. KRISANTHIUM O.P</i></b></td>
    			</tr>
    			<tr>
    				<td colspan='6'>SLIP GAJI KARYAWAN PER: ".tgl_indo($_GET[tglawal])." s/d ".tgl_indo($_GET[tglakhir])."</td>
    			</tr>
    			<tr>
    				<td width='30%'><b>NIP</b></td>
    				<td width='1%'>:</td>
    				<td width='10%' colspan='4'>$_GET[nip]</td>
    			</tr>
    			<tr>
    				<td width='30%'><b>NAMA</b></td>
    				<td width='1%'>:</td>
    				<td width='10%' colspan='4'>$k[first_name] $k[last_name]</td>
    			</tr>
    			<tr>
    				<td colspan='6'><b><i><u>Penerimaan</u></i></b></td>
    			</tr>
    			<tr>
    				<td width='30%'>- Gaji Pokok</td>
    				<td width='1%'>:</td>
    				<td width='15%'></td>
    				<td width='1%'>=</td>
    				<td width='10%' align='right'>".ribu($gajipokok['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- T2</td>
    				<td>:</td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($t2['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- T3</td>
    				<td>:</td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($t3['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- Insentif</td>
    				<td>:</td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($insentif['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- KPI</td>
    				<td>:</td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($kpi['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- Lembur</td>
    				<td>:</td>";
    				if($jamlembur[Nilai]==NULL){
    					$jmLbr = "0.00";
    					$nominalLbr = "0.00";
    				}else{
    					$jmLbr = $jamlembur[Nilai];
    					$nominalLbr = $lembur[Nilai]/$jamlembur[Nilai];
    				}
    				echo"
    				<td align='center'>$jmLbr x ".ribu($nominalLbr)."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($lembur['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- Insentif & Uang Makan (sudah terbayar)</td>
    				<td></td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($insenma['Nilai'])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td width='10%' align='right'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td>&nbsp;+</td>
    			</tr>
    			<tr>
    				<td colspan='3' align='right'><b>Total Gaji Bruto (A)&nbsp;&nbsp;</b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($tot_bruto)."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='5'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='6'><b>Tunjangan yang dibayar perusahaan</b></td>
    			</tr>
    			<tr>
    				<td>- BPJS T.Kerja</td>
    				<td>:</td>
    				<td align='center'>6.89% x ".ribu($gajibpjs[Nilai])."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($tunjAstek[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- BPJS Kesehatan</td>
    				<td>:</td>
    				<td align='center'>4% x ".ribu($gajibpjs[Nilai])."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($tunjBPJS[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td width='10%' align='right'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td>&nbsp;+</td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td><font color='blue'><b>Total </b></font></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($tot_tunj_perusahaan)."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='5'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='6'><b><u><i>Potongan</i></u></b></td>
    			</tr>
    			<tr>
    				<td>- BPJS T.Kerja</td>
    				<td>:</td>
    				<td align='center'>3% x ".ribu($gajibpjs[Nilai])."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($potAstek[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- BPJS Kesehatan</td>
    				<td>:</td>
    				<td align='center'>1% x ".ribu($gajibpjs[Nilai])."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($potBPJS[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- Absensi S,I,M</td>
    				<td>:</td>";
    				if($hariSIM[Nilai]==NULL){
    					$jmSIM = "0.00";
    					$nominalSIM = "0.00";
    				}else{
    					$jmSIM = $hariSIM[Nilai];
    					$nominalSIM = $potSIM[Nilai]/$hariSIM[Nilai];
    				}
    				echo"
    				<td align='center'>$jmSIM x ".ribu($nominalSIM)."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($potSIM[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- Lambat/Plg Awal</td>
    				<td>:</td>";
    				if($jamLDPA[Nilai]==NULL){
    					$jmLDPA = "0.00";
    					$nominalLDPA = "0.00";
    				}else{
    					$jmLDPA = $hariSIM[Nilai];
    					$nominalLDPA = $potSIM[Nilai]/$hariSIM[Nilai];
    				}
    				echo"
    				<td align='center'>$jmLDPA x ".ribu($nominalLDPA)."</td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($potLDPA[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- SPSI</td>
    				<td>:</td>
    				<td align='center'></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($potSPSI[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td width='10%' align='right'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td>&nbsp;+</td>
    			</tr>
    			<tr>
    				<td colspan='3' align='right'><font color='red'><b>Total Potongan (B) &nbsp;&nbsp;</b></font></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($tot_potongan)."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='5'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td colspan='2'><b>Total Gaji Netto = A-B </b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($tot_gajinetto)."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td colspan='2'><b>Revisi Gaji</b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($revisiGaji[Nilai])."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td colspan='2'><b>THR </b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($thr[Nilai])."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td colspan='2'><b>Bonus </b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($bonus[Nilai])."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td colspan='2'><b>Rapelan </b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($rapel[Nilai])."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td width='10%' align='right'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td>&nbsp;+</td>
    			</tr>
    			<tr>
    				<td colspan='3' align='right'><b></b></td>
    				<td>=</td>
    				<td width='10%' align='right'><b>".ribu($tot_terima)."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td>- PPh21</td>
    				<td>:</td>
    				<td></td>
    				<td>=</td>
    				<td width='10%' align='right'>".ribu($pph21[Nilai])."</td>
    				<td></td>
    			</tr>
    			<tr>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td></td>
    				<td width='10%' align='right'><hr style='height:2px;border-width:0;color:black;background-color:black'></td>
    				<td>&nbsp;-</td>
    			</tr>
    			<tr>
    				<td colspan='3' align='right'><b>Total Penerimaan &nbsp;&nbsp;</b></td>
    				<td>=</td>";
    				$total_terima = substr(round($tot_terima,0), -1);
						 if($total_terima<5){
						 		$akhir = $tot_terima - $total_terima;
						 }
						 else{
						 		$akhir = $tot_terima + (10-$total_terima);
						 }
    			echo"
    				<td width='10%' align='right'><b>".ribu(round($akhir,0))."</b></td>
    				<td></td>
    			</tr>
    			<tr>
    				<td colspan='5' align='right'><br />Surabaya, ".tgl_indo(date('Y-m-d'))."</td>
    				<td></td>
    			</tr>
    		</table>
    	";
    break;
  	}
    ?>
      </div>
   </div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
	} );

</script>
