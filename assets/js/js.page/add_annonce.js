
var lien_site = 'http://localhost/projet_encours/annonce/';


$('#pays').change(function () {
    get_list_ville();
});

function get_list_ville() {
    
    var idpays = $('#pays').val();

    if (idpays=="0") {
        $('#msg_ville').text("Aucune n'est disponible pour ce pays");
    } else {
        $.ajax({
            type: "POST",
            data: {idpays:idpays},
            url: lien_site+"charge_data/get_list_ville_par_pays",
            success: function(resultat){
                // $('#ville').removeClass("dos");
                $('#ville').html(resultat);
            },
            error: function(resultat){
            	$('#ville').html("<option value='0' selected>Choisissez une ville</option>");
            	$('#msg_ville').text("Aucune n'est disponible pour ce pays");
            }
            
        });

    }
}