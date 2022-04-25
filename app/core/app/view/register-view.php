<style>
    
.title-r {
    font-family: inherit;
    font-size: larger;
    font-weight: 700;
    text-transform: initial;
    text-align: center;
}

</style>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <div class="card">
        <div class="text-center">
            <img src="../img/header-bg.jpg" style="width: 40%">
        </div>
        <br>        
        <div class="card-content table-responsive">
            <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=adduser" role="form">
                <div class="form-group">
                    <h4 class="title-r">En nuestro Portal Web usted podrá gestionar sus turnos y los de su grupo familiar 100% Online las 24 hs.</h4>
                    <br>
                    <h4 class="title-r">La finalidad por la cual recogemos sus datos es para poderle ofrecer hora de visita de forma ágil y personalizada.</h4>
                    <h4 class="title-r">Complete los datos a continuacion</h4>
                </div>
                <div class="form-group">
                    <label>Nombre Completo*</label>            
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label>Apellido Completo*</label>            
                    <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="Apellido">
                </div>
                <div class="form-group">
                    <label>Documento*</label>            
                    <input type="number" min="1" maxlength="9" name="document" required class="form-control" id="document" placeholder="N° de Documento">
                </div>                
                <div class="form-group">
                    <label>Nombre de usuario *</label>            
                    <input type="text" name="username" class="form-control" required id="username" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <label>Correo Electrónico*</label>            
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Contrase&ntilde;a</label>
                    <br>
                    <small id="emailHelp" class="form-text text-muted">8 Caracteres alfanuméricos</small>          
                    <input type="password" name="password" class="form-control" id="inputEmail1" placeholder="Contrase&ntilde;a">
                </div>
                <div class="form-group">
                    <label>Confirmar Contrase&ntilde;a</label>            
                    <input type="password" name="password" class="form-control" id="inputEmail2" placeholder="Contrase&ntilde;a">
                </div>            
                <div class="form-group">
                    <label>
                        <input type="checkbox" onclick="mostrarContrasena(); mostrarContrasenaDos()"> Mostrar Contraseña 
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="accept" name="accept" required>  He leido y acepto la Política de privacidad
                    </label>
                </div>       
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block"><i class='fa fa-check'></i> Validar y Registrarse</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                        <a href="index.php?view=login" class="btn btn-default btn-block"> Iniciar Sesión</a>
                    </div>
                </div>                
            </form>

        </div>
    </div>
  </div>
</div>

<script>

    function mostrarContrasena(){
        var tipo = document.getElementById("inputEmail1");
        if(tipo.type == "password"){
            tipo.type = "text";
        }
        else{
            tipo.type = "password";

        }
    }

    function mostrarContrasenaDos(){
        var tipo2 = document.getElementById("inputEmail2");
        if(tipo2.type == "password"){
            tipo2.type = "text";
        }
        else{
            tipo2.type = "password";
        }
    }

</script>