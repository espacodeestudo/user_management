import { gsap } from "./gsap/esm/all.js";

const btnMenu = document.querySelector(".btn-menu");
const btnClose = document.querySelector(".btn-close");
const nav = document.querySelector("#nav");

btnMenu.addEventListener("click", () => nav.classList.toggle("ativo"));
btnClose.addEventListener("click", () => nav.classList.remove("ativo"));

const tl = gsap.timeline();
tl.from("h2", { y: -20, opacity: 0, duration:0.5, delay: 0.5 });
tl.from("p", { y: -20, opacity: 0, duration: 0.5 });
tl.from(".animation-container", { y: -20, opacity: 0, duration: 0.5 });
