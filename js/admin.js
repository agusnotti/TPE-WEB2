document.addEventListener('DOMContentLoaded', function() {


    //### PRODUCTO
    let inputNombre = document.getElementById('nombre-tabla');
    let inputDescripcion = document.getElementById('descripcion-tabla');
    let inputTamano = document.getElementById('tamaño-tabla');
    let inputPrecio = document.getElementById('precio-tabla');
    let selectCategoria = document.getElementById('select-categoria');
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
        let prodCategoria = tds[9].textContent;

        form.setAttribute('action', 'update/'+tr.id);
        cargarInputs(prodNombre, prodDescripcion, prodTamano, prodPrecio, prodCategoria);
    }

    function cargarInputs(prodNombre, prodDescripcion, prodTamano, prodPrecio, prodCategoria) { 
        inputNombre.value = prodNombre;
        inputDescripcion.value = prodDescripcion;
        inputTamano.value = prodTamano;
        inputPrecio.value = prodPrecio;
        selectCategoria.value = prodCategoria;
    }

    //### CATEGORIA
    let inputNombreCategoria = document.getElementById('nombre-categoria');
    let tituloFormCategoria = document.getElementById('js-titulo-categoria');
    let btnFormCategoria = document.getElementById('btn-agregar-categoria');
    let formCategoria = document.querySelector('.formulario-agregar-categoria');

    let btnEditarCategoria = document.querySelectorAll(".btn-tabla-editar-categoria");
    btnEditarCategoria.forEach((btn) => {
        btn.addEventListener("click", getInfoTablaCategoria);
    });
    

    function getInfoTablaCategoria(e){
        console.log('hola');
        tituloFormCategoria.innerHTML = "Modificar categoria";
        btnFormCategoria.innerHTML = "Modificar categoria";
        
        let tr = this.parentNode.parentNode.parentNode;
        
        let tds = tr.childNodes;
        let categoriaNombre = tds[1].textContent;
        
        formCategoria.setAttribute('action', 'update-categoria/'+tr.id);
        cargarInputsCategoria(categoriaNombre);
    }

    function cargarInputsCategoria(categoriaNombre) { 
        inputNombreCategoria.value = categoriaNombre;
    }
    
})
