<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AnnoncesModel extends CI_Model
{

    public function liste($champs,$order)
    {
              // Charge la librairie 'database'
              $this->load->helper('form', 'url'); 
              $this->load->database();
                // Exécute la requête 
                if(!empty($champs)&&$champs =='cat'&&$order =='asc')
                {
                      $order = "order by cat_libelle asc";
                }
                elseif(!empty($champs)&&$champs =='cat'&&$order =='desc')
                {
                  $order = "order by cat_libelle desc";
                }
                elseif(!empty($champs)&&$champs =='prix'&&$order =='asc')
                {
                      $order = "order by an_prix asc";
                }
                elseif(!empty($champs)&&$champs =='prix'&&$order =='desc')
                {
                      $order = "order by an_prix desc";
                }
                else
                {
                  $order = "order by an_vues asc";
                }
                $results = $this->db->query("SELECT *  FROM waz_annonces join waz_options on opt_id = an_opt join waz_categories on cat_id = an_type ".$order);  
   
              // Récupération des résultats    
              $aprepare = $results->result(); 
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
              $this->db->from("waz_picture");
              $this->db->where("pic_an_id", $id);
              $results = $this->db->get();
              // Récupération des résultats    
              $aphoto = $results->result(); 
              //var_dump($aphoto);
         
              return $aphoto;
    }


}     