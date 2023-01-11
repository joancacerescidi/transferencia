let preloader = document.getElementById("preloader");
let btnPreloader = [...document.querySelectorAll(".btn-preload")];

if (preloader) {
    window.addEventListener("load", () => {
        preloader.classList.add("opacity-0", "pointer-events-none");
    });
}

if (btnPreloader.length > 0) {
    btnPreloader.map((btn) => {
        btn.addEventListener("click", () => {
            preloader.classList.remove("opacity-0", "pointer-events-none");
        });
    });
}

//   window.onbeforeunload = function (e) {
//       preloader.classList.add("opacity-0", "pointer-events-none");
//   };