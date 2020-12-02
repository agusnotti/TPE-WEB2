document.addEventListener('DOMContentLoaded', function () {
    let commentBox = document.getElementsByClassName("comment-widgets");
    let commentsarray = [];

    function getComment(id) {

        fetch('api/producto/' + id, {})
            .then(response => {
                if (!response.ok) {
                    showError("No se pudieron obtener los comentarios");
                } else {
                    return response.json();
                }
            })
            .then(json => {
                addToLocal(json);
            }).then(function () {
            render(commentsarray);
        })
            .catch(error => console.log(error));

    }

    function postComment(comment) {
        fetch('api/producto', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(comment)
        })
            .then(response => {
                if (!response.ok) {
                    showError("ERROR AL AGREGAR");
                } else {
                    return response.json();
                }
            }).then(json => {
            let data = [{
                "descripcion": comment.descripcion,
                "puntaje": comment.puntaje,
                "id": json,
                "nombre_usuario": document.getElementById('js-hidden-username').value
            }]
            addToLocal(data);

        }).then(function () {
            render(commentsarray);
        })
            .catch(error => console.log(error));

    }

    function deleteComment(id) {
        fetch('api/producto/comentario/' + id, {
            method: "DELETE",
        }).then(function (response) {
            if (!response.ok) {
                showError("ERROR AL BORRAR");
            }
        }).then(function () {
            removeFromLocal(id);
        }).then(function () {
            render(commentsarray);
        })
            .catch(error => console.log(error));

    }

    function loadProduct() {
        getComment(commentBox[0].id);
        let form = document.getElementById("js-add-comment");
        if(form){
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

    function showError(text){
        document.getElementById("js-message").classList.remove("oculto");
        document.getElementById("js-message").classList.add("alert");
        document.getElementById("js-message").classList.add("alert-danger");
        document.getElementById("js-message-text").classList.remove("oculto");
        document.getElementById("js-message-text").innerHTML=text;
        setTimeout(hide,2000);
    }

    function hide(){
        document.getElementById("js-message").classList.add("oculto");
        document.getElementById("js-message").classList.remove("alert");
        document.getElementById("js-message").classList.remove("alert-danger");
        document.getElementById("js-message-text").classList.add("oculto");
    }

    function calculateStars(puntaje) {
        let stars = "";
        for (i = 1; i <= puntaje; i++) {
            stars += "⭐";
        }
        return stars;
    }

    function addToLocal(json) {
        for (let item of json) {
            let data = {
                "descripcion": item.descripcion,
                "puntaje": item.puntaje,
                "id": item.id,
                "nombre_usuario": item.nombre_usuario
            }

            commentsarray.push(data);
        }
    }

    function removeFromLocal(id) {
        let i = 0;
        while (i < commentsarray.length) {
            if (commentsarray[i].id == id) {
                commentsarray.splice(i, 1);
            } else {
                i++;
            }
        }
    }

    loadProduct();

    function render(comments) {

        commentBox[0].innerHTML = "";


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

