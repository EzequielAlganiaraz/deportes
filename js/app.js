'use strict'

const idJugador = document.getElementById('idJugador').value;
const URL ="api/comentarios";

let app = new Vue({
    el: "#comments",
    data: {
        coments: [],
        showForm: false,
    },
    methods: {
        deleteComment : function (event) {
            deleteComment(event.target.id);
        },
        showFormAdd : function(){
            app.showForm = true
        },
        addComment : function (e) {
            addTask(e);
        }
    }
});

const getComments = async (id) => {
    let url = URL + "/" + id;
    let r = ""
    try {
        let result = await fetch(url);
        if (result.ok){
            r = await result.json();
        }
        app.coments = r;
    } catch (error) {
        console.log(error);
    }
}

const deleteComment = async (id) =>{
    let url = URL + "/" + id;
    try{
        let result = await fetch(url, {method: 'DELETE'});
        if(result.ok){
            getComments(idJugador);
        }
    }catch (error) {
        console.log(error);
    }
}

const addTask = async (e) => {
    e.preventDefault();
    
    let data = {
        descripcion:  document.querySelector("input[name=comentario]").value,
        puntaje:  document.querySelector("select[name=puntaje]").value,
        idJugador: idJugador,
    }
    try {
        let response = await fetch(URL, {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},       
            body: JSON.stringify(data) 
         });
         
         if (response.ok) {
            getComments(idJugador);
            app.showForm = false;
         }
    } catch (error) {
        console.log(error);
    }
}


getComments(idJugador);

