<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chargement_data_model extends CI_Model
{

	public function get_infos_user($login_user)
	{
		// Chargement langue
		$query = $this->db->query("select * from el_annonceur where identifiant ='$login_user'");
		$infos_user = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $infos_user;

	}

	public function get_list_type_annonceur()
	{
		// Chargement langue
		$query = $this->db->query("select * from el_type_annonceur");
		$listType_annonceur = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $listType_annonceur;

	}

	public function get_list_categorie()
	{
		// Chargement langue
		$query = $this->db->query("select * from el_categorie");
		$listCategorie = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $listCategorie;

	}

	public function get_list_sous_categorie()
	{
		// Chargement langue
		$query = $this->db->query("select el_sous_categorie.idcategorie, el_categorie.libelle as categorie, el_sous_categorie.id as idsous_categorie, el_sous_categorie.libelle as sous_categorie from el_sous_categorie join el_categorie where el_sous_categorie.idcategorie=el_categorie.id group by el_sous_categorie.id");
		$listCategorie = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $listCategorie;
	}

	public function get_list_pays()
	{
		// Chargement langue
		$query = $this->db->query("select * from el_pays");
		$listPays = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $listPays;

	}

	public function get_list_ville_par_pays($idpays)
	{
		// Chargement langue
		$query = $this->db->query("select * from el_ville where idpays = $idpays");
		$listVille = $query->result_array();
		// Chargement langue

		$query->free_result();

		return $listVille;

	}
	
}