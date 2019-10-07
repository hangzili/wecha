<?php
class A extends CI_Controller {

    public function index()
    {
    	$a=['123','2334'];

    	$this->load->view('/index/list.html',$a);
        echo 'Hello World!';
    }
}