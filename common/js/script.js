document.addEventListener("DOMContentLoaded", function(){


    const verifAdresse = document.getElementById('villeTerrain');
    const verifSurface = document.getElementById('surfaceTerrain');
    const verifPrix = document.getElementById('prixTerrain');

    function verifChaine(type) {
        const chaine = document.getElementById(type).value;

        if (chaine  == ''){
            document.getElementById('span_' + type).innerHTML = "Non renseignée";
            document.getElementById('span_' + type).style = "color: red;";
        }else{
            if (type == 'surfaceTerrain' || type == 'prixTerrain'){
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
		verifChaine('villeTerrain');
	});

	verifSurface.addEventListener('keyup', function(){
		verifChaine('surfaceTerrain');
	});

    verifPrix.addEventListener('keyup', function(){
		verifChaine('prixTerrain');
	});





});
