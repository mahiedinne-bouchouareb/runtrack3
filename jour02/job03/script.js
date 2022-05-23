function addOne() {
    var button = document.getElementById("button")
    document.addEventListener('click', function (){
        
         var numero = document.getElementById("nombre").textContent
        console.log(numero)

        numero++

        document.getElementById('nombre').innerHTML = numero;

    })
}
addOne()