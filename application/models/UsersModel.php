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
            $this->db->from('waz_users');
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

        $users = $this->db->query("SELECT wi_mail, wi_password, wi_hash, wi_essai_connect, wi_d_test_connect, wi_mail_confirm FROM waz_users WHERE wi_mail = ?", $email);
        $aView["users"] = $users->row(); // première ligne du résultat


        $aViewHeader = ["title" => "Connexion"];

        // Appel des différents morceaux de vues
   //var_dump($aView["users"]);
        if ($this->form_validation->run() == TRUE) {
            if (!empty($aView["users"]->wi_mail) && password_verify($this->functionModel->password($password, $aView["users"]->wi_hash), $aView["users"]->wi_password)&&$aView["users"]->wi_mail_confirm==1) {


                $jeton = password_hash($this->functionModel->salt(12), PASSWORD_DEFAULT);
                $data["wi_d_connect"] = date("Y-m-d H:i:s");
                $data["wi_jeton_connect"] = $jeton;
                $data["wi_essai_connect"] = 0;
                $this->db->where('wi_mail', $email);
                $this->db->update('waz_users', $data);
                $this->session->set_userdata(array('login' => $email, 'jeton' => $jeton));
                if (!empty($this->input->post('remember')) && $this->input->post('remember') == "on") {
                    $cookie = array(
                        'name' => 'Wazaaimmo',
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

            }elseif (!empty($aView["users"]->wi_mail_confirm)&&$aView["users"]->wi_mail_confirm==0){
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

            $users = $this->db->query("SELECT wi_mail FROM waz_users WHERE wi_mail = ?", $this->input->post('email'));
            $aView["users"] = $users->row();
            if (!empty($this->input->post('password')) && !empty($this->input->post('confirpassword')) && $this->input->post('confirpassword') == $this->input->post('password') && empty($aView["users"]->wi_mail)) {


                $this->db->insert('waz_users', $data);


                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.laposte.net';
                $config['smtp_user'] = 'igor.popoviche@laposte.net';
                $config['smtp_pass'] = 'mot de passe';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Wazaa immo');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Confirmation email');
                $this->email->message("<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Confirmez votre adresse email</title>
                <style type='text/css'>
                    /* ----- Custom Font Import ----- */
                    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);
            
                    /* ----- Text Styles ----- */
                    table{
                        font-family: 'Lato', Arial, sans-serif;
                        -webkit-font-smoothing: antialiased;
                        -moz-font-smoothing: antialiased;
                    }
            
                    @media only screen and (max-width: 700px){
                        /* ----- Base styles ----- */
                        .full-width-container{
                            padding: 0 !important;
                        }
            
                        .container{
                            width: 100% !important;
                        }
            
                        /* ----- Header ----- */
                        .header td{
                            padding: 30px 15px 30px 15px !important;
                        }
            
                        /* ----- Projects list ----- */
                        .projects-list{
                            display: block !important;
                        }
            
                        .projects-list tr{
                            display: block !important;
                        }
            
                        .projects-list td{
                            display: block !important;
                        }
            
                        .projects-list tbody{
                            display: block !important;
                        }
            
                        .projects-list img{
                            margin: 0 auto 25px auto;
                        }
            
                        /* ----- Half block ----- */
                        .half-block{
                            display: block !important;
                        }
            
                        .half-block tr{
                            display: block !important;
                        }
            
                        .half-block td{
                            display: block !important;
                        }
            
                        .half-block__image{
                            width: 100% !important;
                            background-size: cover;
                        }
            
                        .half-block__content{
                            width: 100% !important;
                            box-sizing: border-box;
                            padding: 25px 15px 25px 15px !important;
                        }
            
                        /* ----- Hero subheader ----- */
                        .hero-subheader__title{
                            padding: 80px 15px 15px 15px !important;
                            font-size: 35px !important;
                        }
            
                        .hero-subheader__content{
                            padding: 0 15px 90px 15px !important;
                        }
            
                        /* ----- Title block ----- */
                        .title-block{
                            padding: 0 15px 0 15px;
                        }
            
                        /* ----- Paragraph block ----- */
                        .paragraph-block__content{
                            padding: 25px 15px 18px 15px !important;
                        }
            
                        /* ----- Info bullets ----- */
                        .info-bullets{
                            display: block !important;
                        }
            
                        .info-bullets tr{
                            display: block !important;
                        }
            
                        .info-bullets td{
                            display: block !important;
                        }
            
                        .info-bullets tbody{
                            display: block;
                        }
            
                        .info-bullets__icon{
                            text-align: center;
                            padding: 0 0 15px 0 !important;
                        }
            
                        .info-bullets__content{
                            text-align: center;
                        }
            
                        .info-bullets__block{
                            padding: 25px !important;
                        }
            
                        /* ----- CTA block ----- */
                        .cta-block__title{
                            padding: 35px 15px 0 15px !important;
                        }
            
                        .cta-block__content{
                            padding: 20px 15px 27px 15px !important;
                        }
            
                        .cta-block__button{
                            padding: 0 15px 0 15px !important;
                        }
                    }
                </style>
            
                <!--[if gte mso 9]><xml>
                    <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml><![endif]-->
            </head>
            
            <body style='padding: 0; margin: 0;' bgcolor='#eeeeee'>
               
            
                <!-- / Full width container -->
                <table class='full-width-container' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' bgcolor='#eeeeee' style='width: 100%; height: 100%; padding: 30px 0 30px 0;'>
                    <tbody><tr>
                        <td align='center' valign='top'>
                            <!-- / 700px container -->
                            <table class='container' border='0' cellpadding='0' cellspacing='0' width='700' bgcolor='#ffffff' style='width: 700px;'>
                                <tbody><tr>
                                    <td align='center' valign='top'>
                                        <!-- / Header -->
                                        <table class='container header' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td style='padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;' align='left'>
                                                    <a href='#' style='font-size: 30px; text-decoration: none; color: #000000;'>Réinitialisation mot de passe</a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                        <!-- /// Header -->
            
                                        <!-- / Hero subheader -->
                                        <table class='container hero-subheader' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td class='hero-subheader__title' style='font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;' align='left'>Vous avez demandez à reinitialiser votre mot de passe veuillez suivre le lien</td>
                                            </tr>
            
                                            <tr>
                                                <td class='hero-subheader__content' style='font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 66px 0;' align='left'>
                                                <p><a href='" . site_url('/users/validationemail/') . "" . ($data['wi_mail_hash']) . "' > Confirmez votre adresse email</a></p>
                                                si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" . ($data['wi_mail_hash']) . "
            
                                                </td>
                                            </tr>
                                        </tbody></table>
                                     
                                        
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
            </body></html>");
                
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

            $users = $this->db->query("SELECT wi_mail_hash,wi_id,wi_mail FROM waz_users WHERE wi_mail_hash = ?", $jeton);
            $aView["jeton"] = $users->row(); // première ligne du résultat


            if (!empty($aView["jeton"]->wi_mail)) {
                $id = $aView["jeton"]->wi_id;
                $data['wi_mail_confirm'] = "1";
                $data['wi_mail_hash'] = NULL;
                $this->db->where('wi_id', $id);
                $this->db->update('waz_users', $data);
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
        $users = $this->db->query("SELECT wi_id, wi_reset_hash FROM waz_users WHERE wi_reset_hash = ?", $jeton);
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
                $this->db->update('waz_users', $data);
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

        $users = $this->db->query("SELECT wi_id, wi_reset_hash, wi_mail FROM waz_users WHERE wi_mail = ?", $data['wi_mail']);
        $aView["jeton"] = $users->row(); // première ligne du résultat
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array("required" => "<div class=\"alert alert-danger\" role=\"alert\">%s est obligatoire.</div>", "valid_email" => "<div class=\"alert alert-danger\" role=\"alert\">ce n'est pas une adresse %s valide.</div>"));

        if ($this->form_validation->run() == FALSE) {

  
        } else {
            if(!empty($aView["jeton"]->wi_mail)) {
                $id = $aView["jeton"]->wi_id;
                $this->db->where('wi_id', $id);
                $this->db->update('waz_users', $data);
                $this->load->library('email');
                $config = array();
                $config['protocol'] = 'smtp';
                $config['smtp_host'] = 'smtp.laposte.net';
                $config['smtp_user'] = 'igor.popoviche@laposte.net';
                $config['smtp_pass'] = 'mot de passe';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Wazaa immo');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Réinitialisation mot de passe');
                $this->email->message("<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Réinitialisation mot de passe</title>
                <style type='text/css'>
                    /* ----- Custom Font Import ----- */
                    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);
            
                    /* ----- Text Styles ----- */
                    table{
                        font-family: 'Lato', Arial, sans-serif;
                        -webkit-font-smoothing: antialiased;
                        -moz-font-smoothing: antialiased;
                    }
            
                    @media only screen and (max-width: 700px){
                        /* ----- Base styles ----- */
                        .full-width-container{
                            padding: 0 !important;
                        }
            
                        .container{
                            width: 100% !important;
                        }
            
                        /* ----- Header ----- */
                        .header td{
                            padding: 30px 15px 30px 15px !important;
                        }
            
                        /* ----- Projects list ----- */
                        .projects-list{
                            display: block !important;
                        }
            
                        .projects-list tr{
                            display: block !important;
                        }
            
                        .projects-list td{
                            display: block !important;
                        }
            
                        .projects-list tbody{
                            display: block !important;
                        }
            
                        .projects-list img{
                            margin: 0 auto 25px auto;
                        }
            
                        /* ----- Half block ----- */
                        .half-block{
                            display: block !important;
                        }
            
                        .half-block tr{
                            display: block !important;
                        }
            
                        .half-block td{
                            display: block !important;
                        }
            
                        .half-block__image{
                            width: 100% !important;
                            background-size: cover;
                        }
            
                        .half-block__content{
                            width: 100% !important;
                            box-sizing: border-box;
                            padding: 25px 15px 25px 15px !important;
                        }
            
                        /* ----- Hero subheader ----- */
                        .hero-subheader__title{
                            padding: 80px 15px 15px 15px !important;
                            font-size: 35px !important;
                        }
            
                        .hero-subheader__content{
                            padding: 0 15px 90px 15px !important;
                        }
            
                        /* ----- Title block ----- */
                        .title-block{
                            padding: 0 15px 0 15px;
                        }
            
                        /* ----- Paragraph block ----- */
                        .paragraph-block__content{
                            padding: 25px 15px 18px 15px !important;
                        }
            
                        /* ----- Info bullets ----- */
                        .info-bullets{
                            display: block !important;
                        }
            
                        .info-bullets tr{
                            display: block !important;
                        }
            
                        .info-bullets td{
                            display: block !important;
                        }
            
                        .info-bullets tbody{
                            display: block;
                        }
            
                        .info-bullets__icon{
                            text-align: center;
                            padding: 0 0 15px 0 !important;
                        }
            
                        .info-bullets__content{
                            text-align: center;
                        }
            
                        .info-bullets__block{
                            padding: 25px !important;
                        }
            
                        /* ----- CTA block ----- */
                        .cta-block__title{
                            padding: 35px 15px 0 15px !important;
                        }
            
                        .cta-block__content{
                            padding: 20px 15px 27px 15px !important;
                        }
            
                        .cta-block__button{
                            padding: 0 15px 0 15px !important;
                        }
                    }
                </style>
            
                <!--[if gte mso 9]><xml>
                    <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml><![endif]-->
            </head>
            
            <body style='padding: 0; margin: 0;' bgcolor='#eeeeee'>
               
            
                <!-- / Full width container -->
                <table class='full-width-container' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' bgcolor='#eeeeee' style='width: 100%; height: 100%; padding: 30px 0 30px 0;'>
                    <tbody><tr>
                        <td align='center' valign='top'>
                            <!-- / 700px container -->
                            <table class='container' border='0' cellpadding='0' cellspacing='0' width='700' bgcolor='#ffffff' style='width: 700px;'>
                                <tbody><tr>
                                    <td align='center' valign='top'>
                                        <!-- / Header -->
                                        <table class='container header' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td style='padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;' align='left'>
                                                    <a href='#' style='font-size: 30px; text-decoration: none; color: #000000;'>Réinitialisation mot de passe</a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                        <!-- /// Header -->
            
                                        <!-- / Hero subheader -->
                                        <table class='container hero-subheader' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td class='hero-subheader__title' style='font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;' align='left'>Réinitialisation mot de passe</td>
                                            </tr>
            
                                            <tr>
                                                <td class='hero-subheader__content' style='font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 66px 0;' align='left'><a href='" . site_url('/users/validationemail/') . "" . $aView['jeton']->wi_mail_hash . "' > Confirmez votre adresse email</a>
            
                                                </td>
                                            </tr>
                                        </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>

                                    </td>
                                </tr>
                            </tbody></table>
            </body></html>");
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

        $users = $this->db->query("SELECT wi_id, wi_mail_hash, wi_mail FROM waz_users WHERE wi_mail = ?", $data['wi_mail']);
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
                $config['smtp_pass'] = 'mot de passe';
                $config['smtp_port'] = 587;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
                $this->email->from('igor.popoviche@laposte.net', 'Wazaa immo');
                $this->email->to($aView["jeton"]->wi_mail);
                $this->email->subject('Confirmation email');
                $this->email->message("<html xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Confirmer votre adresse email</title>
                <style type='text/css'>
                    /* ----- Custom Font Import ----- */
                    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic&subset=latin,latin-ext);
            
                    /* ----- Text Styles ----- */
                    table{
                        font-family: 'Lato', Arial, sans-serif;
                        -webkit-font-smoothing: antialiased;
                        -moz-font-smoothing: antialiased;
                    }
            
                    @media only screen and (max-width: 700px){
                        /* ----- Base styles ----- */
                        .full-width-container{
                            padding: 0 !important;
                        }
            
                        .container{
                            width: 100% !important;
                        }
            
                        /* ----- Header ----- */
                        .header td{
                            padding: 30px 15px 30px 15px !important;
                        }
            
                        /* ----- Projects list ----- */
                        .projects-list{
                            display: block !important;
                        }
            
                        .projects-list tr{
                            display: block !important;
                        }
            
                        .projects-list td{
                            display: block !important;
                        }
            
                        .projects-list tbody{
                            display: block !important;
                        }
            
                        .projects-list img{
                            margin: 0 auto 25px auto;
                        }
            
                        /* ----- Half block ----- */
                        .half-block{
                            display: block !important;
                        }
            
                        .half-block tr{
                            display: block !important;
                        }
            
                        .half-block td{
                            display: block !important;
                        }
            
                        .half-block__image{
                            width: 100% !important;
                            background-size: cover;
                        }
            
                        .half-block__content{
                            width: 100% !important;
                            box-sizing: border-box;
                            padding: 25px 15px 25px 15px !important;
                        }
            
                        /* ----- Hero subheader ----- */
                        .hero-subheader__title{
                            padding: 80px 15px 15px 15px !important;
                            font-size: 35px !important;
                        }
            
                        .hero-subheader__content{
                            padding: 0 15px 90px 15px !important;
                        }
            
                        /* ----- Title block ----- */
                        .title-block{
                            padding: 0 15px 0 15px;
                        }
            
                        /* ----- Paragraph block ----- */
                        .paragraph-block__content{
                            padding: 25px 15px 18px 15px !important;
                        }
            
                        /* ----- Info bullets ----- */
                        .info-bullets{
                            display: block !important;
                        }
            
                        .info-bullets tr{
                            display: block !important;
                        }
            
                        .info-bullets td{
                            display: block !important;
                        }
            
                        .info-bullets tbody{
                            display: block;
                        }
            
                        .info-bullets__icon{
                            text-align: center;
                            padding: 0 0 15px 0 !important;
                        }
            
                        .info-bullets__content{
                            text-align: center;
                        }
            
                        .info-bullets__block{
                            padding: 25px !important;
                        }
            
                        /* ----- CTA block ----- */
                        .cta-block__title{
                            padding: 35px 15px 0 15px !important;
                        }
            
                        .cta-block__content{
                            padding: 20px 15px 27px 15px !important;
                        }
            
                        .cta-block__button{
                            padding: 0 15px 0 15px !important;
                        }
                    }
                </style>
            
                <!--[if gte mso 9]><xml>
                    <o:OfficeDocumentSettings>
                        <o:AllowPNG/>
                        <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml><![endif]-->
            </head>
            
            <body style='padding: 0; margin: 0;' bgcolor='#eeeeee'>
               
            
                <!-- / Full width container -->
                <table class='full-width-container' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%' bgcolor='#eeeeee' style='width: 100%; height: 100%; padding: 30px 0 30px 0;'>
                    <tbody><tr>
                        <td align='center' valign='top'>
                            <!-- / 700px container -->
                            <table class='container' border='0' cellpadding='0' cellspacing='0' width='700' bgcolor='#ffffff' style='width: 700px;'>
                                <tbody><tr>
                                    <td align='center' valign='top'>
                                        <!-- / Header -->
                                        <table class='container header' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td style='padding: 30px 0 30px 0; border-bottom: solid 1px #eeeeee;' align='left'>
                                                    <a href='#' style='font-size: 30px; text-decoration: none; color: #000000;'>Réinitialisation mot de passe</a>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                        <!-- /// Header -->
            
                                        <!-- / Hero subheader -->
                                        <table class='container hero-subheader' border='0' cellpadding='0' cellspacing='0' width='620' style='width: 620px;'>
                                            <tbody><tr>
                                                <td class='hero-subheader__title' style='font-size: 43px; font-weight: bold; padding: 80px 0 15px 0;' align='left'>Confirmer votre email</td>
                                            </tr>
            
                                            <tr>
                                                <td class='hero-subheader__content' style='font-size: 16px; line-height: 27px; color: #969696; padding: 0 60px 66px 0;' align='left'>
                                                <p><a href='" . site_url('/users/validationemail/') . "" . $aView["jeton"]->wi_mail_hash . "' > Confirmez votre adresse email</a></p>
                                 si vous ne pouvez pas lire cette email suivez copiez ce lien et coller le dans la barre d'adresse Lien " . site_url('/users/validationemail/') . "" .$aView["jeton"]->wi_mail_hash . "
                              
                                                </td>
                                            </tr>
                                        </tbody></table>
                                     
                                        
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                            </tbody></table>
            </body></html>");



                
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