<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class ajouterModel extends CI_Model 
{


public function ajouter(){


    if(empty($this->session->login)){
        redirect("annonces/liste");
     }

     $this->load->database();
               
     $catreq = $this->db->query("SELECT cat_libelle, cat_id  FROM  waz_categories  ORDER BY cat_libelle asc");  

     // Récupération des résultats    
     $aCat = $catreq->result_array();
     $aView["categoriestab"] = $aCat;

     $catreq = $this->db->query("SELECT opt_libelle, opt_id  FROM  waz_options  ORDER BY opt_libelle asc");  

     // Récupération des résultats    
     $aOpt = $catreq->result_array();
     $aView["optionstab"] = $aOpt;

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
        $data["an_d_ajout"] = date("Y-m-d H:i:s");
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


     }

     return $aView;

}









}
