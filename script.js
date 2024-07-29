document.addEventListener("DOMContentLoaded", function() {
    // Atualizar dados em tempo real
    setInterval(function() {
        fetch("https://api.jm-motel.com/data")
            .then(response => response.json())
            .then(data => {
                // Atualizar variáveis
                entradas = data.entradas;
                saidas = data.saidas;
                consumo_frigobar = data.consumo_frigobar;
                consumo_bar = data.consumo_bar;
                consumo_eroticos = data.consumo_eroticos;
                periodos = data.periodos;

                // Atualizar dashboard
                document.querySelector("#entradas").innerHTML = entradas;
                document.querySelector("#saidas").innerHTML = saidas;
                document.querySelector("#consumo_frigobar").innerHTML = consumo_frigobar;
                document.querySelector("#consumo_bar").innerHTML = consumo_bar;
                document.querySelector("#consumo_eroticos").innerHTML = consumo_eroticos;
                // ...
            });
    }, 10000); // Atualizar a cada 10 segundos
});