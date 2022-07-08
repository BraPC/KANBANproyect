let btclose = document.querySelector(".conteiner-form .close-form");
let btcolumn = document.querySelector(".new-col");
let btnota = document.querySelectorAll(".new-not");



btclose.addEventListener("click",function() {
    document.querySelector(".conteiner-form").classList.remove("active");

});



btcolumn.addEventListener("click",function() {

    document.querySelector(".form").innerHTML=`
    <form action = "register-conten.php" method="post" class="formulario__register" id="frm">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" class="input-frm" required>
                    <input type="number" placeholder="posicion" name="posicion" class="input-frm" required>
                    <button class="button" id="registrar">Regístrarse</button>
                </form>`;

    document.querySelector(".conteiner-form").classList.add("active");

});

btnota.forEach(function(btnot) {
    btnot.addEventListener("click",function() {
        document.querySelector(".formulario__register").innerHTML=`
        <form action = "register-conten-nota.php" method="post" class="formulario__register" id="frm">
        <h2>Regístrarse</h2>
        <input type="text" placeholder="Nombre completo" name="nombre_completo" class="input-frm" required>
        <input type="text" placeholder="Correo Electronico" name="correo" class="input-frm" required>
        <input type="text" placeholder="Usuario" name="usuario" class="input-frm" required>
        <input type="password" placeholder="Contraseña" name="contrasena" class="input-frm" required>
        <button class="button" id="registrar">Regístrarse</button>
    </form>`;

        document.querySelector(".conteiner-form").classList.add("active");
    
    });
});

