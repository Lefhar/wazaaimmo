<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class functionModel extends CI_Model {


    /**
     * \brief charge le modél function afin de généré un sel
     * \param  $number     un nombre pour générer un sel
     * \return $salt
     * \author Harold lefebvre
     * \date 01/02/2021
     */
   public function salt($number)
    {
        if(!empty($number)&&$number>=10){
            $salt = bin2hex(random_bytes($number));
            return bin2hex($salt) ;
        }
    }

//fonction pour assembler le mot de passe et le sel avec des symboles en plus

    /**
     * \brief fonction pour assembler le mot de passe et le sel avec des symboles en plus
     * \param  $password     le mot de passe
     * \param  $salt     un nombre pour générer un sel
     * \return $resultat    génére un mélange de sel et mot de passe
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public   function password($password,$salt)
    {
        $resultat="";
        if(!empty($salt)&&!empty($password))
        {
            $resultat = "?@".$salt."_@".$password."_@".$salt;

        }
        return $resultat;
    }

    public function deleteContent($path){
        try{
          $iterator = new DirectoryIterator($path);
          foreach ( $iterator as $fileinfo ) {
            if($fileinfo->isDot())continue;
            if($fileinfo->isDir()){
              if(deleteContent($fileinfo->getPathname()))
                @rmdir($fileinfo->getPathname());
            }
            if($fileinfo->isFile()){
              @unlink($fileinfo->getPathname());
            }
          }
        } catch ( Exception $e ){
           // write log
           return false;
        }
        return true;
      }

}