//Creamos una variable constante donde vamos a almacenar todos los item
//que contenga esta clase
const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');

//Seleccionamos el elemento con el ID "btnCantidadDeseo" 
//y lo almacenamos en la variable btnDeseo.
const btnDeseo = document.querySelector('#btnCantidadDeseo');

//Definimos una variable
let listaDeseo;

//Verificamos si el documento ya se cargo
//El detector de eventos DOMContentLoaded se agrega al objeto de documento.
//Este evento se activa cuando el documento HTML inicial se ha cargado 
//y analizado por completo.
//La función proporcionada se ejecutará cuando ocurra este evento.
document.addEventListener('DOMContentLoaded', function() {
    //Si ya existen los datos se lo almacenamos
    //de lo contrario lo dejamos tal cual
    if (localStorage.getItem('listaDeseo') != null) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'));
    }
    cantidadDeseo();
    //A todo item le vamos a agregar el evento click
    //Se usa un bucle for para iterar sobre cada elemento en la matriz btnAddDeseo.
    for (let i = 0; i < btnAddDeseo.length; i++) {
        //Para cada elemento, se agrega un detector de eventos para el evento de click
        //Cuando se hace clic en uno de estos elementos, se ejecutará la función proporcionada.
        btnAddDeseo[i].addEventListener('click', function() {
            //Dentro de la función de escucha de eventos de clic,
            //a la variable idProducto se le asigna el valor del atributo 'prod' 
            //del botón en el que se hizo clic usando getAttribute().
            let idProducto = btnAddDeseo[i].getAttribute('prod');
        
            //Llamamos a la función agregarDeseo
            //Le pasamos el id del producto seleccionado
            agregarDeseo(idProducto);
        });
        
    }
});



//Función para agregar a lista de deseos
function  agregarDeseo(idProducto) {

    if (localStorage.getItem('listaDeseo') == null) {
        //Inicializamos la variable listaDeseo a un array vacío
        listaDeseo = [];
    } else {
        //Definimos una lista
        let listaExiste = JSON.parse(localStorage.getItem('listaDeseo'))
        for (let i = 0; i < listaExiste.length; i++) {
            
            if (listaExiste[i]['idProducto'] == idProducto) {
                Swal.fire(
                    'Aviso',
                    'El producto ya está en tu lista de deseos',
                    'warning'
                )
                return;
            }
            
        }
        listaDeseo.concat(localStorage.getItem('listaDeseo'));
    }
    //Agrega un nuevo objeto a la matriz listaDeseo
    listaDeseo.push({
        //Creamos 2 objetos
        "idProducto" : idProducto,
        "cantidad" : 1
    })

    //Almacena la matriz listaDeseo actualizada en el almacenamiento local 
    //del navegador como una cadena JSON utilizando el método localStorage.setItem.
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
    //Recuperamos el valor asociado con la clave 'listaDeseo' 
    //del almacenamiento local usando localStorage.getItem('listaDeseo').
    //El valor devuelto es una cadena JSON.
    //la función intenta analizar la cadena JSON usando JSON.parse().
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));

    //Si el análisis es exitoso y el valor analizado no es nulo, 
    //significa que hay una lista válida de elementos almacenados en el almacenamiento local.
    if (listas != null) {
        //Si la variable listas no es nula, la función establece el contenido
        //de texto de un elemento con el id btnDeseo a la longitud de la matriz listas. 
        btnDeseo.textContent = listas.length;
    } else {
        //El contenido va a continuar en 0
        btnDeseo.textContent = 0;
    }
   
}