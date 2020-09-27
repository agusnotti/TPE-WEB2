document.addEventListener("DOMContentLoaded", function () {
  let btnProducto = document.querySelectorAll(".btn-tabla-ver");

  btnProducto.forEach((btn) => {
    btn.addEventListener("click", verProducto);
  });

  function verProducto(e) {
    let tr = this.parentNode.parentNode.parentNode;

    let tds = tr.childNodes;
    let prodNombre = tds[1].textContent;
    let prodDescripcion = tds[3].textContent;
    let prodTamano = tds[5].textContent;
    let prodPrecio = tds[7].textContent;   

    agregarDatosModal(prodNombre, prodDescripcion, prodTamano, prodPrecio);
    
  }

  function agregarDatosModal(nombre, descripcion, tamano, precio){
      document.getElementById('nombre-producto').innerHTML = nombre;
      document.getElementById('desc-producto').innerHTML = descripcion;
      document.getElementById('tamano-producto').innerHTML = tamano;
      document.getElementById('precio-producto').innerHTML = precio;
  }



});
