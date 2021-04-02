
<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class photosModel extends CI_Model 
{


    public function upload()
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
        $data = $this->input->post();
        $pic_an_id = $this->input->post('pic_an_id');
      

               // On extrait l'extension du nom du fichier 
               // Dans $_FILES["pro_photo"], pro_photo est la valeur donnée à l'attribut name du champ de type 'file'  
              var_dump($_FILES["an_photo"]["name"]);
              $i = 0;
              $count = count($_FILES["an_photo"]["name"]);
              foreach($_FILES["an_photo"]["name"] as $fichier){
           $extension = substr(strrchr($fichier, "."), 1);
           $config['upload_path'] = $_SERVER['DOCUMENT_ROOT']. '/assets/images/annonce_'.$pic_an_id.'/'; // chemin où sera stocké le fichier
     
           // On indique les types autorisés (ici pour des images)
           $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
           $this->load->library('upload', $config);
      
            if (!$this->upload->do_multi_upload('an_photo'))
            {
                echo 'blocage';
                
                // Echec de la validation, on réaffiche la vue formulaire 
              // Echec : on récupère les erreurs dans une variable (une chaîne)
             $sUploadErrors = $this->upload->display_errors("<div class='alert alert-danger'>", "</div>");    
echo $sUploadErrors;
            // on réaffiche la vue du formulaire en passant les erreurs 
            $aView["sUploadErrors"] = $sUploadErrors;

            /* On envoie le message d'erreur dans le fichier php_error.log,
            * voir explications ci-après
            */
            error_log($sUploadErrors, 0);

            }
            else
            { // La validation a réussi, nos valeurs sont bonnes, on peut insérer en base

                $data["pic_date"] = date("Y-m-d H:i:s");
                $data['pic_ext']= $extension;
                var_dump($data);
               $this->db->insert('waz_picture', $data);
             // nom du fichier final
             
             $config['file_name'] = ''.$pic_an_id.'-'.$this->db->insert_id().'.'.$extension; 
             // On initialise la config 

             $this->upload->initialize($config);
            $datafile = $this->upload->get_multi_upload_data();
             rename($config['upload_path']."".$fichier,$config['upload_path']."".$config['file_name']);

             //effacement des multiples fichier 
             foreach($datafile as $delfile){
                unlink($delfile["full_path"]);
             }
         
             $i++;
            }       
            if($count== $i){
            redirect("annonces/modifier/".$pic_an_id);
        }
        }
    }

    public function delete()
    {
        
        if(empty($this->session->login)){
            redirect("annonces/liste");
         }
        $this->load->database();  
    
        // Chargement de la librairie form_validation
        $this->load->library('form_validation'); 

        $data = $this->input->post();
      
        $pic_id = $this->input->post('pic_id');

        $photo = $this->db->query("SELECT pic_an_id, pic_id, pic_ext FROM waz_picture WHERE pic_id= ?", $pic_id);
        $aView["photo"] = $photo->row(); // première ligne du résultat
        $pic_an_id = $aView["photo"]->pic_an_id;

        $config['upload_path'] = $_SERVER['DOCUMENT_ROOT']. '/assets/images/annonce_'.$pic_an_id.'/'; // chemin où sera stocké le fichier
           
            if(unlink($config['upload_path']."/".$pic_an_id."-".$aView["photo"]->pic_id.".".$aView["photo"]->pic_ext)){
                $this->db->where('pic_id', $pic_id);//défini la condition pro_id = id
                $this->db->delete('waz_picture');//on efface le produit de la base
                redirect("annonces/modifier/".$pic_an_id);
            }
    }

}