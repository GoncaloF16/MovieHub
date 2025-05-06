document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("darkModeToggle");
    const icon = document.getElementById("darkModeIcon");
    const html = document.documentElement;
    const body = document.body;
    const table = document.getElementById("favoritesTable"); // Seleciona a tabela

    function setTheme(theme) {
        html.setAttribute("data-bs-theme", theme);
        localStorage.setItem("theme", theme);

        const movieCards = document.querySelectorAll('.movie-card');
        const navbar = document.getElementById("mainNavbar");
        const footer = document.getElementById("mainFooter");

        // Aplica a cor de fundo na tabela
        if (table) {
            if (theme === "dark") {
                table.classList.add("table-dark");
                table.classList.remove("table-light");
            } else {
                table.classList.add("table-light");
                table.classList.remove("table-dark");
            }
        }

        if (theme === "dark") {
            icon.textContent = "light_mode";
            body.classList.add("bg-dark", "text-light");
            body.classList.remove("bg-light", "text-dark");

            if (navbar) {
                navbar.classList.add("navbar-dark", "bg-dark");
                navbar.classList.remove("navbar-light", "bg-light");
            }

            movieCards.forEach(card => {
                card.classList.add("bg-dark-card", "text-light");
                card.classList.remove("bg-light", "text-dark", "bg-white", "shadow-sm", "bg-secondary");
            });

        } else {
            icon.textContent = "dark_mode";
            body.classList.add("bg-light", "text-dark");
            body.classList.remove("bg-dark", "text-light");

            if (navbar) {
                navbar.classList.add("navbar-light", "bg-light");
                navbar.classList.remove("navbar-dark", "bg-dark");
            }

            movieCards.forEach(card => {
                card.classList.add("bg-white", "text-dark", "shadow-sm");
                card.classList.remove("bg-dark-card", "text-light", "bg-secondary");
            });
        }

        if (footer) {
            if (theme === "dark") {
                footer.classList.add("bg-dark", "text-light");
                footer.classList.remove("bg-light", "text-dark");
            } else {
                footer.classList.add("bg-light", "text-dark");
                footer.classList.remove("bg-dark", "text-light");
            }
        }
    }

    const savedTheme = localStorage.getItem("theme") || "light";
    setTheme(savedTheme);

    if (toggleBtn) {
        toggleBtn.addEventListener("click", () => {
            const currentTheme = html.getAttribute("data-bs-theme");
            const newTheme = currentTheme === "dark" ? "light" : "dark";
            setTheme(newTheme);
        });
    }
});
