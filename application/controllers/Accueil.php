<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

	public function __construct()
	{
		//  Obligatoire
        parent::__construct();
		
	}

	public function index()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_index";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main_index',$data,false);
	}

	public function all_annonces()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_all_annonces";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main',$data,false);
	}

	public function details_annonce()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_details_annonce";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main',$data,false);
	}

	public function boutiques()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_boutiques";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main',$data,false);
	}

	public function contactez_nous()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_contactez_nous";
		$data['js_page'] = "";
    	
    	$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();

    	$this->load->view('layouts/view_main',$data,false);
	}

	public function creer_cpt_annonceur()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();

		$this->load->model('chargement_data_model');
		$data['list_type_annonceur'] = $this->get_list_type_annonceur();

		$data['message_infos'] = "";

		if (!$this->input->get('req') && !$this->input->get('req0')) {
			// Définition des règles de control du formulaire
			$this->form_validation->set_rules('titulaire', '"Votre nom complet"', 'trim|required');
	    	$this->form_validation->set_rules('email', '"Votre E-mail"','trim|required|valid_email|callback_check_email');
	    	$this->form_validation->set_rules('pwd', '"Votre Mot de Passe"','trim|required|md5');
	    	$this->form_validation->set_rules('pwd_c', '"Confirmer le Mot de Passe"','trim|required|md5|matches[pwd]');
	    	$this->form_validation->set_rules('type_annonceur', '"Choisissez un type d\'annonceur"','trim|required|callback_check_type_annonceur');

			if($this->form_validation->run() == true ) {
		        //  Le formulaire est valide
		        $titulaire = $this->input->post('titulaire');
				$email11 = $this->input->post('email');
				$telephone = $this->input->post('telephone');
				$pwd = $this->input->post('pwd');
				$pwd_c = $this->input->post('pwd_c');
				$type_annonceur = $this->input->post('type_annonceur');
				$retour = $this->insertion_annonceur($titulaire,$telephone,$email11,$pwd,$type_annonceur);
		        
		        if ($retour) {//Enrégistrement réussi
					
					$nomcomplet = $titulaire;
			  //       $objet = "VALIDATION DE VOTRE INSCRIPTION";
					// $data['lien_valide'] = site_url()."connexion/login?req=".$email11."&req0=".$pwd;
				    
					// $email_config = Array(
				 //      'protocol' => 'smtp',
				 //      'smtp_host' => 'ssl://mail.domaine.com', 
				 //      'smtp_port' => '465', 
				 //      'smtp_user' => 'infos@domaine.com', 
				 //      'smtp_pass' => 'DiscountP@y', 
				 //      'mailtype' => 'html', 
				 //      'charset' => 'utf-8',
					//   'wordwrap' => TRUE, 
				 //      'newline' => "\r\n"
				 //    );

				 //    $this->email->initialize($email_config);

				 //    $this->email->from('infos@domaine.com', 'EasyLinked'); 
				 //    $this->email->to($email11); 
				 //    $this->email->subject($objet); 
				 //    $this->email->message($this->load->view('donnees_charges/view_email_inscript',$data,true));

				 //    if ($this->email->valid_email($email11) && $this->email->send()) {
				 //    	redirect('accueil/creer_cpt_annonceur?req='.$nomcomplet."&req0=".$email11."&req1=true");
				 //    } else {
				 //    	redirect('accueil/creer_cpt_annonceur?req='.$nomcomplet."&req0=".$email11."&req1=false");
				 //    }

				    redirect('accueil/creer_cpt_annonceur?req='.$nomcomplet."&req0=".$email11."&req1=true");
		        	

		        } else {//Enrégistrement échoué
		        	$data['message_infos'] = "<div style='margin-bottom:0; margin-top:20px;' class='alert alert-info alert-dismissable col-xs-10 col-sm-6 col-xs-offset-1 col-sm-offset-3'><strong>Inscription échoué !!!</strong>.</div>";
		        }	        
		        
		    } else if (isset($_POST['inscript'])) {
		    	$data['message_infos'] = "<div style='margin-bottom:0; margin-top:20px;' class='alert alert-info alert-dismissable col-xs-10 col-xs-offset-1'><strong>Veuillez renseigner correctement les champs</strong>.</div>";
		    }
		}

	    if ($this->input->get('req') && $this->input->get('req0') && $this->input->get('req1')) {
	    	$data['titulaire'] = $this->input->get('req');
	    	$data['adresse'] = $this->input->get('req0');
	    	$data['reponse'] = $this->input->get('req1');
	    	$data['page'] = "pages/view_message_creer_cpt";
	    } else {
	    	$data['page'] = "pages/view_creer_cpt_annonceur";
	    }
    	
    	$this->load->view('layouts/view_main',$data,false);
	}


	public function login_annonceur()
	{
		// Vérification de la connexion
		$this->verif_connexion();

		/************* Validation d'inscription ***************/
		// if ($this->input->get('req') && $this->input->get('req0')) {

		// 	$user_email = $this->input->get('req');
		// 	$password = $this->input->get('req0');

		// 	$retour_v = $this->valid_inscript_clt($user_email);// Change statut
		// 	$adresse_ip = $this->input->ip_address();

		// 	if ($this->verif_acces($user_email,$password,$adresse_ip) && $retour_v) {

		// 		$this->customer_create($user_email);// Créér le compte Fedapay

		// 		$this->load->model('connexion_model');
		// 	   	$login_user = $this->connexion_model->get_user_info($user_email,$password);
			   	
		// 	   	$this->verif_dossier($login_user);// Vérification du dossier pièce jointe

		// 		$data = array('login_user'=>$login_user, 'logged'=>true);
		//         $this->session->set_userdata($data);
	 //        } else {
	 //        	redirect('connexion');
	 //        }
	 //    }
	    /************* Validation d'inscription ***************/		
		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_login_annonceur";
		$data['message_infos'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();

		// Définition des règles de control du formulaire
		$this->form_validation->set_rules('email', '"Votre E-mail"', 'trim|required|valid_email');
    	$this->form_validation->set_rules('pwd', '"Votre Mot de passe"','trim|required|md5');

		if($this->form_validation->run() == true ) {
	        //  Le formulaire est valide
	        $user_email = $this->input->post('email');
			$password = $this->input->post('pwd');
			$adresse_ip = $this->input->ip_address();

	        if ($this->verif_acces($user_email,$password,$adresse_ip)) {

	        	$this->load->model('connexion_model');
			   	$login_user = $this->connexion_model->get_user_info($user_email,$password);

			   	$this->verif_dossier($login_user);// Vérification du dossier pièce jointe

				$data = array('login_user'=>$login_user, 'logged'=>true);
		        $this->session->set_userdata($data);
		        redirect('dashbord');

	        } else {
	        	$data['message_infos'] = "<div class='alert alert-info alert-dismissable col-md-12'><strong>Login ou mot de passe incorrect !!!</strong>.</div>";
	        }	        
	        
	    } else if (isset($_POST['email'])) {
	    	$data['message_infos'] = "<div class='alert alert-info alert-dismissable col-md-12'><strong>Veuillez renseigner correctement les champs</strong>.</div>";
	    } 

	    $this->load->view('layouts/view_main',$data,false);

	}

	public function page_non_trouve()
	{
		// Vérification de la connexion
		$this->verif_connexion();
		
		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "pages/view_page_non_trouvee";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main',$data,false);
	}

	// Chargement des données
	private function get_list_type_annonceur()
	{
		$this->load->model('chargement_data_model');
		return $this->chargement_data_model->get_list_type_annonceur();  
	}

	private function get_list_categorie()
	{
		$this->load->model('chargement_data_model');
		return $this->chargement_data_model->get_list_categorie();  
	}

	private function get_list_sous_categorie()
	{
		$this->load->model('chargement_data_model');
		return $this->chargement_data_model->get_list_sous_categorie();  
	}

	function check_email()
	{
	    if($this->input->post('email'))
	    {
	      	$this->load->model('connexion_model');
	      	if($this->connexion_model->verif_email($this->input->post('email')))
	      	{
	        	$this->form_validation->set_message('check_email','Cet email est utilisé');
	        	return false;
	      	}
	      	else
	      	{
	        	return true;
	      	}
	    }
	}

	function check_type_annonceur()
	{
      	if($this->input->post('type_annonceur')=="")
      	{
        	$this->form_validation->set_message('check_type_annonceur','Choisissez un type d\'annonceur');
        	return false;
      	}
      	else
      	{
        	return true;
      	}
	}

	private function insertion_annonceur($titulaire,$telephone,$email,$pwd,$type_annonceur)
	{
		$this->load->model('connexion_model');
	    $retour = $this->connexion_model->insertion_annonceur($titulaire,$telephone,$email,$pwd,$type_annonceur);

	    if ($retour==1) {
	    	return 1;//Compte existe déjà
	    } else if ($retour==2) {
	    	return 2;//Enrégistrement réussi
	    } else if ($retour==-1) {
	    	return -1;//Enrégistrement échoué
	    }  
	}

	private function verif_acces($email='', $pwd='',$adresse_ip='')
	{
		$this->load->model('connexion_model');
	    
	    if ($this->connexion_model->user_authentification($email,$pwd,$adresse_ip)) {
	    	return true;
	    } else {
	    	return false;
	    }

	}

	private function verif_dossier($user='')
	{
		$folder_name = './assets/docs/images/'.$user.'/';
    	if (!is_dir($folder_name)) {
	        // Création de répertoire
	        mkdir($folder_name, 0777, true);
        }
	}

	private function verif_connexion(){
		if($this->session->userdata('login_user') || $this->session->userdata('logged'))
	    {
	      redirect('dashbord');
	    }
	}


}

