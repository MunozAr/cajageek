window.onscroll = function () { myFunction() };

function myFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("changeHeader").className = "headercolorc";
        //document.getElementById("LogoChange").className = "header-titlechange";
    } else {
        document.getElementById("changeHeader").className = "header-color";
        //document.getElementById("LogoChange").className = "header-title";
    }
}

/*Efecto del Nav Movil en forma de Sandwich*/
var contador = 0;
var spn12 = document.getElementById('lin1');
var spn22 = document.getElementById('lin2');
var spn32 = document.getElementById('lin3');
var spn42 = document.getElementById('lin4');
var spn62 = document.getElementById('lin6');
var bte2 = document.getElementById('btn2');
var subheader = document.getElementById('subheader');
function SandwichEffect() {
    contador++;
    if (contador == 1) {
        spn22.style.opacity = "0";
        spn22.style.backgrounColor = 'transparent';
        spn12.style.opacity = '0';
        spn12.style.bottom = '-10px';
        spn12.style.transform = 'rotate(45deg)';
        spn32.style.opacity = '0';
        spn32.style.top = '-10px';
        spn32.style.transform = 'rotate(-45deg)';
        spn42.style.opacity = '1';
        spn62.style.opacity = '1';
        bte2.style.zIndex = '99999';
        bte2.style.position = 'relative';
        subheader.style.marginRight = '0px';
    } else if (contador == 2) {
        spn12.style.opacity = '1';
        spn12.style.bottom = '0px';
        spn12.style.transform = 'rotate(0deg)';
        spn22.style.opacity = '1';
        spn22.style.backgrounColor = 'white';
        spn32.style.opacity = '1';
        spn32.style.top = '0px';
        spn32.style.transform = 'rotate(0deg)';
        spn42.style.opacity = '0';
        spn62.style.opacity = '0';
        bte2.style.zIndex = '9';
        bte2.style.position = 'relative';
        subheader.style.marginRight = '-6000px';
        contador = 0;

    }
}

function cerrarNav(){
  spn12.style.opacity = '1';
  spn12.style.bottom = '0px';
  spn12.style.transform = 'rotate(0deg)';
  spn22.style.opacity = '1';
  spn22.style.backgrounColor = 'white';
  spn32.style.opacity = '1';
  spn32.style.top = '0px';
  spn32.style.transform = 'rotate(0deg)';
  spn42.style.opacity = '0';
  spn62.style.opacity = '0';
  bte2.style.zIndex = '9';
  bte2.style.position = 'relative';
  subheader.style.Right = '-6000px';
  contador = 0;
}