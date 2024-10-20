document.getElementById("save-pdf-btn").addEventListener("click", function(e) {
    e.preventDefault(); // Empêche le comportement par défaut du bouton

    // Récupère les données du formulaire caché
    let formData = new FormData(document.getElementById("pdf-form"));

    // Envoie les données au serveur via AJAX
    fetch("/savepdf", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        // Affiche la page de remerciement après 1 seconde
        setTimeout(() => {
            document.body.innerHTML = `
                <div style="text-align: center; padding: 50px;">
                    <h1>Merci pour votre téléchargement</h1>
                    <p>Votre PDF a été généré avec succès.</p>
                    <p>Vous allez être redirigé vers la page principale dans 3 secondes.</p>
                </div>
            `;

            // Redirige vers la page d'accueil après 3 secondes
            setTimeout(() => {
                window.location.href = "/"; // Assurez-vous que ce chemin correspond à la racine de votre projet
            }, 3000);
        }, 1000);
    })
    .catch(error => {
        console.error("Erreur:", error);
    });
});