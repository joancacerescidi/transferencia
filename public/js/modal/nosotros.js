const modalDate = JSON.parse(localStorage.getItem("modal"));
let modalNosotros = document.getElementById("modal-nosotros");

const date = new Date();
const day = date.getDay();

if (!modalDate) {
    modalNosotros.classList.remove("opacity-0", "pointer-events-none");
} else if (modalDate) {
    if (modalDate.status === true && modalDate.date === day) {
        modalNosotros.classList.add("opacity-0", "pointer-events-none");
    } else if (modalDate.status === true && modalDate.date !== day) {
        modalNosotros.classList.remove("opacity-0", "pointer-events-none");
    } else {
        modalNosotros.classList.remove("opacity-0", "pointer-events-none");
    }
}

function closemodalnosotros() {
    modalNosotros.classList.add("opacity-0", "pointer-events-none");
    const modalNosotrosObj = {
        status: true,
        date: day,
    };
    localStorage.setItem("modal", JSON.stringify(modalNosotrosObj));
}