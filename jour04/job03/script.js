window.addEventListener("DOMContentLoaded", (event) => {
    datalist = document.querySelector("datalist");
    let type = document.querySelector("#type");
    let btn = document.querySelector("#trier");

    let table = [];
    let table_list = [];

    let liste = fetch("pokemon.json")
        .then((response) => response.json())
        .then((response) => {
            Object.keys(response).forEach(function (key) {
                let type = response[key].type;
                table.push(type);

                for (let index = 0; index < table[key].length; index++) {
                    let result = table[key][index];
                    table_list.push(result);
                }
            }),
                (final_list = [...new Set(table_list)]);

            for (let i = 0; i < final_list.length; i++) {
                let final_value_list = final_list[i];

                let newOption = document.createElement("option");
                newOption.innerHTML = final_value_list;
                datalist.appendChild(newOption);
            }
            btn.addEventListener("click", function () {
                var type_select = type.value;

                response.forEach((pokemon) => {
                    if (pokemon.type.includes(type_select)) {
                        let tbl = document.querySelector("table");
                        let tr = document.createElement("tr");

                        tr.id = pokemon.name["french"];
                        tbl.append(tr);
                        let tdName = document.createElement("td");
                        tdName.innerHTML = pokemon.name["french"];
                        let tdId = document.createElement("td");
                        tdId.innerHTML = pokemon.id;
                        let tdType = document.createElement("td");

                        if (pokemon.type[1] == undefined) {
                            tdType.innerHTML = pokemon.type[0];
                        } else {
                            tdType.innerHTML = pokemon.type[0] + " " + " " + pokemon.type[1];
                        }

                        tr.append(tdName);
                        tr.append(tdId);
                        tr.append(tdType);
                    }
                });
            });
        })
        .catch((error) => alert("Erreur : " + error));
});