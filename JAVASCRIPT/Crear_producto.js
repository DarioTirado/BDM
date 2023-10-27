
    function openModal() {
        document.getElementById("modalOverlay").style.display = "block";
        document.getElementById("myModal").style.display = "block";
    }
    
    function closeModal() {
        document.getElementById("modalOverlay").style.display = "none";
        document.getElementById("myModal").style.display = "none";
    }

    document.addEventListener("DOMContentLoaded", function() {
    });   

    window.onload = function() {
    // Verificar si hay un mensaje de éxito en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const successMessage = urlParams.get('success_message');

    if (successMessage) {
        // Mostrar una alerta con el mensaje de éxito
        alert(successMessage);
    }
    }









