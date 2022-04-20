<?php
error_reporting(0);
session_start();
include('koneksi.php');
include('fungsi_indotgl.php');
include('fungsi_indotgl2.php');
include('fungsi_ribuan.php');

$h = $_GET[h]; $act = $_GET[act];

if($h=="leave" && $act=="apphrga"){

//UPDATE CUTI DI HRM
	$jum = count($_POST[cek_cuti]);

//INSERT KE TABEL IJIN DAN MASTERCUTI (JIKA Jenis = 'C')
// Sejumlah lama hari cuti, lalu isi tgl approve1 oleh manager dan tgl approve2 oleh hrd. Dan potong jatah cuti
	for($z=0;$z<$jum;$z++)
	{
		$app = $_POST[cek_cuti][$z];

		$t = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(`No Ijin`) AS kd_max FROM ijin"));
		$noUrut = (int) substr($t[kd_max], 1, 9);
		$noUrut++;
		$char = "I";
		$newID = $char . sprintf("%09s", $noUrut);

		mysqli_query($connhrm,"UPDATE xin_leave_applications SET 
											approved_hrd 	= '2',
											approved_hrd_at	= NOW(),
											no_ijin			= '$newID'
											WHERE leave_id 	= '$app'");
		$q = mysqli_query($connhrm, "SELECT x.*, e.employee_id FROM xin_leave_applications x left join xin_employees e on e.user_id=x.employee_id 
									WHERE x.leave_id = '$app'");
		while($j = mysqli_fetch_array($q)){

			$jarak = strtotime($j[to_date]) - strtotime($j[from_date]);
								$hari = $jarak / 60 / 60 / 24;
								$hari = $hari+1;

			//CEK ENTRY BY
			$cek_entry = mysqli_fetch_array(mysqli_query($connhrm, "SELECT a.*, e.username, e.department_id
																	  from xin_leave_applications a
																	left join xin_employees e on a.employee_id = e.user_id
																	WHERE a.leave_id='$app'"));
			$user_entry = preg_replace('/[^A-Za-z0-9]/', '', $cek_entry[username]);
			$dep_entry 	= $cek_entry[department_id];

			//CEK APPROVE1 BY
			$cek_mgr = mysqli_fetch_array(mysqli_query($connhrm, "SELECT * FROM xin_employees x where department_id = '$dep_entry' and user_role_id=5 and is_active=1;"));
			$user_mgr = preg_replace('/[^A-Za-z0-9]/', '', $cek_mgr[username]);

			//USER HRD
			$user_hrd = $_POST[user_hrd];

			$begin = strtotime( $j[from_date] );
			$end   = strtotime( $j[to_date] );
			for($is = $begin; $is <= $end; $is = $is + 86400){
				$tglijin = date("Y-m-d", $is);
				$jenisijin = $j[leave_type_id];
				if($jenisijin == 'C'){
					$gajibayar 	= 1;
					$potcuti	= 1;
				}else{
					$gajibayar 	= 0;
					$potcuti	= 0;
				}

				//CEK KETENTUAN POTONG GAJI DAN OTONG CUTI ATAU TIDAK
				$masterijin = mysqli_fetch_array(mysqli_query($conn, "SELECT *FROM masterijin m WHERE Jenis = '$j[leave_type_id]'"));

				$gajibayar 	= $masterijin['Gaji Dibayar'];
				$potcuti	= $masterijin['Potong Cuti'];

				// echo "GAJI BAYAR = $gajibayar<br>
				// 	  POTONG CUTI = $potcuti<br>";

				mysqli_query($conn,"INSERT INTO ijin (`No Ijin`, Nip, `Tgl Ijin`, `Jenis Ijin`, Keterangan, `Gaji Dibayar`, `Potong Cuti`, `Entry By`, `Tgl Entry`, `Approve1`, `Tgl Approve1`, `Approve2`, `Tgl Approve2` )
					                VALUES('$newID',
										   '$j[employee_id]',
										   '$tglijin',
										   '$jenisijin',
										   '$j[reason]',
										   $gajibayar,
										   $potcuti,
										   '$user_entry',
										   '$j[created_at]',
										   '$user_mgr',
										   '$j[approved_mgr_at]',
										   '$user_hrd',
										   '$j[approved_hrd_at]'
										   )");
			}

			if($potcuti == 1){
				$nip = $j[employee_id];
				
				//UPDATE JATAH CUTI DI SIM PAYROLL

				$jatah_cuti = mysqli_fetch_array(mysqli_query($conn, "SELECT m.Begda, m.Endda, m.Nip, e.Nama, m.Quota, m.Diambil, (m.Quota - m.Diambil)as sisa
																FROM mastercuti m left join masteremployee e on m.nip=e.nip
																  WHERE (m.Begda >= CONCAT(year(CURRENT_DATE()),'-01-01')
																  and m.Endda >= CURRENT_DATE()) AND m.Nip = '$j[employee_id]';"));
				$jum_cuti = $hari;
				$sisa_cutinya = $jatah_cuti[Diambil]+$jum_cuti;
				mysqli_query($conn,"UPDATE mastercuti SET 
													Diambil 	= '$sisa_cutinya'
													WHERE  (Begda >= CONCAT(year(CURRENT_DATE()),'-01-01')
																  and Endda >= CURRENT_DATE()) 
																  AND Nip 	= '$nip'");
			}
			
		}
		
	}

	
	$link = "<script>alert('Berhasil menambahkan ijin');
		window.location='ijin_hrga.php';</script>";
		echo $link;
	
}

?>