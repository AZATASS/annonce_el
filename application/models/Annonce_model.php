<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Annonce_model extends CI_Model
{

	public function ajouter_annonce($data)
	{
		$titre = $data['titre'];
		$prix = $data['prix'];
		$date_publication = $data['date_publication'];
		$idsous_categorie = $data['idsous_categorie'];
		$idville = $data['idville'];
		$description = $data['description'];
		$annonceur = $data['annonceur'];

		if (!is_int($idsous_categorie)) {
			$idsous_categorie = intval($idsous_categorie);
		}

		if (!is_int($idville)) {
			$idville = intval($idville);
		}

		$titre = htmlspecialchars($titre);
		$description = htmlspecialchars($description);

		$date_publication = date("Y-m-d",strtotime($date_publication));

        $datestring1 = "%y%m%d";
        $datestring2 = "%H%i";
        $time = time();

        $t = microtime(true);
        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
        $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
        $tiece =  $d->format("u");
        $reference = "AN-".mdate($datestring1, $time).'.'.mdate($datestring2, $time).'.'.$tiece;

		$verif = "false";
		$query = $this->db->simple_query('insert into el_annonce(reference,titre,prix,date_publication,description,idsous_categorie,idville,annonceur) values("'.$reference.'","'.$titre.'",'.$prix.',"'.$date_publication.'","'.$description.'",'.$idsous_categorie.','.$idville.',"'.$annonceur.'")');

		if ($query) {
			$verif = "true";
		} 

		return $verif;
	}


	public function get_liste_annonce($annonceur)
	{
		// Chargement du solde
		$query = $this->db->query("select el_annonce.reference, el_annonce.titre, el_annonce.prix, el_annonce.annonceur, el_annonce.date_publication, el_annonce.description, el_sous_categorie.libelle as sous_categorie, el_ville.libelle as ville from el_annonce join el_ville, el_sous_categorie where el_annonce.idsous_categorie=el_sous_categorie.id and el_annonce.idville=el_ville.id and annonceur='$annonceur' order by date_publication ASC");
		$infos['list_post'] = $query->result_array();
		$infos['nbre_post'] = $query->num_rows();
		// Chargement du solde

		$query->free_result();

		return $infos;

	}

}