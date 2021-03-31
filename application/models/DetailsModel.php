<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class detailsModel extends CI_Model 
{


    /**
     * \brief charge la vu de detail par detailsModel (édition de produit)
     * \return redirection sur produits/liste
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function detail($id)
    {

              $this->load->database();
               
       $this->db->select("an_id, an_offre , an_type, an_opt, an_pieces, cat_libelle, an_ref, an_titre, an_description, an_local, an_surf_hab, an_surf_tot, an_prix, an_diagnostic, an_d_ajout, an_d_modif, opt_id, opt_libelle, cat_id");
       $this->db->from('annonces');
       $this->db->join('options', 'opt_id = an_opt');
       $this->db->join('categories', 'cat_id = an_type');
       $this->db->where('an_id',$id);

      //$aProduit = $this->query();
      $result = $this->db->get();
      $aprepare = $result->result(); 
foreach ($aprepare as $row ){
  $aListe[]= ["an_id"=>$row->an_id,"an_offre"=>$row->an_offre,"an_type"=>$row->an_type,
  "an_opt"=>$row->an_opt,"an_pieces"=>$row->an_pieces,"cat_libelle"=>$row->cat_libelle,
  "an_ref"=>$row->an_ref,"an_titre"=>$row->an_titre,"an_description"=>$row->an_description,
  "an_local"=>$row->an_local,"an_surf_hab"=>$row->an_surf_hab,"an_surf_tot"=>$row->an_surf_tot,
  "an_prix"=>$row->an_prix,"an_diagnostic"=>$row->an_diagnostic,"an_d_ajout"=>$row->an_d_ajout,
  "an_d_modif"=>$row->an_d_modif,"opt_id"=>$row->opt_id,"opt_libelle"=>$row->opt_libelle,
  "cat_id"=>$row->cat_id,"photo"=>$this->photo($row->an_id)];

}
         
              return $aListe;
    }   

    public function photo($id)
    {
              // Charge la librairie 'database'
              $this->load->helper('form', 'url'); 
              $this->load->database();  
              $this->db->select("pic_id,pic_an_id, pic_ext");
              $this->db->from("picture");
              $this->db->where("pic_an_id", $id);
              $results = $this->db->get();
              // Récupération des résultats    
              $aphoto = $results->result(); 
              //var_dump($aphoto);
         
              return $aphoto;
    }
}