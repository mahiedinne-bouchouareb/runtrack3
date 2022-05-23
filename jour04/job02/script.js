var str = '{"nom" : "La_Plateforme_", "address" : "8 rue d hozier", "city" : "Marseille", "nb_staff" : "11", "creation" : "2019"}'
function jSon(str, key) {
    var obj = JSON.parse(str)
    return obj[key]
}
console.log(jSon(str, 'address'))