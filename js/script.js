document.addEventListener("DOMContentLoaded", function(){


    const verifAdresse = document.getElementById('adresse');
    const verifSurface = document.getElementById('surface');
    const verifPrix = document.getElementById('prix');

    function verifChaine(type) {
        const chaine = document.getElementById(type).value;

        if (chaine  == ''){
            document.getElementById('span_' + type).innerHTML = "Non renseignée";
            document.getElementById('span_' + type).style = "color: red;";
        }else{
            if (type == 'surface' || type == 'prix'){
                if(isNaN(chaine)){
                    document.getElementById('span_' + type).innerHTML = "Merci d'indiquer un nombre !";
                    document.getElementById('span_' + type).style = "color: red;";
                }else{
                    document.getElementById('span_' + type).innerHTML = "Valide";
                    document.getElementById('span_' + type).style = "color: green;";
                }
                
            }else{
                document.getElementById('span_' + type).innerHTML = "Valide";
                document.getElementById('span_' + type).style = "color: green";
            }
            
        }

        
        
    }


// Initialisation de nos évènements déclenchant nos fonctions
    verifAdresse.addEventListener('keyup', function(){
		verifChaine('adresse');
	});

	verifSurface.addEventListener('keyup', function(){
		verifChaine('surface');
	});

    verifPrix.addEventListener('keyup', function(){
		verifChaine('prix');
	});





});
