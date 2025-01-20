// ################################
// boton de wpp
// ################################

// function openChat() {
//     document.getElementById('chatWindow').style.display = 'block';
//     document.getElementById('chatOverlay').style.display = 'block'; 
// }

// function closeChat() {
//     document.getElementById('chatWindow').style.display = 'none';
//     document.getElementById('chatOverlay').style.display = 'none'; 
// }

// function sendMessage() {
//     const message = document.getElementById('customerMessage').value;
    
//     if (message.trim() !== "") {
//         const whatsappURL = `https://api.whatsapp.com/send?phone=593995169760&text=${encodeURIComponent(message)}`;
        
//         window.open(whatsappURL, '_blank');
        
//         closeChat();
//     } else {
//         alert("Por favor, escribe un mensaje.");
//     }
// }

// window.onclick = function (event) {
//     const chatWindow = document.getElementById('chatWindow');
//     const chatOverlay = document.getElementById('chatOverlay');
    
//     if (event.target === chatOverlay) {
//         closeChat();
//     }
// };


// ############## cerrar offcanvas cuando se da click en un li ##################

 const offcanvasElement = document.getElementById('offcanvasNavbar');
 const links = offcanvasElement.querySelectorAll('a.nav-link');

 links.forEach(link => {
     link.addEventListener('click', function () {
         const offcanvasInstance = bootstrap.Offcanvas.getInstance(offcanvasElement);
         offcanvasInstance.hide(); // Cerrar el offcanvas
     });
 });
// ############## Formulario offcanvas ##################

document.getElementById('consultaForm').addEventListener('submit', function(event) {
    event.preventDefault(); 
    const name = document.getElementById('floatingName').value.trim();
    const surname = document.getElementById('floatingSurname').value.trim();
    const phone = document.getElementById('floatingPhone').value.trim();
    const email = document.getElementById('floatingEmail').value.trim();
    const comment = document.getElementById('floatingTextarea').value.trim();
    let errorMessage = '';

    // Validaciones
    if (name === '') {
        errorMessage += 'El nombre es obligatorio.<br>';
    }
    if (surname === '') {
        errorMessage += 'El apellido es obligatorio.<br>';
    }
    if (phone === '' || !/^\d+$/.test(phone)) {
        errorMessage += 'El teléfono es obligatorio y debe contener solo números.<br>';
    }
    if (email === '' || !validateEmail(email)) {
        errorMessage += 'El correo electrónico es obligatorio o tiene un formato inválido.<br>';
    }

    const alertContainer = document.getElementById('alertContainer');
    if (errorMessage) {
        alertContainer.innerHTML = `<div class="alert alert-danger" role="alert">${errorMessage}</div>`;
    } else {
        alertContainer.innerHTML = ''; 
        alertContainer.innerHTML = `<div class="alert alert-success" role="alert">Formulario enviado correctamente.</div>`;
        
        setTimeout(() => {
            alertContainer.innerHTML = ''; 
            document.getElementById('consultaForm').reset(); 
            const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasNavbarForm')); 
            offcanvas.hide();
        }, 2000);
    }
});

// Función para validar el formato de email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}