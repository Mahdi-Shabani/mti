function openNav() {
    document.getElementById("sidebar").classList.add("open");
    document.getElementById("overlay").classList.add("show");
}

function closeNav() {
    document.getElementById("sidebar").classList.remove("open");
    document.getElementById("overlay").classList.remove("show");
}

// بسته شدن Sidebar با کلیک بر روی overlay
document.getElementById("overlay").onclick = function () {
    closeNav();
};
