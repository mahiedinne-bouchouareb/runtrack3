$('#s_inscrire').click(function () {

    $.ajax({

        url: "inscription.php",
        type: "POST",
        dataType: "text",

        success: function (data) {
            $('main').empty();
            $('main').append(data)
        }
    })

})

$('#se_connecter').click(function () {

    $.ajax({

        url: "connexion.php",
        type: "POST",
        dataType: "text",

        success: function (data) {
            $('main').empty();
            $('main').append(data)
        }
    })

})






$("#button").click(function () {


    var nom = $('#nom').val()
    var prenom = $('#prenom').val()
    var email = $('#email').val()
    var mdp = $('#mdp').val()
    var confirm_mdp = $('#confirm_mdp').val()

    var repere_inscription = 1



    $.ajax({

        url: "controller.php",

        data: { nom, prenom, email, mdp, confirm_mdp, repere_inscription },

        type: "POST",
        dataType: "text",



        success: function (data) {

            console.log(data);

            $("#champs_erreur, #email_erreur, #erreur_mdp").empty();

            if (data == 'tous les champs doivent être remplis') {
                $("#champs_erreur").append(data);
                return;
            }
            if (data == 'email déjà utilisé' || data == 'format email no valide') {
                $("#email_erreur").append(data);
                return;
            }
            if (data == 'les mots de passe doivent être identiques' || data == 'le mot de passe doit contenir au moins 8 caractères, un chiffre, une majuscule et un caractère spécial') {
                $("#erreur_mdp").append(data);
                return;
            }




            // window.location.href = "connexion.php";

            $.ajax({

                url: "connexion.php",
                type: "POST",
                dataType: "text",
                success: function (data) {



                    $('main').empty();
                    $('main').append(data)
                }
            })



        }

    })

})


$('#button_connexion').click(function () {

    var email_connexion = $('#email_connexion').val()
    var mdp_connexion = $('#mdp_connexion').val()
    var repere_connexion = 1

    $.ajax({

        url: "controller.php",
        data: { email_connexion, mdp_connexion, repere_connexion },
        type: "POST",
        dataType: "text",

        success: function (data) {

            $("#email_erreur_connexion, #erreur_mdp_connexion").empty();

            if (data == 'veuillez remplir tous les champs') {
                $("#champs_erreur").append(data);
                return;
            }

            if (data == 'erreur d\'email ou de mot de passe') {
                $("#champs_erreur").append(data);
                return;
            }

            if (data == 'connexion validee') {
                $.ajax({

                    url: "index.php",
                    type: "POST",
                    dataType: "text",
                    success: function (data) {



                        $('main').empty();
                        $('main').append(data)
                    }
                })
            }












            $('main').empty();
            $('main').append(data)

        }

    })








})