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

      $aViewHeader = $this->usersModel->getUser();
      $aViewHeader = ["title" => $aView["liste_produits"][0]["cat_libelle"]." ".$aView["liste_produits"][0]["an_titre"],
      "url" => "annonces/liste","user" => $aViewHeader,"image"=>"assets/images/annonce_".$aView["liste_produits"][0]["photo"][0]->pic_an_id."/".$aView["liste_produits"][0]["photo"][0]->pic_an_id."-".$aView["liste_produits"][0]["photo"][0]->pic_id.".".$aView["liste_produits"][0]["photo"][0]->pic_ext];
      
      $this->load->view('header',$aViewHeader);
        $this->load->view('liste',$aView);
       $this->load->view('footer');


    }

   
    public function details()
    {
      $id =$this->uri->segment(3);  
        $this->load->model('detailsModel');
        $aListe = $this->detailsModel->detail($id);
      //  var_dump($aListe);
      $aView["infoprod"] = $aListe;
      $this->load->model('usersModel');
      $aViewHeader = $this->usersModel->getUser();

      $aViewHeader = ["title" => $aView["infoprod"][0]["cat_libelle"]." ".$aView["infoprod"][0]["an_titre"],
      "url" => "annonces/details/".$aView["infoprod"][0]['an_id'],"user" => $aViewHeader,"image"=>"assets/images/annonce_".$aView["infoprod"][0]["photo"][0]->pic_an_id."/".$aView["infoprod"][0]["photo"][0]->pic_an_id."-".$aView["infoprod"][0]["photo"][0]->pic_id.".".$aView["infoprod"][0]["photo"][0]->pic_ext];
      $this->load->view('header',$aViewHeader);
        $this->load->view('detail',$aView);
       $this->load->view('footer');


    }

    public function modifier()
    {
      $id =$this->uri->segment(3);  
        $this->load->model('modifierModel');
        $aView = $this->modifierModel->modifier($id);
     //   var_dump($aListe[0]);
     
   
      $this->load->model('usersModel');
      $aViewHeader = $this->usersModel->getUser();
    var_dump($aView);
      $aViewHeader = ["title" => "Modification ".$aView["infoprod"]["cat_libelle"]." ".$aView["infoprod"]["an_titre"],
      "url" => "annonces/modifier/".$aView["infoprod"]['an_id'],"user" => $aViewHeader,"image"=>"assets/images/annonce_".$aView["infoprod"]["photo"][0]->pic_an_id."/".$aView["infoprod"]["photo"][0]->pic_an_id."-".$aView["infoprod"]["photo"][0]->pic_id.".".$aView["infoprod"]["photo"][0]->pic_ext];
      $this->load->view('header',$aViewHeader);
        $this->load->view('modifier',$aView);
       $this->load->view('footer');


    }
}