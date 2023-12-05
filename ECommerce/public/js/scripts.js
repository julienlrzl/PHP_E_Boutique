function ouvrirFormulaire() {
    let formulaire = document.getElementById("formulaire-contact");
    formulaire.style.display = "block";
}

function redirectToFruitsSecs() {
    console.log("Bouton cliqué !");
    document.querySelector('.hidden-link0').click();
}

function redirectToBiscuits() {
    document.querySelector('.hidden-link1').click();
}

function redirectToBoissons() {
    document.querySelector('.hidden-link2').click();
}

document.addEventListener("DOMContentLoaded", function () {
    var counterElement = document.getElementById("panier-counter");
    var counter = localStorage.getItem('panierCounter') || 0;

    function incrementerPanier() {
        counter++;
        // Mettre à jour le compteur dans le stockage local
        localStorage.setItem('panierCounter', counter);
        counterElement.innerText = counter;
    }

    // Afficher la valeur initiale du compteur
    counterElement.innerText = counter;

    var addToCartButtons = document.querySelectorAll(".bouton-panier");
    addToCartButtons.forEach(function (button) {
        button.addEventListener("click", incrementerPanier);
    });
});
