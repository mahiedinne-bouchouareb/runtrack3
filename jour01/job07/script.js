const date = new Date('March 13, 2022 23:15:30')


joursTravaille(date)

function joursTravaille(date) {

    const tableauJoursFeries = [
        new Date("01/01/2020"),
        new Date("13/04/2020"),
        new Date("01/05/2020"),
        new Date("08/05/2020"),
        new Date("21/05/2020"),
        new Date("01/06/2020"),
        new Date("14/07/2020"),
        new Date("15/08/2020"),
        new Date("01/10/2020"),
        new Date("11/10/2020"),
        new Date("25/12/2020"),
    ]

    const dateFormatee = new Intl.DateTimeFormat(
        'fr-FR', 
        {
            weekday: "long", 
            year: "numeric", 
            month: "long",
            day: "numeric"
        }
        ).format(date)
    
    console.log(dateFormatee.split(" "))
}