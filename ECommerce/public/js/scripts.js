function ouvrirFormulaire(){
    let formulaire = document.getElementById("formulaire-contact");
    formulaire.style.display = "block";
}

function redirectToFruitsSecs(){
    console.log("Bouton cliqué !");
    document.querySelector('.hidden-link0').click();
}

function redirectToBiscuits(){
    document.querySelector('.hidden-link1').click();
}

function redirectToBoissons(){
    document.querySelector('.hidden-link2').click();
}