const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');
const loginBtn = document.getElementById('loginBtn');
const registerBtn = document.getElementById('registerBtn');

loginForm.style.display = 'block';
registerForm.style.display = 'none';

loginBtn.addEventListener('click', function () {
    loginForm.style.display = 'block';
    registerForm.style.display = 'none';
    loginBtn.classList.add('btn-primary');
    loginBtn.classList.remove('btn-secondary');
    registerBtn.classList.remove('btn-primary');
    registerBtn.classList.add('btn-secondary');
});

registerBtn.addEventListener('click', function () {
    loginForm.style.display = 'none';
    registerForm.style.display = 'block';
    registerBtn.classList.add('btn-primary');
    registerBtn.classList.remove('btn-secondary');
    loginBtn.classList.remove('btn-primary');
    loginBtn.classList.add('btn-secondary');
});


// ################################
// boton de wpp
// ################################

function openChat() {
    document.getElementById('chatWindow').style.display = 'block';
    document.getElementById('chatOverlay').style.display = 'block'; 
}

function closeChat() {
    document.getElementById('chatWindow').style.display = 'none';
    document.getElementById('chatOverlay').style.display = 'none'; 
}

function sendMessage() {
    const message = document.getElementById('customerMessage').value;

    if (message.trim() !== "") {
        const whatsappURL = `https://api.whatsapp.com/send?phone=593995169760&text=${encodeURIComponent(message)}`;

        window.open(whatsappURL, '_blank');

        closeChat();
    } else {
        alert("Por favor, escribe un mensaje.");
    }
}

window.onclick = function (event) {
    const chatWindow = document.getElementById('chatWindow');
    const chatOverlay = document.getElementById('chatOverlay');

    if (event.target === chatOverlay) {
        closeChat();
    }
};
// ################################
// script pagina "producto"
// ################################
let count = 1;

function increase() {
    count++;
    document.getElementById('counter').textContent = count;
}

function decrease() {
    if (count > 1) {
        count--;
        document.getElementById('counter').textContent = count;
    }
}

