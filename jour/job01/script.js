window.addEventListener("DOMContentLoaded", (event) => {
    const sequelize = new Sequelize("utilisateur", "nom_utilisateur", "", {
        dialect: "mysql",
        host: "localhost"
    });
});
