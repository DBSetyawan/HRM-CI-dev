<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Timesheetreportwfh_model extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
	// get office shifts
	public function get() {
	  return $this->db->get("xin_attendance_time_log");
	}

	// get office shifts
	public function get_where($where) {
		$this->db->where($where);
	  return $this->db->get("xin_attendance_time_log");
	}

	// get office shifts
	public function get_by_employee_date($employee='',$date='') {
		if(!empty($employee)){
			$this->db->where(['employee_id' => $employee]);
		}
		if(!empty($date)){
			$this->db->where(['clock_in_date_log' => $date]);
		}
	  return $this->db->get("xin_attendance_time_log");
	}


	// check if check-in available
	public function attendance_first_in_check($employee_id,$attendance_date) {
	
		$sql = 'SELECT * FROM xin_attendance_time_log WHERE employee_id = ? and clock_in_date_log = ? limit 1';
		$binds = array($employee_id,$attendance_date);
		$query = $this->db->query($sql, $binds);

		return $query;
	}

	public function check_danger_area($lat =0,$lon=0,$radius=1.1){
		$sql = " SELECT
				`id`,
				`status`,kecamatan,kelurahan,lat,lon,umur,
				ACOS( SIN( RADIANS( `lat` ) ) * SIN( RADIANS( $lat ) ) + COS( RADIANS( `lat` ) )
				* COS( RADIANS( $lat )) * COS( RADIANS( `lon` ) - RADIANS( $lon )) ) * 6380  AS `distance`

				FROM `covid`

				WHERE
				ACOS( SIN( RADIANS( `lat` ) ) * SIN( RADIANS( $lat ) ) + COS( RADIANS( `lat` ) )
				* COS( RADIANS( $lat )) * COS( RADIANS( `lon` ) - RADIANS( $lon )) ) * 6380  < $radius

				ORDER BY `distance` ";
		$query = $this->db->query($sql);

		$data =  $query->result();

		return $data;
	}

	public function get_positif_covid(){
		$sql = " SELECT * FROM `covid` ";
		$query = $this->db->query($sql);

		$data =  $query->result();

		return $data;
	}


    public function check_out_area($lat='',$long=''){
        $polygon = [
                    [112.5076344490315, -6.91013453173875],
                    [112.5032501800069, -7.001645179046085],
                    [112.4896860681518, -7.029854175712152],
                    [112.4758414283473, -7.122330923478334 ],
                    [112.4672618796782, -7.269021343891386 ],
                    [112.484952253619, -7.418263421920795 ],
                    [112.5507405554295, -7.497941595807626 ],
                    [112.6051759835411, -7.52242877701492 ],
                    [112.6671960538091, -7.542492196117244 ],
                    [112.6842865165742, -7.554405444656372 ],
                    [112.8262174214204, -7.545602936202486 ],
                    [112.8858971250737, -7.538680969099834 ],
                    [112.8510128985872, -7.43445917622328 ],
                    [112.8623503696434, -7.30885065610215 ],
                    [112.8623339014921, -7.278706753765718 ],
                    [112.8299733371354, -7.235407638676707 ],
                    [112.7848900901381, -7.189659931384049 ],
                    [112.7386736197416, -7.184059863251744 ],
                    [112.7032329755609, -7.183468464137829 ],
                    [112.679200300688, -7.157756110249143 ],
                    [112.6621380315954, -7.121348020637834 ],
                    [112.6601684189282, -7.00723588598849 ],
                    [112.6273095762686, -6.973374994224247 ],
                    [112.6374247083357, -6.916277748177824 ],
                    [112.6304759821946, -6.872977863811998 ],
                    [112.6109498610979, -6.82492560770787 ],
                    [112.5907389061413, -6.801715360573999 ],
                    [112.5408393334162, -6.80109843911027 ],
                    [112.5067364353248, -6.831215955020149 ],
                    [112.4947391534331, -6.8550488749138 ],
                    [112.4890514830049, -6.881378969293006 ],
                    [112.5076344490315, -6.91013453173875 ]
                  ];
        if(empty($lat) || empty($long)){
            $lat_long = [112.5076344490315,-6.91013453173875 ];
        }else{
            $lat_long = [$long,$lat];
        }
        
        $test = $this->contains($lat_long,$polygon);
        return $test;
    }
    
    function contains($point, $polygon)
    {
        if($polygon[0] != $polygon[count($polygon)-1])
            $polygon[count($polygon)] = $polygon[0];
        $j = 0;
        $oddNodes = false;
        $x = $point[0];
        $y = $point[1];
        $n = count($polygon);
        for ($i = 0; $i < $n; $i++)
        {
            $j++;
            if ($j == $n)
            {
                $j = 0;
            }
            if ((($polygon[$i][1] < $y) && ($polygon[$j][1] >= $y)) || (($polygon[$j][1] < $y) && ($polygon[$i][1] >=
                $y)))
            {
                if ($polygon[$i][0] + ($y - $polygon[$i][1]) / ($polygon[$j][1] - $polygon[$i][1]) * ($polygon[$j][0] -
                    $polygon[$i][0]) < $x)
                {
                    $oddNodes = !$oddNodes;
                }
            }
        }
        return $oddNodes;
    }

    function get_all($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date'
                GROUP BY user_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_hadir($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date'
                GROUP BY user_id
                HAVING kehadiran > 0 ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_hadir_rpt($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran
                ,f.clock_in_log first_log,l.clock_in_log last_log 
                from xin_employees e
                left join xin_attendance_time_log a on e.user_id = a.employee_id and a.clock_in_date_log = '$date'
                left join xin_attendance_time_log f on e.user_id = f.employee_id and f.clock_in_date_log = '$date' and f.is_first = 1
                left join xin_attendance_time_log l on e.user_id = l.employee_id and l.clock_in_date_log = '$date' and l.is_last = 1
                GROUP BY user_id,first_log,last_log
                HAVING kehadiran > 0 ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_absen($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date'
                GROUP BY user_id
                HAVING kehadiran <= 0 ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_luarkota($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,a.clock_in_date_log, e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and a.is_luarkota = 1
                GROUP BY user_id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_dalamkota($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and a.is_luarkota != 1
                GROUP BY user_id ";
        $query = $this->db->query($sql);
        return $query->result();

        /*
        -- Dalam KOta Jaga-jaga
        select ax.*,count(xin_attendance_time_log_id) kehadiran_out 
        from 
        (
        select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
        -- ,count(ac.xin_attendance_time_log_id) kehadiran_out 
        from xin_employees e
        join xin_attendance_time_log a on e.user_id = a.employee_id and a.clock_in_date_log = '2020-05-04' and a.is_luarkota != 1
        -- left join xin_attendance_time_log ac on e.user_id = ac.employee_id and ac.clock_in_date_log = '2020-05-04' and a.is_luarkota = 1
        GROUP BY user_id 
        ) ax
        left join xin_attendance_time_log ac on ax.user_id = ac.employee_id and ac.clock_in_date_log = '2020-05-04' and ac.is_luarkota = 1
        GROUP BY user_id 
        having kehadiran_out < 1

        */
    }

    function get_dangerarea($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran 
                from xin_employees e
                join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and a.is_dangerarea = 1
                GROUP BY user_id ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_history($date='',$pegawai=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,a.*
                from xin_employees e
                join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and a.employee_id = $pegawai 
                where e.user_id = $pegawai ";
        $query = $this->db->query($sql);
        return $query->result();
    }



}