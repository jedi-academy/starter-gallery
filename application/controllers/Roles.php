<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends Application
{

   // private $session;

    public function actor($role = ROLE_GUEST)
        {
            //$this->load->library('session');
            $this->session->set_userdata('userrole',$role);
            redirect($_SERVER['HTTP_REFERER']); // back where we came from
        }

}