<?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('email')){
        redirect('auth');
    }
}


    function checkadmin()
{
    $ci = get_instance();
    if($ci->session->userdata('role_id') != 1){
        redirect('auth/blocked');
    }
}