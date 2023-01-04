// Menu movil, modales del header
(function() {
    const btn_abrir_menu = document.getElementById("btn-abrir-menu");
    const btn_cerrar_menu = document.getElementById("btn-cerrar-menu");
    const menu = document.getElementById("menu");

    btn_abrir_menu.addEventListener("click", () =>
        menu.classList.remove("oculto")
    );
    btn_cerrar_menu.addEventListener("click", () =>
        menu.classList.add("oculto")
    );
})();