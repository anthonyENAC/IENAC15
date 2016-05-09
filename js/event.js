/**
 * Created by mgaulmin on 18/04/16.
 */

$(document).ready(function () {
    $("form#auth").on("submit", function(event){
        event.preventDefault();
     
    $.ajax({
        url : '/IENAC15/aman_begaud_gaulmin_thirion/python/login.py/connect',
        type : 'POST',
        data : $(this).serialize(),
        dataType : 'html',
        success : function (resultat) {
            if (resultat==0)
                {$('#msg').html("erreur d'authentification");}
            else
            {location.href="/IENAC15/aman_begaud_gaulmin_thirion/python/prive.py/index";}
        },
        error : function (donnee, statut, erreur) {alert('erreur');},
        });
    }) ;
});