<?php

echo "holaaaaaaaaaa";
print_r($_GET);
?>

<ol class="breadcrumb animated fadeIn fast">
	<li><a href="#"><i class="fa fa-tty"></i> Inicio</a></li>
	<li class="active">Creación de Cuenta</li>
</ol>

<!-- Content -->
<section>
      <form class="form-horizontal">
        <fieldset>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nombre">Nombre</label>
              <div class="col-md-4">
              <input id="nombre" name="nombre" type="text" placeholder="Nombre completo" class="form-control input-md" required="">
              <span class="help-block">Nombre del Usuario</span>
            </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="telefono">Teléfono</label>
              <div class="col-md-4">
              <input id="telefono" name="telefono" type="text" placeholder="Numero de teléfono" class="form-control input-md" required="">
              <span class="help-block">TCntacto Personal</span>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email</label>
              <div class="col-md-4">
              <input id="email" name="email" type="text" placeholder="Email address" class="form-control input-md" required="">
              <span class="help-block">Este Email sera utilizado para las notificaciones de mensajes</span>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="direccion1">Dirección</label>
              <div class="col-md-4">
              <input id="direccion1" name="direccion1" type="text" placeholder="Dirección " class="form-control input-md" required="">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="direccion2"></label>
              <div class="col-md-4">
              <input id="direccion2" name="direccion2" type="text" placeholder="Dirección 2 " class="form-control input-md">

              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="region">Seleccione su Región</label>
              <div class="col-md-4">
                <select id="region" name="region" class="form-control">
                  <option value="0" selected="selected">Regiones</option>
                  <option value="1">1 Tarapaca</option>
                  <option value="2">2 Antofagasta</option>
                  <option value="3">3 Atacama</option>
                  <option value="4">4 Coquimbo</option>
                  <option value="5">5 Valparaiso</option>
                  <option value="6">6 O'Higgins</option>
                  <option value="7">7 Maule</option>
                  <option value="8">8 Bio - Bio</option>
                  <option value="9">9 Araucania</option>
                  <option value="10">10 Los Lagos</option>
                  <option value="11">11 Aisen</option>
                  <option value="12">12 Magallanes Y Antartica</option>
                  <option value="13">13 Metropolitana</option>
                  <option value="14">14 Los Rios</option>
                  <option value="15">15 Arica y Parinacota</option>
    		       </select>
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="contraseña">Contraseña </label>
              <div class="col-md-4">
                <input id="contraseña" name="contraseña" type="password" placeholder="Contraseña " class="form-control input-md" required="">
                <span class="help-block">Contraseña </span>
              </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="confirme">Confirme</label>
              <div class="col-md-4">
                <input id="confirme" name="confirme" type="password" placeholder="Confirmar" class="form-control input-md" required="">
                <span class="help-block">Confirme su contraseña</span>
              </div>
            </div>

            <!--<div class="form-group">
                <label class="col-md-4 control-label" for="confirme">Confirme</label>
                  <div class="col-md-4">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Buscar… <input type="file" id="imgInp">
                        </span>
                    </span>
                    <input type="text" class="form-control" readonly>
                </div>
                <img id='img-upload'/>
            </div>-->

            <!-- Button (Double) -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="guardar"></label>
              <div class="col-md-8">
                <button id="guardar" name="guardar" class="btn btn-success">Grabar</button>
                <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
              </div>
            </div>

            </fieldset>
            </form>
  </section>
