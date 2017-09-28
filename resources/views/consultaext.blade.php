<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Dar salud - SISTEMA INFORMATICO MEDICO</title>
	  {!! Html::style('assets/css/bootstrap.css') !!}
    {!! Html::style('css/table/jquery.dataTables.css')!!}
    {!! Html::style('font-awesome-4.6.3/css/font-awesome.css')!!}
    {!! Html::style('assets/css/sidebar.css') !!}
    {!! Html::script('assets/js/ajax.js')!!}
    {!! Html::script('assets/js/sidebar2.js')!!}
    {!! Html::script('js/table/jquery.dataTables.js')!!}
    {!! Html::script('assets/js/bootstrap.js')!!}
    {!! Html::script('assets/js/pestania.js')!!}
    {!! Html::style('assets/css/pestania.css') !!}
    <script type="text/javascript">
    function limita(elEvento, maximoCaracteres) {
      var elemento = document.getElementById("texto");

      // Obtener la tecla pulsada
      var evento = elEvento || window.event;
      var codigoCaracter = evento.charCode || evento.keyCode;
      // Permitir utilizar las teclas con flecha horizontal
      if(codigoCaracter == 37 || codigoCaracter == 39) {
        return true;
      }

      // Permitir borrar con la tecla Backspace y con la tecla Supr.
      if(codigoCaracter == 8 || codigoCaracter == 46) {
        return true;
      }
      else if(elemento.value.length >= maximoCaracteres ) {
        return false;
      }
      else {
        return true;
      }
    }
     </script>

    <script type="text/javascript">
      function pdfreceta()
      {
        document.fmedica.submit();


      }
    </script>
    <script language="Javascript">
    function preguntar(data1){

    if (confirm("¿Esta seguro/a de salir?. Los datos se perderan!?")==true){
    location='/pacientes/'+data1;
    }
    else{
    return false;
    }
    }
    </script>
     <script type="text/javascript">
        function showContent() {
            element = document.getElementById("especialidades");
            if (document.fmedica.opciones7[1].checked == true) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script>
</head>
<body style="background-color:#EFEEEE">
  <nav class="navbar navbar-inverse no-margin" style="border-radius: 0; background-color: #000;">
     <!-- Brand and toggle get grouped for better mobile display -->
                 <div class="navbar-header fixed-brand" >
                     <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse"  id="menu-toggle">
                       <span  class="glyphicon glyphicon-th-large" aria-hidden="true" style="color: #fff;"></span>
                     </button>
                     <a class="navbar-brand" href="{{ url('/') }}" style="color: #21D3F3; padding-left: 14%; font-size: 25px;"><span class="fa fa-medkit"></span> <b>DARSALUD</b></a>
                 </div><!-- navbar-header-->
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <a class="btn btn-danger" style="float:right; margin-top:0.5%;" href="{{ url('logout') }}">CERRAR SESION</a>
                 </div><!-- bs-example-navbar-collapse-1 -->
     </nav>
    <div class="container-fluid panel" style="padding:20px;">
      <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Consulta')" id="defaultOpen">Historia basica</button>
        <button class="tablinks" onclick="openCity(event, 'Laboratorios')">Laboratorios</button>
        <button class="tablinks" onclick="openCity(event, 'Recetas')">Recetas</button>
        <div class="col-md-offset-8" style="padding:5px;">
          <a class="btn btn-primary" type="button">Imprimir Historia basica</a>
          <a class="btn btn-danger" type="button">Finalizar consulta</a>
        </div>
      </div>
      <div id="Consulta" class="tabcontent">
        <div class="tab">
          <button class="tablinks2" onclick="openCity2(event, 'paciente')" id="defaultOpen2">Datos de paciente</button>
          <button class="tablinks2" onclick="openCity2(event, 'historia')" >Historial</button>
          <button class="tablinks2" onclick="openCity2(event, 'antecped')" >Antec. pediatricos</button>
          <button class="tablinks2" onclick="openCity2(event, 'antecobs')" >Antec. obstectricos</button>
          <button class="tablinks2" onclick="openCity2(event, 'anticon')" >Anticoncepcion</button>
          <button class="tablinks2" onclick="openCity2(event, 'lact')">Lactancia</button>
          <button class="tablinks2" onclick="openCity2(event, 'facries')">Factor Riesgo</button>
          <button class="tablinks2" onclick="openCity2(event, 'riesgo')">Riesgos</button>
          <button class="tablinks2" onclick="openCity2(event, 'patologico')">Antec. patologicos</button>
          <button class="tablinks2" onclick="openCity2(event, 'enfcro')">Enfermedades cronicas</button>
        </div>
        <form class="" action="index.html" method="post">
        <div id="paciente" class="tabcontent2">

        </div>
        <div id="historia" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="antecped" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="antecobs" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="anticon" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="lact" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="facries" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="riesgo" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="patologico" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div id="enfcro" class="tabcontent2">
          <h3>Paris</h3>
          <p>Paris is the capital of France.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" name="button">Guardar</button>
          <button type="button" class="btn btn-primary" name="button">Nueva nota de evolucion</button>
        </div>
      </div>
    </form>
        <div id="Laboratorios" class="tabcontent">
          <div  style="width:100%; background:#fff; margin-top:1%;">
              <div class="alert alert-info" style="font-size:23px;">Laboratorios<a style="margin-left:50%;" onclick='javascript:preguntar({{ $id }});'  class="btn btn-warning">Volver al historial</a> <a target="_blank" style="margin-left:1%;" class = "btn btn-primary" onclick="javascript:pdflaboratorio();"><span class="fa fa-print"></span>
                        Imprimir
                      </a>

                      <button type="submit" name="finreceta" style="margin-left:1%;" formtarget="" class = "btn btn-danger"  ><span class="fa fa-print"></span>
                                Finalizar
                              </button></div>
              <div class="alert panel panel-success cuerpo" style="background:#fff; margin-top:-2.7%">
                      <fieldset style="background-color:#BEEABE; padding: 2%;">
                          <legend>
                               Paciente
                          </legend>
                          <div class="form-group">
                              <label class="col-lg-2">Apellido paterno: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" name="" readonly="readonly" value="{{ $paciente->APA_PAC}}">
                              </div>
                              <label class="col-lg-2">Apellido materno: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" readonly="readonly" name="" value="{{ $paciente->AMA_PAC}}">
                              </div>
                              <div style="float:right; margin-right:2%; margin-top: -5%; height:50px;"><output id="list"></output></div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2">Nombres: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="{{ $paciente->NOM_PAC}}">
                              </div>
                              <label class="col-lg-2">CI: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" readonly="readonly" name="" value="{{ $paciente->CI_PAC}}">
                              </div>
                          </div>
                          <div class="form-group">

                              <label class="col-lg-2">Sexo: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="{{ $paciente->SEX_PAC}}">
                              </div>                                   <label class="col-lg-2">Edad: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="<?php
                $edad = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('Y');
                $edad2 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('m');
                $edad3 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('d');
                $categorias= \Darsalud\Categorialaboratorio::get();
                 echo $date = \Carbon\Carbon::createFromDate($edad,$edad3,$edad2)->age;
                 ?>">
                              </div>
                          </div>
                          </fieldset>
                      <fieldset style="background-color:#B9DEE3; padding: 2%;">
                          <legend>Lista de laboratorios</legend>
                          <div class="form-group">
                              <label class="col-lg-2 control-label">Categoria:</label>
                              <div class="col-lg-3">
                                  <select class="form-control" id="categoria" required>
                                    <option value="">SELECCIONE</option>
                                    @foreach($categorias as $cat)
                                      <option value="{{$cat->id}}">{{$cat->DES_CAL}}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <label class="col-lg-2 control-label">Laboratorio:</label>
                              <div class="col-lg-3">
                                  <select class="form-control" name="" id="lab">
                                  </select>
                              </div>
                              <div class="col-lg-2">
                                <button type="button" onclick="javascript:agregavalor('1','23','23');" class="btn btn-primary" name="button">Añadir Laboratorio</button>
                              </div>
                             </div>
                             </fieldset>
                             <div class = "modal-footer">
                               <div class="form-group ">
                                 <table id="tabla" class="table table-responsive table-hover">
          	                        <!-- Cabecera de la tabla -->
          						                    <thead>
            							<tr class="active">

          								<th width="50%">Laboratorio</th>
          								<th width="15%" class="info">Categoria</th>
          								<th width="2%">&nbsp;</th>
          							</tr>
          						</thead>


          		<!-- fin de código: fila base -->

          		<!-- Fila de ejemplo -->

          		<!-- fin de código: fila de ejemplo -->


          					</table>
                               </div>

                   </div>
                   </div>
                   </div>
        </div>

        <div id="Recetas" class="tabcontent">
          <div  style="width:100%; background:#fff; margin-top:1%;">
              <div class="alert alert-info" style="font-size:23px;">Recetas<a style="margin-left:50%;" onclick='javascript:preguntar({{ $id }});'  class="btn btn-warning">Volver al historial</a> <a target="_blank" style="margin-left:1%;" class = "btn btn-primary" onclick="javascript:pdfreceta();"><span class="fa fa-print"></span>
                        Imprimir
                      </a>

                      <button type="submit" name="finreceta" style="margin-left:1%;" formtarget="" class = "btn btn-danger"  ><span class="fa fa-print"></span>
                                Finalizar
                              </button></div>
              <div class="alert panel panel-success cuerpo" style="background:#fff; margin-top:-2.7%">
                      <fieldset style="background-color:#BEEABE; padding: 2%;">
                          <legend>
                               Paciente
                          </legend>
                          <div class="form-group">
                              <label class="col-lg-2">Apellido paterno: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" name="" readonly="readonly" value="{{ $paciente->APA_PAC}}">
                              </div>
                              <label class="col-lg-2">Apellido materno: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" readonly="readonly" name="" value="{{ $paciente->AMA_PAC}}">
                              </div>
                              <div style="float:right; margin-right:2%; margin-top: -5%; height:50px;"><output id="list"></output></div>
                          </div>
                          <div class="form-group">
                              <label class="col-lg-2">Nombres: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="{{ $paciente->NOM_PAC}}">
                              </div>
                              <label class="col-lg-2">CI: </label>
                              <div class="col-lg-3">
                                  <input type="text" class="form-control" readonly="readonly" name="" value="{{ $paciente->CI_PAC}}">
                              </div>
                          </div>
                          <div class="form-group">

                              <label class="col-lg-2">Sexo: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="{{ $paciente->SEX_PAC}}">
                              </div>                                   <label class="col-lg-2">Edad: </label>
                              <div class="col-lg-3">
                                  <input type="text" readonly="readonly" class="form-control" name="" value="<?php
                $edad = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('Y');
                $edad2 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('m');
                $edad3 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('d');

                 echo $date = \Carbon\Carbon::createFromDate($edad,$edad3,$edad2)->age;
                 ?>">
                              </div>
                          </div>
                          </fieldset>
                      <fieldset style="background-color:#B9DEE3; padding: 2%;">
                          <legend>Receta medica</legend>
                          <div class="form-group">
                              <div class="col-lg-12">
                                  <textarea rows="15" id="texto"  class="form-control" name="rec_med" ></textarea>
                              </div>
                             </div>
                             </fieldset>
                             <div class = "modal-footer">
                      <button type = "submit" target="_blank" class = "btn btn-primary" data-dismiss = "modal"><span class="fa fa-print"></span>
                        Imprimir receta
                      </button>


                   </div>
        </div>
      </div>

      <div id="Laboratorios" class="tabcontent">
        <h3>Paris</h3>
        <p>Paris is the capital of France.</p>
      </div>

      <div id="Recetas" class="tabcontent">
        <h3>Tokyo</h3>
        <p>Tokyo is the capital of Japan.</p>
      </div>
    </div>
    </body>
    <script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    document.getElementById("defaultOpen2").click();
    </script>
    </html>
