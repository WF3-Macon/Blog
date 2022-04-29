/**
 * Suppression d'article via modal Bootstrap
 */

// Récupère le bouton de suppression d'un article
const btnDelete = document.querySelectorAll('.btnDelete');

// Boucle sur tous les boutons comportant la classe CSS "btnDelete"
btnDelete.forEach(btn => {
    
    // Écouteur d'évènement sur le bouton au click
    btn.addEventListener('click', (event) => {

        // Empêche le comportement par défaut du lien hypertexte
        event.preventDefault();

        // Récupère le bouton de suppression de la modale vie une classe CSS
        const modalDelete = document.querySelector('.btnDeleteModal');

        // Attribue la valeur du href du bouton au bouton de suppression de la modale
        modalDelete.href = btn.href;

        // Récupération de la modale
        const modal = new bootstrap.Modal(document.querySelector('#confirmDelete'));

        // Ouverture de la modale Bootstrap
        modal.show();
    });
})
