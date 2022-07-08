let bt = document.querySelector(".conteiner-column")

ListarProductos();
function ListarProductos(busqueda) {
    fetch("listar-col.php", {
        method: "POST",
        body: busqueda
    }).then(response => response.text()).then(response => {
        bt.innerHTML = response;
    })
}
