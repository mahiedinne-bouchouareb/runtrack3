fizzBuzz()

function fizzBuzz() {
    for (let i = 1; i <= 151; i = i + 1) {
        let str = ""

        //Si i est un multiple de 3 ou de 5
        if(i % 3 === 0 && i % 5 === 0) {
            str += "FizzBuzz"
        } else if (i % 3 === 0) {
            str += "Fizz"
        } else if (i % 5 === 0) {
            str += "Buzz"
        } 

        //Si la chaine de caractère n'est pas vide
        if(str !== "") {
            console.log(i, str)
        }

    }
}