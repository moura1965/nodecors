function getData() {
  fetch("http://localhost:3000/data")
    .then(response => response.json())
    .then(data => {
      console.log(data)
      // Atualizar variáveis
      document.querySelector('.entradas').innerHTML =  `Entradas - ${data.entradas}`

    });
}

(function () {
  // chama a primeira vez os dados, pois se nao ira cahamar so depois de 10sec
  getData()
  // Atualizar dados em tempo real a cada 10 sec
  setInterval(() => {
    getData()
  }, 10000);
})()