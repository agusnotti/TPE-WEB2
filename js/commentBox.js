document.addEventListener('DOMContentLoaded', function () {
    let commentBox = document.getElementsByClassName("comment-widgets"); //OBTENGO LA CAJA DE COMENTARIOS
    let commentsarray = []; // ARREGLO LOCAL DE COMENTARIOS

    function getComment(id) {  // OBTIENE LOS COMENTARIOS DE UN PRODUCTO

        fetch('api/producto/' + id, {})
            .then(response => {
                if (!response.ok) { // SI NO ME DEVUELVE 200
                    showError("No se pudieron obtener los comentarios"); //MUESTRO EL ERROR EN LA WEB
                } else { //CASO CONTRARIO RETORNO EL COMENTARIO EN FORMA DE JSON
                    return response.json();
                }
            })
            .then(json => {
                addToLocal(json); // AGREGA EL COMENTARIO AL ARREGLO LOCAL
            }).then(function () {
            render(commentsarray); // RENDERIZA EL ARREGLO DE COMENTARIOS(SIN RECARGAR LA PAGINA)
        })
            .catch(error => showError(error));

    }

    // comment es una variable en formato json que se genera al apretar el boton del html
    function postComment(comment) {  // AGREGA UN COMENTARIO AL PRODUCTO COMENTADO
        fetch('api/producto', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(comment)
        })
            .then(response => {
                if (!response.ok) { // SI NO RECIBI 200
                    showError("ERROR AL AGREGAR"); // MUESTRO EL ERROR
                } else { //CASO CONTRARIO RETORNO EL ID DEL COMENTARIO RECIEN AGREGADO(LAST INSERT ID)
                    return response.json();
                }
            }).then(json => {
            let data = [{
                "descripcion": comment.descripcion, //TEXTO DEL FORM
                "puntaje": comment.puntaje, // OPCION DEL SELECT
                "id": json, //ID OBTENIDO EN LA RESPUESTA
                "nombre_usuario": document.getElementById('js-hidden-username').value // NOMBRE DEL USUARIO
            }]
            addToLocal(data); // AGREGO AL ARREGLO LOCAL EL COMENTARIO

        }).then(function () {
            render(commentsarray);  // RENDERIZA EL ARREGLO LOCAL
        })
            .catch(error => showError(error));

    }

    function deleteComment(id) {  // BORRA UN COMENTARIO DE ALGUN PRODUCTO COMENTADO
        fetch('api/producto/comentario/' + id, {
            method: "DELETE",
        }).then(function (response) {
            if (!response.ok) {
                showError("ERROR AL BORRAR"); //SI NO LO PUDE BORRAR MUESTRO EL ERROR
            }
        }).then(function () {
            removeFromLocal(id); // LO REMUEVO DEL ARREGLO LOCAL
        }).then(function () {
            render(commentsarray); // RENDERIZO EL ARREGLO LOCAL
        })
            .catch(error => showError(error));

    }

    function loadProduct() {
        getComment(commentBox[0].id); // OBTIENE Y RENDERIZA LOS COMENTARIOS
        let form = document.getElementById("js-add-comment");
        if(form){ // SI EL FORM ES != DE NULL LE ASIGNA EL EVENTO DE AGREGAR
            form.addEventListener("click", function (event) {
                event.preventDefault();
                let comment = {
                    "descripcion": document.getElementById("js-comment-textarea").value,
                    "puntaje": document.getElementById("js-select").value,
                    "id_producto": commentBox[0].id,
                    "id_usuario": document.getElementById("js-hidden-userid").value
                }

                if(!comment.descripcion){
                    showError("El campo descripcion está vacio");
                }else{
                    postComment(comment);
                }
            })
        }

    }


    // ESTA FUNCION DESOCULTA UN DIV EN EL CUAL SE VA A MOSTRAR EL ERROR
    function showError(text){
        document.getElementById("js-message").classList.remove("oculto");
        document.getElementById("js-message").classList.add("alert");
        document.getElementById("js-message").classList.add("alert-danger");
        document.getElementById("js-message-text").classList.remove("oculto");
        document.getElementById("js-message-text").innerHTML=text;
        setTimeout(hide,2000); // EJECUTO UN SET TIME OUT PARA VOLVER A OCULTAR EL DIV
    }

    function hide(){  // ESTA FUNCION SE ENCARGA DE OCULTAR NUEVAMENTE EL DIV
        document.getElementById("js-message").classList.add("oculto");
        document.getElementById("js-message").classList.remove("alert");
        document.getElementById("js-message").classList.remove("alert-danger");
        document.getElementById("js-message-text").classList.add("oculto");
    }

    // ESTA FUNCION DEPENDIENDO EL PUNTAJE QUE TENGA EL COMENTARIO, LO TRANSFORMA EN ESTRELLAS
    function calculateStars(puntaje) {
        let stars = "";
        for (i = 1; i <= puntaje; i++) {
            stars += "⭐";
        }
        return stars;
    }

    //AGREGA LOS COMENTARIOS AL ARREGLO LOCAL
    function addToLocal(json) {
        for (let item of json) {  // POR CADA ITEM QUE TRAIGA EL json crea un Json y lo pushea al arreglo.
            let data = {
                "descripcion": item.descripcion,
                "puntaje": item.puntaje,
                "id": item.id,
                "nombre_usuario": item.nombre_usuario
            }

            commentsarray.push(data);
        }
    }

    function removeFromLocal(id) { // REMUEVE UN COMENTARIO DEL ARREGLO LOCAL SEGUN EL ID
        let i = 0;
        while (i < commentsarray.length) {
            if (commentsarray[i].id == id) {
                commentsarray.splice(i, 1); // BORRA EL COMENTARIO CON EL ID i
            } else {
                i++;
            }
        }
    }

    loadProduct(); // EJECUTO UNA VEZ ESTA FUNCION PARA QUE CUANDO CARGUE EL TPL POR PRIMERA VEZ
                    //  SE EJECUTE Y ME AGREGUE LOS COMENTARIOS A LA WEB Y EL EVENTO AL BOTON AGREGAR

    function render(comments) { // SE ENCARGA DE RENDERIZAR LOS COMENTARIOS DEL ARREGLO LOCAL
                                //UTILIZA CLASES DE BOOTSTRAP PARA LOS ESTILOS.

        commentBox[0].innerHTML = "";// VACIA LA CAJA DE COMENTARIOS PARA EVITAR REPETICIONES


        for (let comment of comments) {

            let div1 = document.createElement("div");
            div1.classList.add("d-flex");
            div1.classList.add("flex-row");
            div1.classList.add("comment-row");
            div1.classList.add("border");
            div1.classList.add("border-primary");

            let div2 = document.createElement("div");
            div2.classList.add("p-2");

            let div3 = document.createElement("div");
            div3.classList.add("comment-text");
            div3.classList.add("w-100");

            let h6 = document.createElement("h6");
            h6.classList.add("font-medium");
            h6.innerHTML = comment.nombre_usuario;

            let span = document.createElement("span");
            span.classList.add("m-b-15");
            span.classList.add("d-block");
            span.innerHTML = comment.descripcion;

            let div4 = document.createElement("div");
            div4.classList.add("comment-footer");

            let span2 = document.createElement("span");
            span2.classList.add("text-muted");
            span2.classList.add("float-right");
            let stars = calculateStars(comment.puntaje);
            span2.innerHTML = stars;


            let button3 = document.createElement("button");
            button3.classList.add("btn");
            button3.classList.add("btn-danger");
            button3.classList.add("btn-sm");
            button3.innerHTML = "Delete";
            button3.addEventListener("click", function () {
                deleteComment(comment.id);
            });

            commentBox[0].appendChild(div1);
            div1.appendChild(div2);
            div1.appendChild(div3);
            div3.appendChild(h6);
            div3.appendChild(span);
            div3.appendChild(div4);
            div4.appendChild(span2);
            if (document.getElementById("js-hidden-isadmin").value == 1) {
                div4.appendChild(button3);
            }
        }
    }


})

