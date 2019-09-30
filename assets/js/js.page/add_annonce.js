
var lien_site = 'http://localhost/projet_encours/annonce/';


$('#modal_add_annonce_f').validate({
    onKeyup : true,
    onChange : true,
    onBlur : true,
    eachValidField : function() {

        $(this).closest('div').removeClass('error').addClass('success');
    },
    eachInvalidField : function() {

        $(this).closest('div').removeClass('success').addClass('error');
    },
    description : {
        titre : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        prix : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        date_publication : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        idsous_categorie : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        idpays : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        idville : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        },
        description : {
            required : '<div class="alert alert-danger">Veuillez remplir le champ SVP</div>',
            valid : '<div class="alert alert-success">Valide</div>'
        }
    }
});



$('#idpays').change(function () {
    get_list_ville();
});

function get_list_ville() {
    
    var idpays = $('#idpays').val();

    if (idpays=="") {
        $('#msg_ville').text("Aucune n'est disponible pour ce pays");
    } else {
        $.ajax({
            type: "POST",
            data: {idpays:idpays},
            url: lien_site+"charge_data/get_list_ville_par_pays",
            success: function(resultat){
                // $('#ville').removeClass("dos");
                $('#idville').html(resultat);
            },
            error: function(resultat){
            	$('#idville').html("<option value='0' selected>Choisissez une ville</option>");
            	$('#msg_ville').text("Aucune n'est disponible pour ce pays");
            }
            
        });

    }
}