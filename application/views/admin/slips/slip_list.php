<?php
$session 	= $this->session->userdata('username');
$user 		= $session['user_id'];
$user_info 	= $this->Xin_model->read_user_info($session['user_id']);
if($user_info[0]->password=='$2y$12$3xcEaqm5vdQNswKV3fD2l.bL1a3.qQasv.S/uHzcC4L2/XXRq/I3G'){
  redirect('/admin/profile?change_password=true');
}
?>

<iframe src="../other_modul/slip.php?user=<?php echo $user; ?>" width="100%" height="1100" style="border:none;"></iframe>