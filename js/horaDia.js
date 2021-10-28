const dia = new Date();
let hora = dia.getHours();

let tarda= document.getElementById("tarda");
let mati = document.getElementById("mati");


if (hora > 12) {
    mati.style.display = "none";
}
else if(hora < 12)
{
    tarda.style.display = "none";
}