/**
 * Suppression d'article via modal Bootstrap
 */

// Récupère le bouton de suppression d'un article
const btnDelete = document.querySelectorAll('.btnDelete');

// Boucle sur tous les boutons comportant la classe CSS "btnDelete"
btnDelete.forEach(btn => {
    // Ecouteur d'évènement sur le bouton au click
    btn.addEventListener('click', (event) => {
        event.preventDefault();
        
        // Récupère l'attribut href
        const href = btn.href;
        const modalDelete = document.querySelector('.btnDeleteModal');
        modalDelete.href = href;

        // Récupération de la modal
        const modal = new bootstrap.Modal(document.querySelector('#confirmDelete'));

        // Ouverture de la modal Bootstrap
        modal.show();
    });
})