<?php

function sudah_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id');
    $user_level = $ci->session->userdata('level');
    if($user_session){
       if($user_level == 1){
           redirect('/admin/Dashboard');
       }else{
           redirect('/Dashboard');
       }
    }
}
function cek_login()
{
    $ci =& get_instance();
    $user_session = $ci->session->userdata('id');
    if(!$user_session){
        redirect('/Login');
    }
}
function push_config()
{
    $ci =& get_instance();
    $options = array(
        'cluster' => 'ap1',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        '5169da6fd6f25da82390', //ganti dengan App_key pusher Anda
        'e51e10559f6029a93447', //ganti dengan App_secret pusher Anda
        '1063732', //ganti dengan App_key pusher Anda
        $options
    );
    $data['message'] = 'success';
	$pusher->trigger('my-channel', 'my-event', $data);
}