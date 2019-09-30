<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashbord extends CI_Controller {

	public function __construct()
	{
		//  Obligatoire
        parent::__construct();
		
	}

	public function index()
	{
		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_index";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_admin',$data,false);
	}

	public function annonces()
	{
		$infos_user = $this->si_loguer();

		$rep_blog = $this->get_liste_annonce();     
        $data['list_post'] = $rep_blog['list_post'];
        $data['nbre_post_total'] = $rep_blog['nbre_post'];

        $nbre_post_par_page = 3;
        $nbre_page = 0;
        $nbre_post_derniere_page = 0;

        if ($data['nbre_post_total']>$nbre_post_par_page) {
            $nbre_page = intval($data['nbre_post_total']/$nbre_post_par_page);
            $reste_division = $data['nbre_post_total']%$nbre_post_par_page;
            if ($reste_division!=0) {
                $nbre_page++;
                $nbre_post_derniere_page = $reste_division;
            }
        } else {
        $nbre_page = 1; 
        }
       
        $data['nbre_post_par_page'] = $nbre_post_par_page;
        $data['nbre_page'] = $nbre_page;
        $data['nbre_post_derniere_page'] = $nbre_post_derniere_page;

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_annonces";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_admin',$data,false);
	}

	public function boutique()
	{
		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_boutique";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_admin',$data,false);
	}

	public function add_annonce()
	{
		$infos_user = $this->si_loguer();

		if ($this->input->post('ajouter_annonce')) {

			$data1 = array(
				'titre' => $this->input->post('titre'),
				'prix'=>$this->input->post('prix'),
				'date_publication'=>$this->input->post('date_publication'),
				'idsous_categorie'=>$this->input->post('idsous_categorie'),
				'idville'=>$this->input->post('idville'),
				'description'=>$this->input->post('description'),
				'annonceur'=>$this->session->userdata('login_user')
			);
			redirect('dashbord/add_annonce?req='.$this->ajouter_annonce($data1));

	    }

	    if ($this->input->get('req')) {
	    	$data['reponse'] = $this->input->get('req');
	    }

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_add_annonce";
		$data['js_page'] = "add_annonce";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
		$data['list_pays'] = $this->get_list_pays();
    	
    	$this->load->view('dashbord/view_main_admin',$data,false);
	}

	private function si_loguer()
	{
		$this->load->model('connexion_model');
	    if($this->session->userdata('login_user') || $this->session->userdata('logged'))
	    {
	      	if (!$this->connexion_model->user_exist($this->session->userdata('login_user'))) {
	      		$this->deconnexion();
	      	}
	      	$this->load->model('chargement_data_model');
	      	return $this->chargement_data_model->get_infos_user($this->session->userdata('login_user'));
	    } else {
	      	$this->deconnexion();
	    }
	}

	public function deconnexion()
	{
		$this->session->unset_userdata('login_user');
	    $this->session->unset_userdata('logged');
	    $this->session->sess_destroy();
	    redirect(site_url());
	}

	// Les pages du sites Début
	public function accueil()
	{
		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_accueil";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_site_accueil',$data,false);
	}

	public function all_annonces()
	{
		$infos_user = $this->si_loguer();

		$rep_blog = $this->get_liste_annonce();     
        $data['list_post'] = $rep_blog['list_post'];
        $data['nbre_post_total'] = $rep_blog['nbre_post'];

        $nbre_post_par_page = 3;
        $nbre_page = 0;
        $nbre_post_derniere_page = 0;

        if ($data['nbre_post_total']>$nbre_post_par_page) {
            $nbre_page = intval($data['nbre_post_total']/$nbre_post_par_page);
            $reste_division = $data['nbre_post_total']%$nbre_post_par_page;
            if ($reste_division!=0) {
                $nbre_page++;
                $nbre_post_derniere_page = $reste_division;
            }
        } else {
        $nbre_page = 1; 
        }
       
        $data['nbre_post_par_page'] = $nbre_post_par_page;
        $data['nbre_page'] = $nbre_page;
        $data['nbre_post_derniere_page'] = $nbre_post_derniere_page;

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_all_annonces";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_site',$data,false);
	}

	public function details_annonce()
	{
		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_details_annonce";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('layouts/view_main_site',$data,false);
	}

	public function boutiques()
	{
		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_boutiques";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_site',$data,false);
	}

	public function contactez_nous()
	{

		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_contactez_nous";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_site',$data,false);
	}

	public function page_non_trouve()
	{

		$infos_user = $this->si_loguer();

		foreach ($infos_user as $user) :
	        $data['titulaire'] = $user['titulaire'];
	        $data['statut'] = $user['statut'];
	    endforeach;

		$data['titre_page'] = 'EasyLinked';
		$data['page'] = "dashbord/view_page_non_trouvee";
		$data['js_page'] = "";

		$data['list_categorie'] = $this->get_list_categorie();
		$data['list_sous_categorie'] = $this->get_list_sous_categorie();
    	
    	$this->load->view('dashbord/view_main_site',$data,false);
	}
	// Les pages du sites Fin

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

	private function get_list_pays()
	{
		$this->load->model('chargement_data_model');
		return $this->chargement_data_model->get_list_pays();  
	}

	// Début Gestion des annonces
	private function ajouter_annonce($data){
		$this->load->model('annonce_model');
		return $this->annonce_model->ajouter_annonce($data);
	}

	private function get_liste_annonce(){
		$this->load->model('annonce_model');
		return $this->annonce_model->get_liste_annonce($this->session->userdata('login_user'));
	}
	// Fin Gestion des annonces

}

