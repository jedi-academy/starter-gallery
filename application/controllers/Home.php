<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Application
{
    function index() 
    {
        $this->data['pagebody'] = 'home';

        $this->render();

    }
}
