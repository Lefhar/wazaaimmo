<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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


    /**
     * \brief vu par defaut contact
     * \return page par defaut de contact charge le modéle contactModel et usersModel pour si l'utilisateur est connecté
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function index()
    {
        $this->load->model('usersModel');
        $this->load->model('contactModel');
        $aViewHeader = $this->usersModel->getUser();
        $aViewHeader = ["title" => "Nous contacter",
        "url" => "/contact","image"=>"assets/src/android-icon-192x192.png","user" => $aViewHeader];
    
     
        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
      $this->contactModel->index();
      $this->load->view('header',$aViewHeader);
      $this->load->view('contact');
      $this->load->view('footer');
    }

    /**
     * \brief vu email envoyé contact
     * \return page si l'email est bien envoyé de contact charge le modéle contactModel et usersModel pour si l'utilisateur est connecté
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function sendok()
    {

        $this->load->model('usersModel');
        $this->load->model('contactModel');
 
        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $data =   $this->contactModel->sendok();
        $aViewHeader = $this->usersModel->getUser();
        $aViewHeader = ["title" => "Message envoyé",
        "url" => "/sendok","image"=>"assets/src/android-icon-192x192.png","user" => $aViewHeader];
         $this->load->view('header',$aViewHeader);
         $this->load->view('contact',$data);
         $this->load->view('footer');
    }
}