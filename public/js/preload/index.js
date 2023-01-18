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

function preloadActive($type, $ruta, $periodo) {
    let inputValue = document.getElementById("palabraClave").value;
    if (inputValue.length > 3) {
        let preloader = document.getElementById("preloader");
        preloader.classList.remove("opacity-0", "pointer-events-none");
        if ($type === "entidad") {
            const finalUrl = $ruta + "/" + $periodo + "/monto/" + inputValue;

            window.location.href = finalUrl;
        } else if ($type === "funcionario") {
            const finalUrl = $ruta + "/" + $periodo + "/monto/" + inputValue;
            window.location.href = finalUrl;
        } else if ($type === "proveedor") {
            const finalUrl = $ruta + "/" + $periodo + "/monto/" + inputValue;
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
                $ruta + "/" + $periodo + "/monto/" + $palabraBusqueda;
            window.location.href = finalUrl;
        } else if ($type === "proveedor") {
            const finalUrl =
                $ruta + "/" + $periodo + "/monto/" + $palabraBusqueda;
            window.location.href = finalUrl;
        }
    }
}

//   window.onbeforeunload = function (e) {
//       preloader.classList.add("opacity-0", "pointer-events-none");
//   };