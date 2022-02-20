let image = document.querySelectorAll(".imagenChollo");
image.forEach(function(e) {
    e.style.backgroundImage = "url(" + e.dataset.imagen + ")";
})

/* image.style.backgroundImage = image.dataset.imagen; */
/* image.style.backgroundImage = "url(" + image.dataset.imagen + ")"; */