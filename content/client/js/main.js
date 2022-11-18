/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
    origin: "top",
    distance: "60px",
    duration: 2500,
    delay: 400
        // reset: true
});

sr.reveal(`.product__list`);
sr.reveal(`.contact_home`, { origin: "top" });
sr.reveal(`.about_home`, {});