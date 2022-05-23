numbers = [1, 35, 8, 16, 7, 43, 2, 54, 65, 3]

order = 'desc'

tri(numbers, order)

function tri(numbers, order) {

    if (order == 'asc') {
        var nombre_max = Math.max(...numbers)

        for (i = 0; i <= nombre_max; i++) {

            if (clef = numbers.indexOf(i) != -1) {
                if (typeof (resultat) == 'undefined') {
                    clef = numbers.indexOf(i)
                    resultat = [numbers[clef]]
                }
                else {
                    clef = numbers.indexOf(i)
                    resultat.push(numbers[clef]);
                }
            }

        }
        alert(resultat)
        return resultat
    }

    if (order == 'desc') {
        var nombre_max = Math.max(...numbers)
        console.log(nombre_max);

        for (i = nombre_max; i >= 0; i--) {

            if (clef = numbers.indexOf(i) != -1) {
                if (typeof (resultat) == 'undefined') {
                    clef = numbers.indexOf(i)
                    resultat = [numbers[clef]]
                }
                else {
                    clef = numbers.indexOf(i)
                    resultat.push(numbers[clef]);
                }
            }

        }
        alert(resultat)
        return resultat
    }
}