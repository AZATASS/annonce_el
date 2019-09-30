<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Charge_data extends CI_Controller {

	public function __construct()
	{
		//  Obligatoire
        parent::__construct();
	}

	/*************************** Liste de Ville par pays*******************************/
	public function get_list_ville_par_pays()
	{
		$idpays = $this->input->post('idpays');
		$this->load->model('chargement_data_model');
		$list_ville = $this->chargement_data_model->get_list_ville_par_pays($idpays);

		$list_option_ville = "<option value='' selected>Choisissez une ville</option>";
		foreach ($list_ville as $ville) :
	        $list_option_ville .= '<option value="'.$ville["id"].'">'.$ville["libelle"].'</option>';
        endforeach;
		
    	echo $list_option_ville;
	}
	/*************************** Utilisateur *******************************/


}

