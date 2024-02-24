// Google tag
const id = "G-MZQXVYJQ47";
const imported = document.createElement("script");
imported.src = `https://www.googletagmanager.com/gtag/js?id=${id}`;
document.head.appendChild(imported);

window.dataLayer = window.dataLayer || [];
function gtag() {
  dataLayer.push(arguments);
}
gtag("js", new Date());
gtag("config", id);
