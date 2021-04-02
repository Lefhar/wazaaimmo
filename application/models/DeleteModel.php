<?php
// application/controllers/detail.php

defined('BASEPATH') OR exit('No direct script access allowed');

class deleteModel extends CI_Model 
{


    /**
     * \brief charge la vu par delete de deleteModel (suppréssion de produit)
     * \param  $id     id du produit
     * \return redirection sur produits/liste
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function delete($id)
    {
        // Chargement des assistants 'form' et 'url'
        $this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        $this->load->database();  
    
        // Chargement de la librairie form_validation
        $this->load->library('form_validation'); 
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $produit = $this->db->query("SELECT * FROM waz_annonces WHERE an_id= ?", $id);
        $aView["produit"] = $produit->row(); // première ligne du résultat

        $config['fileproduit'] = $_SERVER['DOCUMENT_ROOT']. '/assets/images/annonce_'.$aView["produit"]->an_id.'/'; // chemin où sera stocké le fichier

        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire

           $data = $this->input->post();
          
    // var_dump($data);
    // echo $this->input->post('confirm');

           if ($this->input->post('confirm') !="yes")
           { // Echec de la validation, on réaffiche la vue formulaire 
            
           }
           else
           { 
               // La validation a réussi, nos valeurs sont bonnes, on peut supprimer en base  
    
              /* Utilisation de la méthode where() toujours 
              * avant select(), insert() ou update()
              * dans cette configuration sur plusieurs lignes 
              */  
              if($this->functionModel->deleteContent($config['fileproduit'])){
              //on supprime la photo 
              $this->db->where('pic_an_id', $id);//défini la condition pro_id = id
              $this->db->delete('waz_picture');//on efface le produit de la base
            $this->db->where('an_id', $id);//défini la condition pro_id = id
            $this->db->delete('waz_annonces');//on efface le produit de la base
    
             redirect("annonces/liste");
              }
          }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire             
        
        }
       return $aView;
    } // -- modifier()

}