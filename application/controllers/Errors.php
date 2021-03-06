<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors  extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function error404()
    {
        $this->load->model('usersModel');
        $aViewHeader = $this->usersModel->getUser();
        $aViewHeader = ["title" => "Erreur 404",
        "url" => "/error404","image"=>"assets/src/android-icon-192x192.png","user" => $aViewHeader];
        $this->load->view('header',$aViewHeader);
        $this->load->view('error404');
        $this->load->view('footer');
    }
}
