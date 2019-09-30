<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenereCode_model extends CI_Model
{

    private function lettre_suivante($lettre='')
    {
		$tab_lettre = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','K','R','S','T','U','V','W','X','Y','Z'];
		
	    for ($i=0; $i < count($tab_lettre); $i++) { 
	       if ($tab_lettre[$i]==$lettre) {
	          return $tab_lettre[$i+1];
	       }
	    }
    }

    private function lettre_precedente($lettre='')
    {
		$tab_lettre = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','K','R','S','T','U','V','W','X','Y','Z'];
		
	    for ($i=0; $i < count($tab_lettre); $i++) { 
	       if ($tab_lettre[$i]==$lettre) {
	          return $tab_lettre[$i-1];
	       }
	    }
    }

	public function get_code_genere($acteur)
	{
		
		$query = $this->db->query("select * from el_genere_code where id = 1");
        $infos_code = $query->result_array();
        
        //EL-ZA009900
        $lettre1 = "";
        $lettre2 = "";
        $nombre1 = "";
        $nombre2 = "";
        $nombre3 = "";
        foreach ($infos_code as $code) :
            $lettre1 = $code["lettre1"];
	        $lettre2 = $code["lettre2"];
	        $nombre1 = $code["nombre1"];
	        $nombre2 = $code["nombre2"];
	        $nombre3 = $code["nombre3"];
        endforeach;

        $nombre3 = intval($nombre3);
        $nombre2 = intval($nombre2);
        $nombre1 = intval($nombre1);

        $data['code_annonceur'] = "true";

        if ($nombre3<99) {
        	$nombre3++;
        } else {
        	$nombre3=0;

        	if ($nombre2>0) {
	        	$nombre2--;
	        } else {
	        	$nombre2=99;

	        	if ($nombre1<99) {
	        		$nombre1++;

	        	} else {
	        		$nombre1=0;
    				
	        		if ($lettre2=="Z") {
	        			$lettre2="A";
    					
    					if ($lettre1=="A"){
				        	$data['code_annonceur'] = "false";
				        	
			        	} else {
			        		$lettre1=$this->lettre_precedente($lettre1);

			        	}
		        	} else {
		        		$lettre2=$this->lettre_suivante($lettre2);;

		        	}
			        	
        		}
        	}
        }

        if ($nombre3<10) {
        	$nombre3="0".$nombre3;
        }

        if ($nombre2<10) {
        	$nombre2="0".$nombre2;
        }

        if ($nombre1<10) {
        	$nombre1="0".$nombre1;
        }

        $data['code_annonceur'] = $acteur.'-'.$lettre1.$lettre2.$nombre1.$nombre2.$nombre3;

        $data['reponse'] = "false";
        $data['num_compte'] = "false";

		if ($data['code_annonceur']!="false") {
			
			$datestring = "%Y-%m-%d";
		    $time = time();
		    $date_jour = mdate($datestring, $time);

		    $query = 'update el_genere_code set lettre1 = "'.$lettre1.'", lettre2 = "'.$lettre2.'", nombre1 = "'.$nombre1.'", nombre2 = "'.$nombre2.'", nombre3 = "'.$nombre3.'", date_modif = "'.$date_jour.'" where id = 1';
            $req = $this->db->simple_query($query);

            if ($req) {
            	$data['reponse'] = "true";

            	$datestring1 = "%H%i";
            	$datestring2 = "%y%m";
		        $time = time();
		        $heure_min = mdate($datestring1, $time);
		        $anne_mois = mdate($datestring2, $time);

		        $data['num_compte'] = $nombre1.$nombre2.'-'.$heure_min.'-'.$anne_mois;
		        //code-hm-AM
            }

		} 
		
		return $data;
		
	}

}