const date = new Date('12/27/2020')


joursTravaille(date)

function joursTravaille(date) {
    /**
     * On créer un tableau des jours fériés en france
     */
    const tableauJoursFeries = [
        new Date("01/01/2020"),
        new Date("04/13/2020"),
        new Date("05/01/2020"),
        new Date("05/08/2020"),
        new Date("05/21/2020"),
        new Date("06/01/2020"),
        new Date("07/14/2020"),
        new Date("08/15/2020"),
        new Date("10/01/2020"),
        new Date("10/11/2020"),
        new Date("12/25/2020"),
    ]

    /**
     * On formate la date entrée en paramètre au format Francais
     */
    const dateFormatee = new Intl.DateTimeFormat(
        'fr-FR', 
        {
            weekday: "long", 
            year: "numeric", 
            month: "long",
            day: "numeric"
        }
        ).format(date).split(" ") 
    
    /**
     * On filtre le tableau de jours fériés pour recueprer seulement celui qui correspond
     * à la date passée en paramètre
     */
    if (tableauJoursFeries.filter(jour => jour.getTime() === date.getTime()).length !== 0) {
        console.log(`${dateFormatee[0]} ${dateFormatee[1]} ${dateFormatee[2]} ${dateFormatee[3]} est un jour férié`)
    } else if (dateFormatee[0] == "samedi" || dateFormatee[0] == "dimanche") { //Si c'est un week-end
        console.log(`${dateFormatee[0]} ${dateFormatee[1]} ${dateFormatee[2]} ${dateFormatee[3]} est un week-end`)
    } else { //Si c'est un jour travaillé
        console.log(`${dateFormatee[0]} ${dateFormatee[1]} ${dateFormatee[2]} ${dateFormatee[3]} est un jour travaillé`)
    }
}