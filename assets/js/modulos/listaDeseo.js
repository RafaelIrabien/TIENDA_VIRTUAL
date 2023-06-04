//Utilizamos querySelector para seleccionar el elemento tbody de la tabla 
//con la clase tableListaDeseo
const tableLista = document.querySelector("#tableListaDeseo tbody");

//Verificamos si el documento se ha cargado correctamente con DOMContentLoaded
document.addEventListener("DOMContentLoaded", function() {
   //Llamamos la función
   getListaDeseo();
});



function getListaDeseo() {
    //Construimos la URL a la que se enviará la solicitud
    //La variable base_url se toma del archivo footer.php
    const url = base_url + 'principal/listaDeseo';

    //Creamos una nueva instancia del objeto XMLHttpRequest.
    //XMLHttpRequest Proporciona una forma fácil de obtener información 
    //de una URL sin tener que recargar la página completa.
    const http = new XMLHttpRequest;
    
    //Abrimos una conexión
    //Inicializa la solicitud especificando el método HTTP (POST), 
    //la URL y si la solicitud debe ser asíncrona (true).
    http.open('POST', url, true);

    //Enviamos los datos
    //Enviamos la solicitud con los datos listaDeseo 
    //convertidos a una cadena JSON usando JSON.stringify().
    http.send(JSON.stringify(listaDeseo));

    //Verificamos el estado
    //La función http.onreadystatechange es un controlador de eventos 
    //que se activa cada vez que cambia el estado de la solicitud.
    http.onreadystatechange = function() {
        //En este caso, verifica si el estado listo es 4 (solicitud finalizada 
        //y la respuesta está lista) y el estado es 200 (OK).
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.forEach(producto => {
                html += `
                    <tr>
                        <td>
                            <img class="img-thumbail rounded-circle" src="${producto.imagen}" alt="" width="100">
                        </td>
                        <td>${producto.nombre}</td>
                        <td>${producto.precio}</td>
                        <td>${producto.cantidad}</td>
                        <td>
                        <button class="btn btn-danger" type="button">
                            <i class="fas fa-trash"></i>
                        </button>

                        <button class="btn btn-info" type="button">
                            <i class="fas fa-cart-plus"></i>
                        </button>
                        </td>
                    </tr>`;
            });

            tableLista.innerHTML = html;
        }
    }
}