<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Photos extends CI_Controller 
{

public function upload(){

    $this->load->model('photosModel');
    $aListe = $this->photosModel->upload();

}

public function delete(){

    $this->load->model('photosModel');
    $aListe = $this->photosModel->delete();
    
}

}