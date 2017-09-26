<?php

/**
 * Created by PhpStorm.
 * User: Naman
 * Date: 2017-09-21
 * Time: 1:34 PM
 */
class Gallery extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['pagebody'] = 'gallery';
        $this->render();
        //$this->load->view('gallery');
    }

}