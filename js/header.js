// Seleccionar la imagen y el contenedor del perfil
const profileImage = document.querySelector('.header__profile-image');
const profileContainer = document.querySelector('.header__profile');

// Agregar evento de clic para mostrar/ocultar el menú
profileImage.addEventListener('click', () => {
    profileContainer.classList.toggle('active');
});

// Cerrar el menú si se hace clic fuera del contenedor del perfil
window.addEventListener('click', (event) => {
    if (!profileContainer.contains(event.target)) {
        profileContainer.classList.remove('active');
    }
});
