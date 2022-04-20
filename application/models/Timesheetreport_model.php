<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Timesheetreport_model extends CI_Model
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
                        [112.4810514830049, -6.891378969293006 ],
                        [112.465053, -6.870359],
                        [112.447906, -6.872308],
                        [112.443139, -6.872905],
                        [112.438802, -6.871669],
                        [112.438379, -6.872990],
                        [112.439324, -6.874780],
                        [112.439975, -6.879179],
                        [112.420049, -6.911899],
                        [112.377279, -6.950411],
                        [112.376644, -6.952429],
                        [112.373359, -6.961460],
                        [112.371645, -6.963697],
                        [112.369413, -6.970513],
                        [112.366925, -6.977627],
                        [112.365938, -6.991598],
                        [112.365938, -6.991598],
                        [112.535076, -7.060519],
                        [112.472550, -7.119801],
                        [112.467587, -7.161148 ],
                        [112.492196, -7.186653 ],
                        [112.401883, -7.239703 ],
                        [112.394270, -7.267630 ], 
                        [112.400497, -7.307900 ],
                        [112.364768, -7.326629 ],
                        [112.391785, -7.334609 ],
                        [112.475967, -7.311088 ],
                        [112.468414, -7.382521 ],
                        [112.479401, -7.403630 ],
                        [112.463093, -7.429956 ],
                        [112.457428, -7.436594 ],
                        [112.454982, -7.447516 ],
                        [112.576218, -7.494030 ],
                        [112.623854, -7.534931 ],
                        [112.670631, -7.560372 ],
                        [112.703247, -7.546739 ], 
                        [112.710285, -7.559134 ], 
                        [112.727795, -7.573087 ], 
                        [112.762127, -7.578873 ], 
                        [112.778091, -7.572747 ], 
                        [112.831650, -7.558113 ], 
                        [112.835770, -7.569684 ], 
                        [112.844009, -7.579894 ], 
                        [112.865124, -7.583978 ], 
                        [112.898598, -7.581255 ], 
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
                        [112.4890514830049, -6.891378969293006 ]
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
                left join xin_employees em on e.reports_to = em.user_id
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date'
                GROUP BY e.user_id";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function get_hadir($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran ,em.first_name man_first_name,em.last_name man_last_name,e.reports_to
                from xin_employees e
                left join xin_employees em on e.reports_to = em.user_id
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and (a.clock_in_image_log is not null and clock_in_image_log != '') 
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
                ,f.clock_in_log first_log,l.clock_in_log last_log, coalesce(l.clock_in_image_log,f.clock_in_image_log) image_log,coalesce(l.clock_in_address_log,f.clock_in_address_log) address_log
               ,e.reports_to,em.first_name man_first_name,em.last_name man_last_name
                from xin_employees e
                left join xin_attendance_time_log a on e.user_id = a.employee_id and a.clock_in_date_log = '$date' and (a.clock_in_image_log is not null and a.clock_in_image_log != '') 
                left join xin_attendance_time_log f on e.user_id = f.employee_id and f.clock_in_date_log = '$date' and  f.xin_attendance_time_log_id = (
                    select min(fx.xin_attendance_time_log_id) from xin_attendance_time_log fx where fx.clock_in_date_log = '$date' and fx.employee_id = f.employee_id  and (fx.clock_in_image_log is not null and fx.clock_in_image_log != '') 
                )
                left join xin_attendance_time_log l on e.user_id = l.employee_id and l.clock_in_date_log = '$date' and l.xin_attendance_time_log_id = (
                    select max(lx.xin_attendance_time_log_id) from xin_attendance_time_log lx where lx.clock_in_date_log = '$date' and lx.employee_id = l.employee_id  and (lx.clock_in_image_log is not null and lx.clock_in_image_log != '') 
                )
                left join xin_employees em on e.reports_to = em.user_id
                where e.is_active <> 0 and (e.user_id != 1 and e.user_id != 5)
                GROUP BY e.user_id,first_log,last_log,image_log,address_log
                HAVING kehadiran > 0 ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_absen($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran ,em.first_name man_first_name,em.last_name man_last_name,e.reports_to
                from xin_employees e
                left join xin_employees em on e.reports_to = em.user_id
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and (a.clock_in_image_log is not null and clock_in_image_log != '')
                where e.is_active <> 0 and (e.user_id != 1 and e.user_id != 5)
                GROUP BY user_id
                HAVING kehadiran <= 0 ";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_absenkoor($date=''){
        if(empty($date)){
            $date = date('Y-m-d');
        }
        $sql = "select count(user_id)jum, man_first_name, man_last_name, reports_to from(select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran ,em.first_name man_first_name, em.last_name man_last_name,e.reports_to
                from xin_employees e
                left join xin_employees em on e.reports_to = em.user_id
                left join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and (a.clock_in_image_log is not null and clock_in_image_log != '')
                where e.is_active <> 0 and (e.user_id != 1 and e.user_id != 5)
                GROUP BY user_id
                HAVING kehadiran <= 0)a group by reports_to;";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function get_absensim($datebeg='', $dateend=''){
        if(empty($datebeg) || empty($dateend)){
            $datebeg = date('Y-m-d');
            $dateend = date('Y-m-d');
        }
        $sql = "select b.badgenumber as FingerPrintID, DATE_FORMAT(c.clock_in_date_log, '%m/%d/%Y') as DateLog,
                LEFT(c.clock_in_log, 5) as TimeLog,
                CASE
                  WHEN LEFT(c.clock_in_log, 5) <= '12:00' THEN 0
                  ELSE 1 END FunctionKey,'' as Edited,
                CONCAT(a.first_name, ' ', a.last_name)UserName, 'Device' as FlagAbsence,
                CONCAT(DATE_FORMAT(c.clock_in_date_log, '%m/%d/%Y'), ' ', DATE_FORMAT(c.clock_in_log,'%h:%i %p')) `DateTime`,
                'Data' as EmployeeStatus,
                '0' as FunctionKeyEdited
                  FROM xin_attendance_time_log c
                    LEFT JOIN xin_employees a on a.user_id = c.employee_id
                    LEFT JOIN xin_employee_simpayroll b on a.employee_id = b.ssn
                 where (c.clock_in_date_log between '$datebeg' AND '$dateend')
                   AND a.user_id in (SELECT employee_id FROM xin_jadwals WHERE jadwal_date between '$datebeg' AND '$dateend')
                   AND b.badgenumber is not null
                   AND (c.is_first = 1 or c.is_last = 1)
                 order by b.badgenumber, DateLog, TimeLog ASC;";
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
        $sql = "select e.user_id,e.contact_no,e.first_name,e.last_name,count(a.xin_attendance_time_log_id) kehadiran ,em.first_name man_first_name,em.last_name man_last_name
                from xin_employees e
                join xin_attendance_time_log a on e.user_id = a.employee_id and clock_in_date_log = '$date' and a.is_dangerarea = 1
                left join xin_employees em on e.reports_to = em.user_id
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