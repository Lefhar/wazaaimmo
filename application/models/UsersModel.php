<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class usersModel extends CI_Model
{
    public $_user;

    /**
     * \brief construct recupére les données de l'utilisateur par la session
     * \return $_user tableau qui retourne toute les informations de l'utilisateur
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function __construct()
    {
        if (!empty($_COOKIE['jt_wazaaimmo'])) {
            $cookie = explode(":", $_COOKIE['jt_wazaaimmo']);
            $this->session->set_userdata(array('login' => $cookie[0], 'jeton' => $cookie[1]));
        }
        $this->load->database();
        if (!empty($this->session->login) && !empty($this->session->jeton)) {
            $email = $this->session->login;
            $jeton = $this->session->jeton;
            $this->db->select("wi_nom, wi_prenom, wi_d_connect, wi_essai_connect, wi_d_test_connect, wi_mail");
            $this->db->from('wi_users');
            $this->db->where('wi_mail', $email);
            $this->db->where('wi_jeton_connect', $jeton);

            //$aProduit = $this->query();
            $result = $this->db->get();

            // Récupération des résultats
            $view = $result->result();
        }
        if (!empty($this->session->login)) {
            $this->_user = ['nom' => $view[0]->wi_nom, 'prenom' => $view[0]->wi_prenom, 'connect' => $view[0]->wi_d_connect, 'essai_connect' => $view[0]->wi_essai_connect, 'test_connect' => $view[0]->wi_d_test_connect, 'email' => $view[0]->wi_mail];
        } else {
            $this->_user = array();
        }

        // echo $this->_user;
    }

    /**
     * \brief getUser affiche les données du construct
     * \return _user tableau qui retourne toute les informations de l'utilisateur
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function getUser()
    {
        return $this->_user;
    }


    /**
     * \brief connexion charge la vu de connexion
     * \return connexion
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function connexion()
    {
        $this->load->helper('form', 'url', 'cookie');
        // Chargement de la librairie 'database'
        $this->load->database();
        $email = $this->input->post("email");
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "valid_email" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une adresse %s valide.</div>"));
        $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required|min_length[12]|max_length[30]|encode_php_tags', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "min_length" => "<div class=\"alert alert-danger\" role=\"alert\">%s ne contient pas au minimum 12 caractéres.</div>", "max_length" => "<div class=\"alert alert-danger\" role=\"alert\">%s ne contient pas au maximum 30 caractéres.</div>"));

        $users = $this->db->query("SELECT wi_mail, wi_password, wi_hash, wi_essai_connect, wi_d_test_connect, wi_mail_confirm FROM wi_users WHERE wi_mail = ?", $email);
        $aView["users"] = $users->row(); // première ligne du résultat


        $aViewHeader = ["title" => "Connexion"];

        // Appel des différents morceaux de vues
   
        if ($this->form_validation->run() == TRUE) {
            if (!empty($aView["users"]->wi_mail) && password_verify($this->functionModel->password($password, $aView["users"]->wi_hash), $aView["users"]->wi_password)&&$aView["users"]->wi_mail_confirm==1) {


                $jeton = password_hash($this->functionModel->salt(12), PASSWORD_DEFAULT);
                $data["wi_d_connect"] = date("Y-m-d H:i:s");
                $data["wi_jeton_connect"] = $jeton;
                $data["wi_essai_connect"] = 0;
                $this->db->where('wi_mail', $email);
                $this->db->update('wi_users', $data);
                $this->session->set_userdata(array('login' => $email, 'jeton' => $jeton));
                if (!empty($this->input->post('remember')) && $this->input->post('remember') == "on") {
                    $cookie = array(
                        'name' => 'jarditou',
                        'value' => '' . $email . ':' . $jeton . '',
                        'expire' => '16500',
                        'domain' => '' . $_SERVER['HTTP_HOST'] . '',
                        'path' => '/',
                        'prefix' => 'jt_',
                        'secure' => false
                    );
                    $this->input->set_cookie($cookie);
                }
                redirect("annonces/liste");

            }elseif ($aView["users"]->wi_mail_confirm==0){
                $aView['error'] = '<div class="alert alert-danger" role="alert">Vous devez valider votre adresse email <a href="' . site_url('users/resendemail') . '">renvoyer</a></div>';
            
            } else {
                $aView['error'] = '<div class="alert alert-danger" role="alert">Email ou mot de passe faux</div>';
               
            }
        } else {
         
        }
    return $aView;
    }


    /**
     * \brief inscription charge la vu de inscription et recupére en post les informations du formulaire
     * \return vu inscription
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function inscription()
    {

        $this->load->helper('form', 'url');
        $aView[]="";
        //recupération des données post
        $salt = $this->functionModel->salt(12);
        //$data = $this->input->post();
        $data['wi_password'] = password_hash($this->functionModel->password($this->input->post('password'), $salt), PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe
        $data['wi_d_create'] = date('Y-m-d H:i:s');
        $data['wi_mail_hash'] = md5($this->functionModel->password($salt, $salt));
        $data['wi_nom'] = $this->input->post('nom');
        $data['wi_prenom'] = $this->input->post('prenom');
        $data['wi_sexe'] = $this->input->post('sexe');
        $data['wi_adresse'] = $this->input->post('adresse');
        $data['wi_cp'] = $this->input->post('cp');
        $data['wi_city'] = $this->input->post('ville');
        $data['wi_tel'] = $this->input->post('tel');
        $data['wi_mail'] = $this->input->post('email');
        $data['wi_hash'] = $salt;
        // Chargement de la librairie 'database'
        $this->load->database();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "valid_email" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une adresse %s valide.</div>"));
        $this->form_validation->set_rules('password', 'Mot de passe', 'required|regex_match[`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{12,})$`]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">%s doit contenir au minimum 12 caractéres dont une majuscule un symbole.</div>"));
        $this->form_validation->set_rules('confirpassword', 'Confirmation mot de passe', 'required|regex_match[`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{12,})$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas un %s correct.</div>"));
        $this->form_validation->set_rules('prenom', 'Prenom', 'required|regex_match[`^[a-zA-Z]{2,}$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas un %s correct.</div>"));
        $this->form_validation->set_rules('nom', 'Nom', 'required|regex_match[`^[a-zA-Z]{2,}$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas un %s correct.</div>"));

        //si Adresse est posté on contrôle alors si cela est correct
        if (!empty($this->input->post('adresse'))) {
            $this->form_validation->set_rules('adresse', 'Adresse', 'regex_match[/[0-9]{1,}\s+[a-z]{2,}\s+[a-z]{2,}/]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une %s correct.</div>"));
        }

        //si ville est posté on contrôle alors si cela est correct
        if (!empty($this->input->post('ville'))) {
            $this->form_validation->set_rules('ville', 'Ville', 'regex_match[`^[a-zA-Z]{1,}$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une %s correct.</div>"));
        }

        //si Code postal est posté on contrôle alors si cela est correct
        if (!empty($this->input->post('cp'))) {
            $this->form_validation->set_rules('cp', 'Code postal', 'regex_match[`^[0-9]{4,5}$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas un %s correct.</div>"));
        }

        //si téléphone est posté on contrôle alors si cela est correct
        if (!empty($this->input->post('tel'))) {
            $this->form_validation->set_rules('tel', 'Téléphone', 'regex_match[`^[0-9]{10}$`]', array("regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas un %s correct.</div>"));
        }


        if (!empty($this->session->login) && !empty($this->session->jeton)) {
            redirect('annonces/liste');
            exit();
        }
        if ($this->form_validation->run() == TRUE) {

            $users = $this->db->query("SELECT wi_mail FROM wi_users WHERE wi_mail = ?", $this->input->post('email'));
            $aView["users"] = $users->row();
            if (!empty($this->input->post('password')) && !empty($this->input->post('confirpassword')) && $this->input->post('confirpassword') == $this->input->post('password') && empty($aView["users"]->wi_mail)) {


                $this->db->insert('wi_users', $data);


                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.laposte.net';
                $config['smtp_user'] = 'igor.popoviche@laposte.net';
                $config['smtp_pass'] = '4vefg7kK';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Jarditou');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Confirmation email');
                $this->email->message("<!DOCTYPE html>
                        <html lang='fr'>
                        <head>
                        <meta charset='utf-8'>
                        <title>Confirmer votre adresse email</title>   
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                        <link rel='stylesheet' href='" . base_url("assets/css/style.css") . "'>
                        </head>
                        <body>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-12'>
                                  <h1>Confirmez votre adresse email</h1>
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                 <p><a href='" . site_url('/users/validationemail/') . "" . ($data['wi_mail_hash']) . "' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" . ($data['wi_mail_hash']) . "
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                  <img src='" . base_url("assets/images/jarditowi_logo.jpg") . "' title='Logo' alt='Logo' class='img-fluid'>
                                </div>    
                            </div>   
                        </div> 
                          
                        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                        <script src='" . base_url("assets/css/script.js") . "'></script>
                        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
                        </body>
                        </html>");
                $this->email->send();
                redirect('users/inscriptionvalide');
            } else {
                if ($this->input->post('confirpassword') != $this->input->post('password')) {
                    $aView['error'] = '<div class="alert alert-danger" role="alert">les deux champs mot de passe ne correspondre pas</div>';
                } else
                    if (!empty($aView["users"]->wi_mail)) {
                        $aView['error'] = '<div class="alert alert-danger" role="alert">Vous êtes déjà inscrit <a href="' . site_url('users/connexion') . '">Connexion</a>?</div>';
                    } else {
                        $aView['error'] = '<div class="alert alert-danger" role="alert">Une erreur c\'est produite</div>';
                    }
 

            }

        } else {

      
        }
        return $aView;
    }


    /**
     * \brief validationemail charge la vu de validationemail c'est la page de vu pour la validation d'email
     * \param  $jeton   recupération dans l'url pour retrouver en base
     * \return vu error
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function validationemail($jeton)
    {

        if (!empty($jeton)) {
//            $this->db->select("wi_mail_hash,wi_id,wi_mail");
//            $this->db->from('users');
//            $this->db->where('wi_mail_hash',$jeton);
//            $result = $this->db->get();

            // récupération des résultats
//            $ausers = $result->result();

            $users = $this->db->query("SELECT wi_mail_hash,wi_id,wi_mail FROM wi_users WHERE wi_mail_hash = ?", $jeton);
            $aView["jeton"] = $users->row(); // première ligne du résultat


            if (!empty($aView["jeton"]->wi_mail)) {
                $id = $aView["jeton"]->wi_id;
                $data['wi_mail_confirm'] = "1";
                $data['wi_mail_hash'] = NULL;
                $this->db->where('wi_id', $id);
                $this->db->update('wi_users', $data);
                $data['error'] = '<div class="alert alert-success" role="alert">Merci votre email est validé vous pouvez vous  <a href="' . site_url('users/connexion') . '">connecter</a></div>';

                //redirect('users/connexion');
            } else {
                $data['error'] = '<div class="alert alert-danger" role="alert">Désolé une erreur c\'est produite</div>';

            }
        } else {

            $data['error'] = '<div class="alert alert-danger" role="alert">Désolé une erreur c\'est produite</div>';

        }

        return $data;
    }


    /**
     * \brief deconnexion charge la vu de deconnexion c'est la page de vu pour la deconnexion
     * \return redirige sur produits/liste
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function deconnexion()
    {

        $aViewHeader = $this->usersModel->getUser();
        $aViewHeader = ["title" => "Déconnexion", "user" => $aViewHeader];
  
        //removing session  

        if (
            !empty($this->input->post('confirm'))
            &&
            $this->input->post('confirm') == 'yes'
        ) {

            unset($_COOKIE["jt_wazaaimmo"]);
            setcookie("jt_wazaaimmo", '', time() - 4200, '/');
            $_SESSION['login'] = "";
            $_SESSION['jeton'] = "";
            session_destroy();
            redirect("annonces/liste");
        }
        return $aViewHeader;
    }


    /**
     * \brief inscriptionvalide charge la vu de inscriptionvalide c'est la page de vu après l'inscription
     * \return redirige sur produits/liste
     * \author Harold lefebvre
     * \date 01/02/2021
     */



    /**
     * \brief resetpassword charge la vu de resetpassword c'est la page de vu pour refaire le mot de passe
     * \param  $jeton   recupération dans l'url pour retrouver en base
     * \return redirection users/connexion
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function resetpassword($jeton)
    {
        $users = $this->db->query("SELECT wi_id, wi_reset_hash FROM wi_users WHERE wi_reset_hash = ?", $jeton);
        $aView["jeton"] = $users->row(); // première ligne du résultat

        if (empty($jeton) or empty($aView["jeton"]->wi_reset_hash)) {

            $data['errorjeton'] = '<div class="alert alert-danger" role="alert">Désolé une erreur c\'est produite jeton incorrect</div>';
            $this->load->view('header');
            $this->load->view('resetpassword', $data);
            $this->load->view('footer');

        } else {
            $salt = $this->functionModel->salt(12);
            //$data = $this->input->post();
            $data['wi_reset_hash'] = NULL;
            $data['wi_d_reset'] = date("Y-m-d H:i:s");
            $data['wi_password'] = password_hash($this->functionModel->password($this->input->post('password'), $salt), PASSWORD_DEFAULT);// on appel la fonction password comme sa on reprend la même méthode d'assemblage du sel et du mot de passe
            $data['wi_hash'] = $salt;
            $this->form_validation->set_rules('password', 'Mot de passe', 'required|regex_match[`^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{12,})$`]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "regex_match" => "<div class=\"alert alert-danger\" role=\"alert\">%s doit contenir au minimum 12 caractéres dont une majuscule un symbole.</div>"));
            $this->form_validation->set_rules('confirpassword', 'Confirmation mot de passe', 'required|matches[password]', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "matches" => "<div class=\"alert alert-danger\" role=\"alert\">%s ne correspond pas au mot de passe.</div>"));
            $this->load->helper('form', 'url');
            if ($this->form_validation->run() == FALSE) {
                $aViewHeader = ["title" => "réinitialisation mot de passe"];
                $this->load->view('header', $aViewHeader);
                $this->load->view('resetpassword');
                $this->load->view('footer');
            } else {
                $id = $aView["jeton"]->wi_id;
                //recupération des données post
                $this->db->where('wi_id', $id);
                $this->db->update('wi_users', $data);
  redirect('users/connexion');
            }

        }

    }

    /**
     * \brief lostpassword charge la vu de lostpassword c'est la page pour recevoir un lien pour refaire le mot de passe
     * \return vu lostpassword
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public function lostpassword()
    {

        $aViewHeader = ["title" => "Mot de passe oublié"];
        $salt = $this->functionModel->salt(12);
        $data['wi_reset_hash'] = md5($this->functionModel->password($salt, $salt));
        $data['wi_mail'] = $this->input->post('email');

        $users = $this->db->query("SELECT wi_id, wi_reset_hash, wi_mail FROM wi_users WHERE wi_mail = ?", $data['wi_mail']);
        $aView["jeton"] = $users->row(); // première ligne du résultat
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "valid_email" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une adresse %s valide.</div>"));

        if ($this->form_validation->run() == FALSE) {

  
        } else {
            if(!empty($aView["jeton"]->wi_mail)) {
                $id = $aView["jeton"]->wi_id;
                $this->db->where('wi_id', $id);
                $this->db->update('wi_users', $data);
                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.laposte.net';
                $config['smtp_user'] = 'igor.popoviche@laposte.net';
                $config['smtp_pass'] = '4vefg7kK';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Jarditou');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Réinitialisation mot de passe');
                $this->email->message("<!DOCTYPE html>
                        <html lang='fr'>
                        <head>
                        <meta charset='utf-8'>
                        <title>Réinitialisation mot de passe</title>   
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                        <link rel='stylesheet' href='" . base_url("assets/css/style.css") . "'>
                        </head>
                        <body>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-12'>
                                  <h1>Réinitialisation mot de passe</h1>
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                 <p><a href='" . site_url('/users/resetpassword/') . "" . ($data['wi_reset_hash']) . "' > Réinitialisez votre mot de passe</a></p>
                                 si vous ne pouvez pas lire cette email copiez ce lien et coller le dans la barre d'adresse  " . site_url('/users/resetpassword/') . "" . ($data['wi_reset_hash']) . "
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                  <img src='" . base_url("assets/images/jarditowi_logo.jpg") . "' title='Logo' alt='Logo' class='img-fluid'>
                                </div>    
                            </div>   
                        </div> 
                          
                        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                        <script src='" . base_url("assets/css/script.js") . "'></script>
                        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
                        </body>
                        </html>");
                $this->email->send();
                $data['error'] = '<div class="alert alert-success" role="alert">Merci un email vous a été envoyé vérifier votre boite de reception ou courrier indésirable</div>';
   
            }else{
                $data['error'] = '<div class="alert alert-danger" role="alert">Veuillez vérifier votre adresse email</div>';

            }


        }
        return $data;
    }

    /**
     * \brief resendemail charge la vu de resendemail c'est la page recevoir de nouveau le lien de validation de l'adresse email
     * \return vu resendemail
     * \author Harold lefebvre
     * \date 01/02/2021
     */
    public  function resendemail()
    {
        $aViewHeader = ["title" => "Renvoyer le lien de confirmation"];
        $salt = $this->functionModel->salt(12);

        $data['wi_mail'] = $this->input->post('email');

        $users = $this->db->query("SELECT wi_id, wi_mail_hash, wi_mail FROM wi_users WHERE wi_mail = ?", $data['wi_mail']);
        $aView["jeton"] = $users->row(); // première ligne du résultat
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "valid_email" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une adresse %s valide.</div>"));



        if ($this->form_validation->run() == FALSE) {

            $this->load->view('header', $aViewHeader);
            $this->load->view('lostpassword');
            $this->load->view('footer');
        }else{
            if(!empty($aView["jeton"]->wi_mail)&&!empty($aView["jeton"]->wi_mail_hash)) {

                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.laposte.net';
                $config['smtp_user'] = 'igor.popoviche@laposte.net';
                $config['smtp_pass'] = '4vefg7kK';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Jarditou');
                $this->email->to($aView["jeton"]->wi_mail);
                $this->email->subject('Confirmation email');
                $this->email->message("<!DOCTYPE html>
                        <html lang='fr'>
                        <head>
                        <meta charset='utf-8'>
                        <title>Confirmer votre adresse email</title>   
                        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
                        <link rel='stylesheet' href='" . base_url("assets/css/style.css") . "'>
                        </head>
                        <body>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-12'>
                                  <h1>Confirmez votre adresse email</h1>
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                 <p><a href='" . site_url('/users/validationemail/') . "" . $aView["jeton"]->wi_mail_hash . "' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" .$aView["jeton"]->wi_mail_hash . "
                              </div>    
                            </div>   
                            <div class='row'>
                                <div class='col-12'>
                                  <img src='" . base_url("assets/images/jarditowi_logo.jpg") . "' title='Logo' alt='Logo' class='img-fluid'>
                                </div>    
                            </div>   
                        </div> 
                          
                        <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
                        <script src='" . base_url("assets/css/script.js") . "'></script>
                        <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
                        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
                        </body>
                        </html>");
                $this->email->send();
                $data['error'] = '<div class="alert alert-success" role="alert">Merci un email vous a été envoyé vérifier votre boite de reception ou courrier indésirable</div>';
                $this->load->view('header', $aViewHeader);
                $this->load->view('resendmail',$data);
                $this->load->view('footer');
            }else{
                $data['error'] = '<div class="alert alert-danger" role="alert">Veuillez vérifier votre adresse email</div>';
                $this->load->view('header', $aViewHeader);
                $this->load->view('resendmail',$data);
                $this->load->view('footer');
            }

        }

    }
}