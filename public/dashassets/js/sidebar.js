// Récupérer tous les éléments de la barre latérale
const sidebarItems = document.querySelectorAll('.nav-link');

// Vérifier s'il y a un élément actif enregistré dans le localStorage
const activeItem = localStorage.getItem('activeItem');
if (activeItem) {
  // Supprimer la classe "active" de tous les éléments
  sidebarItems.forEach(item => {
    item.classList.remove('active');
  });

  // Ajouter la classe "active" à l'élément enregistré dans le localStorage
  const activeElement = document.getElementById(activeItem);
  if (activeElement) {
    activeElement.classList.add('active');
  }
}

// Ajouter un gestionnaire d'événement à chaque élément
sidebarItems.forEach(item => {
  item.addEventListener('click', () => {
    // Retirer la classe "active" de tous les éléments
    sidebarItems.forEach(item => {
      item.classList.remove('active');
    });

    // Ajouter la classe "active" à l'élément cliqué
    item.classList.add('active');

    // Enregistrer l'élément actif dans le localStorage
    const itemId = item.getAttribute('id');
    localStorage.setItem('activeItem', itemId);
  });
});
