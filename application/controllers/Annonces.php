<?php
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces extends CI_Controller 
{



    public function liste()
    {
     
        $champs = "";
        $order = "";
        $champs =$this->uri->segment(3);  
        $order =$this->uri->segment(4);  
        $this->load->model('annoncesModel');
        $aListe = $this->annoncesModel->liste($champs,$order);
      //  var_dump($aListe);
      $aView["liste_produits"] = $aListe;
      $this->load->model('usersModel');
      $aViewHeader['user'] = $this->usersModel->getUser();
    
      $this->load->view('header',$aViewHeader);
        $this->load->view('liste',$aView);
       $this->load->view('footer');


    }

   
    public function details()
    {
      $id =$this->uri->segment(3);  
        $this->load->model('annoncesModel');
        $aListe = $this->annoncesModel->detail($id);
      //  var_dump($aListe);
      $aView["infoprod"] = $aListe;
      $this->load->model('usersModel');
      $aViewHeader['user'] = $this->usersModel->getUser();
     
      $this->load->view('header',$aViewHeader);
        $this->load->view('detail',$aView);
       $this->load->view('footer');


    }
}