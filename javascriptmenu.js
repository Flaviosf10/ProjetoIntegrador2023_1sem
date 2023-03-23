function mostramarcacao() {
    var dataAtual = new Date();
    var dataHoraAtual = dataAtual.toLocaleString();
    alert("PONTO MARCADO \n registrado as: " + dataHoraAtual);
}

function toggleMenu() {
    var menuContent = document.querySelector(".menu-content");
    menuContent.classList.toggle("show");
}

const menuButton = document.querySelector('.menu-button');

if (menuButton) {
    menuButton.addEventListener('click', function() {
        var menuContent = document.querySelector(".menu-content");
        menuContent.classList.toggle("show");
    });
}

const menuContent = document.querySelector('.menu-content');

menuButton.addEventListener('click', function() {
    menuContent.classList.toggle('show');
});







