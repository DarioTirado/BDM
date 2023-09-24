
document.getElementById('username').addEventListener('input', function () {
    var username = this.value;
    var usernameMessage = document.getElementById('username-message');
    
    if (username.length >= 3) {
        usernameMessage.innerHTML = '';
    } else {
        usernameMessage.innerHTML = 'El nombre de usuario debe tener al menos tres caracteres.';
    }
});


document.getElementById('password').addEventListener('input', function () {
    var password = this.value;
    var passwordMessage = document.getElementById('password-message');
    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[\S]{8,}$");
    
    if (strongRegex.test(password)) {
        passwordMessage.innerHTML = '';
    } else {
        passwordMessage.innerHTML = 'La contraseña debe contener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.';
    }
});

