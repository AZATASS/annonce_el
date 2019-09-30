<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion_model extends CI_Model
{

	public function user_exist($login_user)
	{
		$query = $this->db->query("select identifiant from el_annonceur where identifiant ='$login_user' and statut <>'en attente'");

		if ($query->num_rows() > 0) {
			return true;
		} else {
		 	return false;
		}
		
	}

	private function get_code_genere($acteur)
    {
        $this->load->model('generecode/genereCode_model');
        return $this->genereCode_model->get_code_genere($acteur);
    }

	public function verif_email($email)
	{

	    $query = $this->db->query("select identifiant from el_annonceur where email ='$email'");

		if ($query->num_rows() > 0) {
			return true;
		} else {
		 	return false;
		}
		
	}

	public function user_authentification($user_email,$password,$adresse_ip)
	{
		$query = $this->db->query("select el_annonceur.identifiant from el_compte join el_annonceur where el_annonceur.identifiant = el_compte.annonceur and el_annonceur.email ='$user_email' and el_annonceur.pwd ='$password' and el_compte.statut <>'en attente'");

		if ($query->num_rows() > 0 && $this->input->valid_ip($adresse_ip)) {
			
			$identifiant = "";
			foreach ($query->result_array() as $row) :
		        $identifiant = $row["identifiant"];
	        endforeach;

			if ($identifiant != "") {

				$datestring1 = "%Y-%m-%d";
		        $datestring2 = "%H:%i:%s";
		        $time = time();
		        $date_cx = mdate($datestring1, $time);
		        $heure = mdate($datestring2, $time);
		        $date_heure = $date_cx.' - '.$heure;
		        $adresse_mac = "";
		        $identifiant = htmlspecialchars($identifiant);

				$req = $this->db->simple_query('insert into el_historique_cx(date ,heure ,date_heure ,annonceur ,adresse_ip ,adresse_mac) values("'.$date_cx.'","'.$heure.'","'.$date_heure.'","'.$identifiant.'","'.$adresse_ip.'","'.$adresse_mac.'")');
				if ($req) {
					return true;
				}
			}
			$query->free_result();
			
		} else {
		 	return false;
		}
		
	}

	public function get_user_info($user_email,$password)
	{
		$query = $this->db->query("select identifiant from el_annonceur where email ='$user_email' and pwd ='$password'");
		$identifiant = "";
		foreach ($query->result_array() as $row) :
	        $identifiant = $row["identifiant"];
        endforeach;
        $query->free_result();
        return $identifiant;
	}

	public function insertion_annonceur($titulaire,$telephone,$email,$pwd,$type_annonceur)
	{
		$titulaire = htmlspecialchars($titulaire);
		$telephone = htmlspecialchars($telephone);
		$email = htmlspecialchars($email);
		$type_annonceur = htmlspecialchars($type_annonceur);

		$code_genere = $this->get_code_genere('EL');
        $identifiant = $code_genere['code_annonceur'];
        $num_compte = $code_genere['num_compte'];
        $statut = "en attente";

		$verif = false;

		$query = $this->db->simple_query('insert into el_annonceur(identifiant,titulaire,telephone,email,pwd,type_annonceur) values("'.$identifiant.'","'.$titulaire.'","'.$telephone.'","'.$email.'","'.$pwd.'","'.$type_annonceur.'")');
		if ($query) {

			$datestring1 = "%Y-%m-%d";
	        $time = time();
	        $date_creation = mdate($datestring1, $time);
	        $type_compte = "Standard";

			$query = $this->db->simple_query('insert into el_compte(num_compte,date_creation,type_compte,statut,annonceur) values("'.$num_compte.'","'.$date_creation.'","'.$type_compte.'","'.$statut.'","'.$identifiant.'")');

			if ($query) {
				$verif = true;
			} 
		}
		
		return $verif;
	}

}