<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


    /**
     * \brief charge usersModel chargement de la page connexion
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
	public function connexion()
	{
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');
    
        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau) 
        * remarque la syntaxe $this->nomModele->methode()       
        */
        $aView =  $this->usersModel->connexion();

       
          $this->load->view('header');
          $this->load->view('connexion',$aView);
         $this->load->view('footer');
	}

    /**
     * \brief charge usersModel chargement de la page inscription
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function inscription()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $aView =  $this->usersModel->inscription();

       
        $this->load->view('header');
        $this->load->view('inscription',$aView);
       $this->load->view('footer');
    }

    /**
     * \brief charge usersModel chargement de la page deconnexion
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
	public function deconnexion()
	{
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        $aView =  $this->usersModel->deconnexion();

       
        $this->load->view('header');
        $this->load->view('deconnexion',$aView);
       $this->load->view('footer');
	}


    /**
     * \brief charge usersModel chargement de la page inscriptionvalide
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
	public function inscriptionvalide()
	{
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
     

       
        $this->load->view('header');
        $this->load->view('inscriptionvalide');
       $this->load->view('footer');
	}


    /**
     * \brief charge usersModel chargement de la page validationemail
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function validationemail()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $aView =  $this->usersModel->validationemail($this->uri->segment(3));
        $this->load->view('header');
        $this->load->view('validationemail', $aView);
        $this->load->view('footer');
    }


    /**
     * \brief charge usersModel chargement de la page resetpassword
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function resetpassword()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $aView =  $this->usersModel->resetpassword($this->uri->segment(3));
        $this->load->view('header');
        $this->load->view('resetpassword', $aView);
        $this->load->view('footer');
    }


    /**
     * \brief charge usersModel chargement de la page lostpassword
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function lostpassword()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $aView =  $this->usersModel->lostpassword();

       
        $this->load->view('header');
        $this->load->view('lostpassword',$aView);
       $this->load->view('footer');
    }


    /**
     * \brief charge usersModel chargement de la page resendemail
     * \return usersModel
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function resendemail()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('usersModel');

        /* On appelle la méthode liste() du modèle,
        * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)
        * remarque la syntaxe $this->nomModele->methode()
        */
        $aView =  $this->usersModel->resendemail();

       
        $this->load->view('header');
        $this->load->view('resendemail',$aView);
       $this->load->view('footer');
    }
}
