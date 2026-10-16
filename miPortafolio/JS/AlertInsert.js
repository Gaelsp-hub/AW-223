
const parametros= new URLSearchParams(window.location.search);
const status= parametros.get("status");

if(status ==="success"){
    alert("Mensaje guardado correctamente.");
}else if(status ==="error"){
    alert("Error al guardar el mensaje.");
}

if(status !== null){

    window.history.replaceState({}, document.title, window.location.pathname);
    
}
