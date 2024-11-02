// DROPDOWNS HEADER INFO CONTAINER--------------------------------------------------------------------------
// Obtener los iconos de notificaciones y perfil
const notificationIcon = document.getElementById('notification-icon');
const profileIcon = document.getElementById('profile-icon');

// Obtener los menús
const notificationMenu = document.getElementById('notification-menu');
const profileMenu = document.getElementById('profile-menu');

// Función para mostrar/ocultar el menú de notificaciones
notificationIcon.addEventListener('click', function() {
    notificationMenu.classList.toggle('show');
    profileMenu.classList.remove('show'); // Cierra el menú de perfil si está abierto
});

// Función para mostrar/ocultar el menú de perfil
profileIcon.addEventListener('click', function() {
    profileMenu.classList.toggle('show');
    notificationMenu.classList.remove('show'); // Cierra el menú de notificaciones si está abierto
});

// Cerrar los menús cuando se hace clic fuera de ellos
window.addEventListener('click', function(e) {
    if (!notificationIcon.contains(e.target) && !profileIcon.contains(e.target)) {
        notificationMenu.classList.remove('show');
        profileMenu.classList.remove('show');
    }
});
//FINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNFINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN



// Toggle de subopciones
document.querySelectorAll('.dashboard__option').forEach(option => {
    option.addEventListener('click', function() {
        const suboptions = this.nextElementSibling;
        const arrow = this.querySelector('.arrow');

        // Alternar entre mostrar/ocultar las subopciones
        if (suboptions.style.display === 'block') {
            suboptions.style.display = 'none';
            arrow.textContent = '→'; // Cambia la flecha a derecha
        } else {
            suboptions.style.display = 'block';
            arrow.textContent = '↓'; // Cambia la flecha a abajo
        }
    });
});

// Cargar contenido en el contenedor de dashboard__content
document.querySelectorAll('.dashboard__suboption').forEach(suboption => {
    suboption.addEventListener('click', function() {
        const file = this.getAttribute('data-file');
        
        // Usar fetch para cargar el contenido HTML externo
        fetch(file)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cargar el archivo: ' + response.statusText);
                }
                return response.text();
            })
            .then(data => {
                // Insertar el contenido cargado en el contenedor dashboard__content
                document.querySelector('.dashboard__content').innerHTML = data;
            })
            .catch(error => {
                document.querySelector('.dashboard__content').innerHTML = `<p>Error al cargar el contenido.</p>`;
                console.error('Error:', error);
            });
    });
});







document.addEventListener("DOMContentLoaded", function () {
    // Seleccionamos todas las opciones del dashboard
    const suboptions = document.querySelectorAll('.dashboard__suboption');
    
    // Agregamos un evento 'click' a cada subopción
    suboptions.forEach(function (suboption) {
        suboption.addEventListener('click', function () {
            // Obtenemos el archivo que se debe cargar
            const file = suboption.getAttribute('data-file');
            
            // Seleccionamos el contenedor donde cargaremos el contenido
            const contentContainer = document.querySelector('.dashboard__content');
            
            // Cargamos el archivo usando fetch
            fetch(file)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al cargar el archivo');
                    }
                    return response.text();  // Convertimos a texto para insertar HTML
                })
                .then(data => {
                    // Insertamos el contenido en el contenedor
                    contentContainer.innerHTML = data;
                })
                .catch(error => {
                    contentContainer.innerHTML = '<p>Ocurrió un error al cargar el contenido.</p>';
                    console.error('Error:', error);
                });
        });
    });
});








