let preloader = document.getElementById("preloader");
let btnPreloader = [...document.querySelectorAll(".btn-preload")];

function preload() {
    preloader.classList.add("opacity-0", "pointer-events-none");
}
window.addEventListener("popstate", function(event) {
    preloader.classList.add("opacity-0", "pointer-events-none");
});
if (preloader) {
    window.addEventListener("load", () => {
        preloader.classList.add("opacity-0", "pointer-events-none");
    });
}
window.addEventListener("load", () => {
    preloader.classList.add("opacity-0", "pointer-events-none");
});
if (btnPreloader.length > 0) {
    btnPreloader.map((btn) => {
        btn.addEventListener("click", () => {
            preloader.classList.remove("opacity-0", "pointer-events-none");
        });
    });
}

setTimeout(() => {
    preloader.classList.add("opacity-0", "pointer-events-none");
}, 10000);

function preloadActive($type, $ruta, $periodo) {
    if ($type === "entidad") {
        let inputValue1 = document.getElementById("palabraClaveEntidad").value;
        if (inputValue1.length > 3) {
            let preloader = document.getElementById("preloader");
            preloader.classList.remove("opacity-0", "pointer-events-none");
            const finalUrl = $ruta + "/" + $periodo + "/monto/" + inputValue1;
            window.location.href = finalUrl;
        }
    } else if ($type === "funcionario") {
        let inputValue2 = document.getElementById("palabraFuncionario").value;
        if (inputValue2.length > 3) {
            let preloader = document.getElementById("preloader");
            preloader.classList.remove("opacity-0", "pointer-events-none");
            const finalUrl =
                $ruta + "/" + $periodo + "/" + inputValue2 + "/monto";
            window.location.href = finalUrl;
        }
    } else if ($type === "proveedor") {
        let inputValue3 = document.getElementById("palabraProveedor").value;
        if (inputValue3.length > 3) {
            let preloader = document.getElementById("preloader");
            preloader.classList.remove("opacity-0", "pointer-events-none");
            const finalUrl =
                $ruta + "/" + $periodo + "/" + inputValue3 + "/monto";
            window.location.href = finalUrl;
        }
    }
}

function preloadActive2($type, $ruta, $periodo, $palabraBusqueda) {
    if ($palabraBusqueda.length > 3) {
        let preloader = document.getElementById("preloader");
        preloader.classList.remove("opacity-0", "pointer-events-none");

        if ($type === "entidad") {
            const finalUrl =
                $ruta + "/" + $periodo + "/monto/" + $palabraBusqueda;
            console.log(finalUrl);
            window.location.href = finalUrl;
        } else if ($type === "funcionario") {
            const finalUrl =
                $ruta + "/" + $periodo + "/" + $palabraBusqueda + "/monto";
            window.location.href = finalUrl;
        } else if ($type === "proveedor") {
            const finalUrl =
                $ruta + "/" + $periodo + "/" + $palabraBusqueda + "/monto";
            window.location.href = finalUrl;
        }
    }
}

//   window.onbeforeunload = function (e) {
//       preloader.classList.add("opacity-0", "pointer-events-none");
//   };