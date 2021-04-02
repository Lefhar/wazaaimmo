<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class modifierModel extends CI_Model 
{


    /**
     * \brief modifierModel charge la fonction modifier pour modifier un produit
     * \param  $id     id du produit
     * \return redirection produits/liste
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function modifier($id)
    {
        
      if(empty($this->session->login)){
         redirect("annonces/liste");
      }
      // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        $this->load->database();  
    
        // Chargement de la librairie form_validation
        $this->load->library('form_validation'); 
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $this->db->select("an_id, an_offre , an_type, cat_id, cat_libelle, an_opt, an_pieces, an_ref,  an_titre, an_description, an_local, an_surf_hab, an_surf_tot, an_prix, an_diagnostic, an_d_ajout, an_d_modif");
        $this->db->from('waz_annonces');
        $this->db->join('waz_categories', 'cat_id = an_type');
        $this->db->join('waz_options', 'opt_id = an_opt');
        $this->db->where('an_id',$id);
 
       //$aProduit = $this->query();
       $result = $this->db->get();
       $aprepare = $result->result(); 


       $catreq = $this->db->query("SELECT cat_libelle, cat_id  FROM  waz_categories  ORDER BY cat_libelle asc");  

       // Récupération des résultats    
       $aCat = $catreq->result_array();
       $aView["categoriestab"] = $aCat;

       $catreq = $this->db->query("SELECT opt_libelle, opt_id  FROM  waz_options  ORDER BY opt_libelle asc");  

       // Récupération des résultats    
       $aOpt = $catreq->result_array();
       $aView["optionstab"] = $aOpt;
       
    //    foreach ($aCat as $row2 ){
    //     $aView["categoriestab"] .= ["cat_id"=>$row2->cat_id,"cat_libelle"=>$row2->cat_libelle];
      
    //   }

 foreach ($aprepare as $row ){
   $aView["infoprod"]= ["an_id"=>$row->an_id,"an_offre"=>$row->an_offre,
   "cat_id"=>$row->cat_id,"cat_libelle"=>$row->cat_libelle,"an_type"=>$row->an_type,
   "an_opt"=>$row->an_opt,"an_pieces"=>$row->an_pieces,
   "an_ref"=>$row->an_ref,"an_titre"=>$row->an_titre,"an_description"=>$row->an_description,
   "an_local"=>$row->an_local,"an_surf_hab"=>$row->an_surf_hab,"an_surf_tot"=>$row->an_surf_tot,
   "an_prix"=>$row->an_prix,"an_diagnostic"=>$row->an_diagnostic,"an_d_ajout"=>$row->an_d_ajout,
   "an_d_modif"=>$row->an_d_modif,"photo"=>$this->photo($row->an_id)];
 
 }
          
     //tableau pour diagnostique
     $aView["datadia"] = [0=>['id'=>'A','titre'=>'A'],
     1=>['id'=>'B','titre'=>'B'],
     2=>['id'=>'C','titre'=>'C'],
     3=>['id'=>'D','titre'=>'D'],
     4=>['id'=>'E','titre'=>'E'],
     5=>['id'=>'F','titre'=>'F'],
     6=>['id'=>'V','titre'=>'Non fait']
     ];

       
        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

           $data = $this->input->post();
        //    var_dump($data);
       
        //    var_dump($data);
           $an_ref = $this->input->post('an_ref');
           $data["an_ref"] = strtoupper($an_ref);
           $data["an_d_modif"] = date("Y-m-d H:i:s");
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_ref'
           $this->form_validation->set_rules('an_ref', 'Référence', 'required|min_length[6]|max_length[10]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">La %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 10 caractères.</div>"));

           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_titre'
           $this->form_validation->set_rules('an_titre', 'Titre', 'required|min_length[6]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>"));


           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_surf_hab'
           $this->form_validation->set_rules('an_surf_hab', 'Surface habitable', 'required|min_length[1]|numeric', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>", "numeric" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit être une valeur numérique.</div>"));
           
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_surf_tot'
           $this->form_validation->set_rules('an_surf_tot', 'Surface Total', 'required|min_length[1]|numeric', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>", "numeric" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit être une valeur numérique.</div>"));
           
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_description'
           $this->form_validation->set_rules('an_description', 'Description', 'required|min_length[10]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">La %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">La %s doit avoir une longueur minimum de 10 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">La %s doit avoir une longueur minimum de 1000 caractères.</div>"));
  

           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'Emplacement'
           $this->form_validation->set_rules('an_local', 'Emplacement', 'required|min_length[10]|max_length[100]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">%s doit avoir une longueur minimum de 10 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">%s doit avoir une longueur minimum de 100 caractères.</div>"));
  

           if ($this->form_validation->run() == FALSE)
           { // Echec de la validation, on réaffiche la vue formulaire 
             
           }
           else
           { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
    
              /* Utilisation de la méthode where() toujours 
              * avant select(), insert() ou update()
              * dans cette configuration sur plusieurs lignes 
              */  
             $this->db->where('an_id', $id);
             $this->db->update('waz_annonces', $data);
    
             redirect("annonces/liste");
          }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire             
    
        }
        return $aView;
    } // -- modifier()
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