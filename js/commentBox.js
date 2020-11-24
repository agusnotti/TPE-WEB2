document.addEventListener('DOMContentLoaded', function () {

    function getComment(id) {
        fetch('api/producto/' + id, {})
            .then(response => {
                if (!response.ok) {
                    console.log("ERROR");
                } else {
                    return response.json();
                }
            })
            .then(json => render(json))
            .catch(error => console.log(error));

    }

    function postComment(comment){
        fetch('api/producto',{
            method:"POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body : JSON.stringify(comment)
        })
            .then(response => {
                if(response.ok){
                    console.log("ERROR AL AGREGAR");
                }
            })
            .catch(error => console.log(error));
    }

    function loadProduct() {
        let commentBox = document.getElementsByClassName("comment-widgets");
        getComment(commentBox[0].id);
        console.log(document.getElementById("js-hidden-username").value);

        document.getElementById("js-add-comment").addEventListener("click",function (){
            let comment={
                "descripcion": document.getElementById("js-comment-textarea").value,
                "puntaje": document.getElementById("js-select").value ,
                "id_producto": commentBox[0].id,
                "id_usuario": document.getElementById("js-hidden-username").value
            }
            postComment(comment);
        })

    }

    function calculateStars(puntaje) {
        let stars = "";
        for (i = 1; i <= puntaje; i++) {
            stars += "⭐";
        }
        return stars;
    }

    loadProduct();

    function render(comments) {

        let commentBox = document.getElementsByClassName("comment-widgets");

        for (let comment of comments) {

            let div1 = document.createElement("div");
            div1.classList.add("d-flex");
            div1.classList.add("flex-row");
            div1.classList.add("comment-row");

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


            let button1 = document.createElement("button");
            button1.classList.add("btn");
            button1.classList.add("btn-cyan");
            button1.classList.add("btn-sm");
            button1.innerHTML = "Edit";
            let button2 = document.createElement("button");
            button2.classList.add("btn");
            button2.classList.add("btn-success");
            button2.classList.add("btn-sm");
            button2.innerHTML = "Publish";
            let button3 = document.createElement("button");
            button3.classList.add("btn");
            button3.classList.add("btn-danger");
            button3.classList.add("btn-sm");
            button3.innerHTML = "Delete";

            commentBox[0].appendChild(div1);
            div1.appendChild(div2);
            div1.appendChild(div3);
            div3.appendChild(h6);
            div3.appendChild(span);
            div3.appendChild(div4);
            div4.appendChild(span2);
            div4.appendChild(button1);
            div4.appendChild(button2);
            div4.appendChild(button3);


        }


    }


})
