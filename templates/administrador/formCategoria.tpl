<section class="form-categorias" id="js-form-agregar">
    <h2 class="titulo-categoria" id="js-titulo-categoria">Agregar categoria</h2>
    <form action="insert-categoria" method="post" enctype="multipart/form-data" class="formulario-agregar-categoria">
        <input type="text" id="nombre-categoria" name="nombre_categoria" placeholder="Nombre categoria" required>
        <input type="file" name="img-categoria" id="imageToUpload">
        <button id="btn-agregar-categoria" class="btn-form-categorias">Agregar categoria</button>
    </form>
</section>