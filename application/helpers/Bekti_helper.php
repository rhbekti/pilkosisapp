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