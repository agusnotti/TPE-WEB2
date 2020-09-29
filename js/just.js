document.addEventListener("DOMContentLoaded", function () {

  //capturo los botones de la tabla para ver el detalle del producto
  let btnProducto = document.querySelectorAll(".btn-tabla-ver");

  //por cada uno de los botones le asigno el evento para ver verProducto
  btnProducto.forEach((btn) => {
    btn.addEventListener("click", verProducto);
  });

  
  function verProducto(e) {
    let tr = this.parentNode.parentNode.parentNode; //busco el tr donde esta el boton al que se le hace "click"

    let tds = tr.childNodes; //devuelve un arreglo con los nodos hijos del tr

    let prodNombre = tds[1].textContent;
    let prodDescripcion = tds[3].textContent;
    let prodTamano = tds[5].textContent;
    let prodPrecio = tds[7].textContent;   

    //llamo a la funcion para renderizar la informacion en el modal
    agregarDatosModal(prodNombre, prodDescripcion, prodTamano, prodPrecio);
    
  }

  function agregarDatosModal(nombre, descripcion, tamano, precio){
      document.getElementById('nombre-producto').innerHTML = nombre;
      document.getElementById('desc-producto').innerHTML = descripcion;
      document.getElementById('tamano-producto').innerHTML = tamano;
      document.getElementById('precio-producto').innerHTML = precio;
  }
});
