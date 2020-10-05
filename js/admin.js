document.addEventListener('DOMContentLoaded', function() {

    let inputNombre = document.getElementById('nombre-tabla');
    let inputDescripcion = document.getElementById('descripcion-tabla');
    let inputTamano = document.getElementById('tamaño-tabla');
    let inputPrecio = document.getElementById('precio-tabla');
    let tituloForm = document.getElementById('js-titulo-formulario');
    let btnForm = document.getElementById('btn-agregar-tabla');
    let form = document.querySelector('.formulario-agregar-producto');

    let btnEditar = document.querySelectorAll(".btn-tabla-editar");
    btnEditar.forEach((btn) => {
        btn.addEventListener("click", getInfoTabla);
    });
    

    function getInfoTabla(e){
        tituloForm.innerHTML = "Modificar Producto";
        btnForm.innerHTML = "Modificar Producto";
        
        let tr = this.parentNode.parentNode.parentNode;
        
        let tds = tr.childNodes;
        let prodNombre = tds[1].textContent;
        let prodDescripcion = tds[3].textContent;
        let prodTamano = tds[5].textContent;
        let prodPrecio = tds[7].textContent.replace('$ ', ''); //elimina el $ y el espacio
        
        form.setAttribute('action', 'update/'+tr.id);
        cargarInputs(prodNombre, prodDescripcion, prodTamano, prodPrecio);
    }

    function cargarInputs(prodNombre, prodDescripcion, prodTamano, prodPrecio) { 
        inputNombre.value = prodNombre;
        inputDescripcion.value = prodDescripcion;
        inputTamano.value = prodTamano;
        inputPrecio.value = prodPrecio;
    }
})
