<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2021-03-30 13:53:07 --> Query error: La table 'wazaa_immo.users' n'existe pas - Invalid query: SELECT u_mail, u_password, u_hash, u_essai_connect, u_d_test_connect, u_mail_confirm FROM users WHERE u_mail = NULL
ERROR - 2021-03-30 13:58:54 --> Query error: La table 'wazaa_immo.users' n'existe pas - Invalid query: SELECT wi_mail, wi_password, wi_hash, wi_essai_connect, wi_d_test_connect, wi_mail_confirm FROM users WHERE wi_mail = NULL
ERROR - 2021-03-30 14:00:56 --> Query error: La table 'wazaa_immo.users' n'existe pas - Invalid query: SELECT wi_mail, wi_password, wi_hash, wi_essai_connect, wi_d_test_connect, wi_mail_confirm FROM users WHERE wi_mail = NULL
ERROR - 2021-03-30 14:32:05 --> Query error: Champ 'pi_an_id' inconnu dans field list - Invalid query: SELECT `an_id`, `an_offre`, `an_type`, `an_opt`, `an_pieces`, `cat_libelle`, `an_ref`, `an_titre`, `an_description`, `an_local`, `an_surf_hab`, `an_surf_tot`, `an_prix`, `an_diagnostic`, `an_d_ajout`, `an_d_modif`, `opt_id`, `opt_libelle`, `cat_id`, `pic_id`, `pi_an_id`
FROM `annonces`
JOIN `options` ON `opt_id` = `an_opt`
JOIN `categories` ON `cat_id` = `an_type`
JOIN `picture` ON `pic_an_id` = `an_id`
WHERE `an_id` = '1'
ERROR - 2021-03-30 14:32:28 --> Severity: error --> Exception: Call to undefined method AnnoncesModel::detail() C:\wamp64\racine\wazaaimmo\application\controllers\Annonces.php 34
ERROR - 2021-03-30 14:32:38 --> Severity: Notice --> Undefined variable: results C:\wamp64\racine\wazaaimmo\application\models\AnnoncesModel.php 70
ERROR - 2021-03-30 14:32:38 --> Severity: error --> Exception: Call to a member function result() on null C:\wamp64\racine\wazaaimmo\application\models\AnnoncesModel.php 70
ERROR - 2021-03-30 14:33:11 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\wamp64\racine\wazaaimmo\application\views\liste.php 46
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:02 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 18
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:03 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:34:27 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:36:44 --> Severity: error --> Exception: Call to undefined function photo() C:\wamp64\racine\wazaaimmo\application\models\AnnoncesModel.php 68
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_bloque' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_stock' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_bloque' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_photo' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:04 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_stock C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_bloque C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_photo C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_libelle C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_description C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_prix C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_ref C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$cat_nom C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_d_ajout C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Undefined property: stdClass::$pro_id C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_bloque' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 12
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_stock' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_bloque' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_photo' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'cat_nom' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:37:57 --> Severity: Notice --> Trying to get property 'pro_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Undefined property: stdClass::$pro_couleur C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'pro_couleur' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:44:26 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:44:42 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 15
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 16
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 17
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:45:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 11
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 13
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_offre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 14
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 20
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:45:43 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:46:36 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:17 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:18 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:48:26 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'an_titre' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 21
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'an_description' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 22
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'an_prix' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 23
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Undefined variable: offre C:\wamp64\racine\wazaaimmo\application\views\detail.php 24
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'an_ref' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 25
ERROR - 2021-03-30 14:51:19 --> Severity: Notice --> Trying to get property 'cat_libelle' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 26
ERROR - 2021-03-30 14:51:20 --> Severity: Notice --> Trying to get property 'an_d_ajout' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 27
ERROR - 2021-03-30 14:51:20 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 14:51:20 --> Severity: Notice --> Trying to get property 'an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 28
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Undefined variable: image C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Trying to get property 'pic_an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Undefined variable: image C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Trying to get property 'pic_an_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Undefined variable: image C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Trying to get property 'pic_id' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Undefined variable: image C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:05:57 --> Severity: Notice --> Trying to get property 'pic_ext' of non-object C:\wamp64\racine\wazaaimmo\application\views\detail.php 19
ERROR - 2021-03-30 15:46:55 --> Query error: La table 'wazaa_immo.users' n'existe pas - Invalid query: SELECT wi_mail FROM users WHERE wi_mail = 's.lefebvre907@laposte.net'
ERROR - 2021-03-30 15:59:13 --> Severity: error --> Exception: Call to undefined method usersModel::inscriptionvalide() C:\wamp64\racine\wazaaimmo\application\controllers\Users.php 104
ERROR - 2021-03-30 15:59:50 --> Severity: Notice --> Undefined variable: aView C:\wamp64\racine\wazaaimmo\application\models\UsersModel.php 255
