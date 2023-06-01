//Creamos una variable constante donde vamos a almacenar todos los item
//que contenga esta clase
const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnDeseo = document.querySelector('#btnCantidadDeseo');

let listaDeseo = [];

//Verificamos si el documento ya se cargo
document.addEventListener('DOMContentLoaded', function() {
    cantidadDeseo();
    //A todo item le vamos a agregar el evento click
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener('click', function() {
            let idProducto = btnAddDeseo[i].getAttribute('prod');
        
            //Creamos una función para agregar a la lista de deseos
            //Le pasamos el id del producto seleccionado
            agregarDeseo(idProducto);
        });
        
    }
});

//Función para agregar a lista de deseos
function  agregarDeseo(idProducto) {
    listaDeseo.push({
        //Creamos 2 objetos
        "idProducto" : idProducto,
        "cantidad" : 1
    })

    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    //Mostramos un mensaje
    Swal.fire(
        'Aviso',
        'Producto agregado a la lista de deseos',
        'success'
    )
    //Llamamos a la función cantidadDeseo() cada vez que se agrega a la
    //lista de deseos
    cantidadDeseo();
}

//Función para recuperar la cantidad de productos deseados
function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));

    if (listas != null) {
        btnDeseo.textContent = listas.length;
    } else {
        //El contenido va a continuar en 0
        btnDeseo.textContent = 0;
    }
   
}