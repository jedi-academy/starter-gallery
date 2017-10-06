<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends Application {
    function __construct()
    {
        parent::__construct();
    }

    function view($page='home'){
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->data['title'] = 'about';
        $this->data['pagebody'] = 'about';
        $this->render();
    }
}
