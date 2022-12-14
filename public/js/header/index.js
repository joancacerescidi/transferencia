// Menu movil, modales del header
(function() {
    // const btn_abrir_menu = document.getElementById("btn-abrir-menu");
    // const btn_cerrar_menu = document.getElementById("btn-cerrar-menu");
    // const menu = document.getElementById("menu");

    const btnFeedback = document.getElementById("btn-feedback");
    const btnCerrarFeedback = document.getElementById("cerrar-modal-feedback");
    const feedBackModal = document.getElementById("modal-feedback");

    // const btnDenuncia = document.getElementById("btn-denuncia");
    // const btnCerrarDenuncia = document.getElementById("cerrar-modal-denuncia");
    // const denunciaModal = document.getElementById("modal-denuncia");

    // btn_abrir_menu.addEventListener("click", () =>
    //     menu.classList.remove("oculto")
    // );
    // btn_cerrar_menu.addEventListener("click", () =>
    //     menu.classList.add("oculto")
    // );

    btnFeedback.addEventListener("click", () => feedBackModal.showModal());
    btnCerrarFeedback.addEventListener("click", () => feedBackModal.close());

    // btnDenuncia.addEventListener("click", () => denunciaModal.showModal());
    // btnCerrarDenuncia.addEventListener("click", () => denunciaModal.close());
})();