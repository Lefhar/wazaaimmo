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
        // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        $this->load->database();  
    
        // Chargement de la librairie form_validation
        $this->load->library('form_validation'); 
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $produit = $this->db->query("SELECT * FROM produits WHERE an_id= ?", $id);
        $aView["produit"] = $produit->row(); // première ligne du résultat

        $categorie = $this->db->query("SELECT cat_nom, cat_id  FROM  categories  ORDER BY cat_nom asc");  

        // Récupération des résultats    
        $aCat = $categorie->result(); 
        $aView["categorie"] = $aCat;
        $aViewHeader = $this->usersModel->getUser();
        $aViewHeader = ["title" => "Modifier un produit","user" => $aViewHeader];
        $this->load->view('header', $aViewHeader);
        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

           $data = $this->input->post();
        //    var_dump($data);
           if($this->input->post('an_bloque')==true){$data["an_bloque"]= "1";}else{$data["an_bloque"]= "0";}
        //    var_dump($data);
           $an_ref = $this->input->post('an_ref');
           $data["an_ref"] = strtoupper($an_ref);
           $data["an_d_modif"] = date("Y-m-d H:i:s");
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_ref'
           $this->form_validation->set_rules('an_ref', 'Référence', 'required|min_length[6]|max_length[10]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">La %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 10 caractères.</div>"));

           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_libelle'
           $this->form_validation->set_rules('an_titre', 'Libellé', 'required|min_length[6]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>"));


           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_stock'
           $this->form_validation->set_rules('an_stock', 'Stock', 'required|min_length[1]|numeric', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>", "numeric" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit être une valeur numérique.</div>"));
           
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_prix'
           $this->form_validation->set_rules('an_prix', 'Prix', 'required|min_length[1]|numeric', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 6 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit avoir longueur minimum de 200 caractères.</div>", "numeric" => "<div class=\"alert alert-danger\" role=\"alert\">Le %s doit être une valeur numérique.</div>"));
           
           // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'an_description'
           $this->form_validation->set_rules('an_description', 'Description', 'required|min_length[10]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">La %s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">La %s doit avoir une longueur minimum de 10 caractères.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">La %s doit avoir une longueur minimum de 1000 caractères.</div>"));
           if ($_FILES) 
           {
              // var_dump($_FILES);
            $ctrlfile=false;
              // On extrait l'extension du nom du fichier 
              // Dans $_FILES["an_photo"], an_photo est la valeur donnée à l'attribut name du champ de type 'file'  
              $extension = substr(strrchr($_FILES["an_photo"]["name"], "."), 1);
              $config['upload_path'] = $_SERVER['DOCUMENT_ROOT']. '/ci/assets/images/'; // chemin où sera stocké le fichier
              $config['file_name'] = $id.'.'.$extension; 
              // On indique les types autorisés (ici pour des images)
              $config['allowed_types'] = 'gif|jpg|jpeg|png'; 

              if(file_exists($config['upload_path']."".$id.".".$aView["produit"]->an_photo))
              {
                unlink($config['upload_path']."".$config['file_name']);
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    if(!$this->upload->do_upload('an_photo')){
                          $ctrlfile=false;
                    }else{

                        $ctrlfile = true;
                    }
             }
             else{
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('an_photo')){
                    $ctrlfile=false;
              }else{


                  $ctrlfile = true;
              }
            }

            }else{

               $ctrlfile = true;
            
           }
    
           if ($this->form_validation->run() == FALSE or $ctrlfile==false)
           { // Echec de la validation, on réaffiche la vue formulaire 
             
           }
           else
           { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
    
              /* Utilisation de la méthode where() toujours 
              * avant select(), insert() ou update()
              * dans cette configuration sur plusieurs lignes 
              */  
             $this->db->where('an_id', $id);
             $this->db->update('annonces', $data);
    
             redirect("annonces/liste");
          }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire             
    
        }
   
    } // -- modifier()
return $aView;
}