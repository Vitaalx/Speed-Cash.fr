window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".star-form");

    // On va chercher l'input
    const rate = document.querySelector("#rate");

    // On boucle sur les étoiles pour y ajouter des écouteurs d'évènements
    for(star of stars) {
        star.addEventListener("mouseover", function () {
            resetStars();
           this.style.color = "#15CF74";
           this.classList.add("las");
           this.classList.remove("lar");

           // l'élement précédant dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;
            while (previousStar) {

                // On passe l'étoile en vert
                previousStar.style.color = "#15CF74";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;

            }

        });

        // On écoute le clic
        star.addEventListener("click", function () {
            rate.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function () {
            resetStars(rate.value);
        });
    }

    function resetStars(nb = 0) {
        for (star of stars) {
            if(star.dataset.value > nb) {
                star.style.color = "black";
                star.classList.add("lar");
                star.classList.remove("las");
            } else {
                star.style.color = "#15CF74";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }

}