<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class ajouterModel extends CI_Model 
{


public function ajouter()
{


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
     
     //tableau pour an_offre
     $aView["dataoffre"] = [0=>['id'=>'A','titre'=>'Acheter'],
     1=>['id'=>'L','titre'=>'Location'],
     2=>['id'=>'V','titre'=>'Vendre']];


     if ($this->input->post()) 
     {
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

                    
        
        
        
        if ($this->form_validation->run())
        {





                $this->db->insert('waz_annonces', $data);

                $pic_an_id = $this->db->insert_id();
            

                // On extrait l'extension du nom du fichier 
                // Dans $_FILES["pro_photo"], pro_photo est la valeur donnée à l'attribut name du champ de type 'file'  
                //var_dump($_FILES["an_photo"]["name"]);
                $i = 0;
                $count = count($_FILES["an_photo"]["name"]);
                foreach($_FILES["an_photo"]["name"] as $fichier){
                $extension = substr(strrchr($fichier, "."), 1);

                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT']. '/assets/images/annonce_'.$pic_an_id.'/'; // chemin où sera stocké le fichier
                
                if(!file_exists($config['upload_path'])){mkdir($config['upload_path'], 0777);} 
                
                // On indique les types autorisés (ici pour des images)
                $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
                $this->load->library('upload', $config);
                        
                                if (!$this->upload->do_multi_upload('an_photo'))
                                {
                                  
                                    
                                    // Echec de la validation, on réaffiche la vue formulaire 
                                // Echec : on récupère les erreurs dans une variable (une chaîne)
                                $sUploadErrors = $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");    
                                  //  echo $sUploadErrors;
                                // on réaffiche la vue du formulaire en passant les erreurs 
                                $aView["sUploadErrors"] = $sUploadErrors;

                                /* On envoie le message d'erreur dans le fichier php_error.log,
                                * voir explications ci-après
                                */
                                error_log($sUploadErrors, 0);

                                }
                                else
                                { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base
                                    $data2["pic_an_id"] = $pic_an_id;
                                    $data2["pic_date"] = date("Y-m-d H:i:s");
                                    $data2['pic_ext']= $extension;
                                    var_dump($data2);
                                    $this->db->insert('waz_picture', $data2);
                                // nom du fichier final
                                
                                $config['file_name'] = ''.$pic_an_id.'-'.$this->db->insert_id().'.'.$extension; 
                                // On initialise la config 

                                $this->upload->initialize($config);
                                $datafile = $this->upload->get_multi_upload_data();
                                rename($config['upload_path']."".$fichier,$config['upload_path']."".$config['file_name']);

                                //effacement des multiples fichier 
                                foreach($datafile as $delfile){
                                    if(file_exists($delfile["full_path"])){
                                    unlink($delfile["full_path"]);
                                    }
                                }
                            
                                $i++;
                                }

                             
                     }

                     if($count== $i){
                        redirect("annonces/liste");
                         }


        }else{


        }

                

    }
    return $aView;
    }







}
