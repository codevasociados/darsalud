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
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nota de evolucion</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="">Fecha:</label>
                <span class=""> {{\Carbon\Carbon::now()->format('d-m-Y')}}</span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-1">R:</label>
                <span class="col-md-4"><input type="text" class="form-control" name="" value=""></span>
                <label for="" class="col-md-1">N:</label>
                <span class="col-md-4 "><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-7">Edad actual:</label>
                <span class="col-md-5"> 12</span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Peso:</label>
                <span class="col-md-9"><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Talla:</label>
                <span class="col-md-9"><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">P.A.:</label>
                <span class="col-md-9"><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">F.C.:</label>
                <span class="col-md-9"><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-6">Temperatura:</label>
                <span class="col-md-6"><input type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">F.U.M:</label>
                <span class="col-md-9"><input type="text" class="form-control" name="" value=""></span>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row form-group">
                <label for="" class="col-md-3">Subjetivo:</label>
                <span class="col-md-9"><textarea name="name" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Objetivo:</label>
                <span class="col-md-9"><textarea name="name" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Analisis:</label>
                <span class="col-md-9"><textarea name="name" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Plan de acción:</label>
                <span class="col-md-9"><textarea name="name" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
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
          <a class="btn btn-danger" type="button">Finalizar consulta</a>
        </div>
      </div>
      <div id="Consulta" class="tabcontent">
        <div class="tab tab2">
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
            <div style="padding: 2% 10% 0 10%" class="form-group">
          <fieldset class="">
            <legend>Datos personales</legend>
          <div class=" row form-group ">
            <div class="col-lg-4">
              <label for="" class="label label-primary">Nombre:</label> <span class="form-control">{{$paciente->NOM_PAC}}</span>
            </div>
            <div class="col-lg-4">
              <label for="" class="label label-primary">Apellido paterno:</label> <span class="form-control">{{$paciente->APA_PAC}}</span>
            </div>
            <div class="col-lg-4">
              <label for="" class="label label-primary">Apellido materno:</label> <span class="form-control">{{$paciente->AMA_PAC}}</span>
            </div>
          </div>
          <div class=" row form-group">
            <div class="col-lg-4">
              <label for="" class="label label-success">Fecha de nacimiento:</label> <span class="form-control">{{$paciente->FEC_NAC}}</span>
            </div>
            <div class="col-lg-2">
              <label for="" class="label label-success">Edad:</label> <span class="form-control"><?php
                  $edad = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('Y');
                  $edad2 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('m');
                  $edad3 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('d');
                  $categorias= \Darsalud\Categorialaboratorio::get();
                  echo $date = \Carbon\Carbon::createFromDate($edad,$edad3,$edad2)->age;
                  ?></span>
            </div>
            <div class="col-lg-2">
              <label for="" class="label label-success">Genero</label> <span class="form-control">{{$paciente->SEX_PAC}}</span>
            </div>
            <div class="col-lg-4">
              <label for="" class="label label-success">Fecha de ingreso</label> <span class="form-control">{{\Carbon\Carbon::now()->format('d/m/Y H:i')}}</span>
            </div>
          </div>
          <div class=" row form-group">
            <div class="col-lg-4">
              <label for="" class="label label-warning">Profesion u oficio:</label> <span class="form-control">{{$paciente->PRO_PAC}}</span>
            </div>
            <div class="col-lg-4">
              <label for="" class="label label-warning">Direccion:</label> <input class="form-control" type="text" placeholder="Direccion del paciente"></input>
            </div>
            <div class="col-lg-4">
              <label for="" class="label label-warning">Telefono</label> <span class="form-control">{{$paciente->REF_PAC}}</span>
            </div>
          </div>
        </fieldset>
        </div>
        </div>
        <div id="historia" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Datos generales</legend>
        <div class=" row form-group ">
          <div class="col-lg-4">
            <label for="" class="label label-primary">Numero de Historia clinica:</label> <span class="form-control">{{'HCL-'.$paciente->id}}</span>
          </div>
          <div class="col-lg-8">
            <label for="" class="label label-primary">Alergias:</label> <input type="text" class="form-control" name="" placeholder="ALERGIAS" value="">
          </div>

        </div>
        <div class=" row form-group">
          <div class="col-lg-4">
            <label for="" class="label label-success">Grupo sanguineo:</label> <input type="text" class="form-control" name="" placeholder="Grupo sanguineo" value="">
          </div>
          <div class="col-lg-2">
            <label for="" class="label label-success">Factor:</label><input type="text" class="form-control" name="" placeholder="Factor" value="">
          </div>

        </div>
        <div class=" row form-group">
            <a href="#" >+ Agregar Razon de especial cuidado</a>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="antecped" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Antecedentes pediatricos</legend>
        <div class=" row form-group ">
          <div class="col-lg-2">
            <label for="" class="label label-primary">Peso Recien nacido:</label> <input type="text" class="form-control" name="" placeholder="Factor" value="">
          </div>
          <div class="col-lg-10">
            <a href="#">+ Agregar Observacion perinatal</a>
          </div>
        </div>

      </fieldset>
      </div>
        </div>
        <div id="antecobs" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Antecedentes obstetricos</legend>
        <div class=" row form-group ">
            <fieldset>
              <legend>Embarazo</legend>
          <div class="col-lg-3">
            <label for="" class="label label-primary">G:</label><input type="text" class="form-control" name="" placeholder="G" value="">
          </div>
          <div class="col-lg-3">
            <label for="" class="label label-primary">P:</label><input type="text" class="form-control" name="" placeholder="P" value="">
          </div>
          <div class="col-lg-3">
            <label for="" class="label label-primary">A:</label><input type="text" class="form-control" name="" placeholder="A" value="">
          </div>
          <div class="col-lg-3">
            <label for="" class="label label-primary">C:</label><input type="text" class="form-control" name="" placeholder="C" value="">
          </div>
        </fieldset>
        </div>
        <div class=" row form-group">
          <a href="#">+ Agregar nuevo registro </a>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="anticon" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Anticoncepcion</legend>
        <div class=" row form-group ">
          <a href="#">+ Agregar nuevo registro </a>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="lact" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Lactancia</legend>
        <div class=" row form-group ">

            <label for="">Exclusiva</label>
            <input id="checkBox" class="form-control" type="checkbox">
            <label for="">Periodica</label>
            <input id="checkBox" class="form-control" type="checkbox">
        </div>
      </fieldset>
      </div>
        </div>
        <div id="facries" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Factor de riesgos sociales</legend>
        <div class=" row form-group ">
          <a href="#">+ Añadir nuevo factor de riesgo social</a>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="riesgo" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Riesgos</legend>
        <div class=" row form-group ">
          <table class="table table-hover">
              <thead >
                <tr class="danger">
                  <td>RIESGO</td>
                  <td>Personal</td>
                  <td>Familiar</td>
                  <td>RIESGO</td>
                  <td>Personal</td>
                  <td>Familiar</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Ninguno</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Transt - SNC</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Hipertension</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Obesidad</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Diabetes</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Desnutricion</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Tuberculosis</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Drogas</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Sifilis</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Alcohol</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Transfuciones</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Tabaquismo</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
                <tr>
                  <td>Cirugias</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td>Otros</td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                  <td><input type="checkbox" class="form-control" name="" value=""></td>
                </tr>
              </tbody>
          </table>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="patologico" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Antecedentes patologicos</legend>
        <div class=" row form-group ">
          <a href="#">+ Añadir nuevo antecedente patologico</a>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="enfcro" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Medicamentos en enfermedades cronicas</legend>
        <div class=" row form-group ">
          <a href="#">+ Añadir nuevo medicamento</a>
        </div>
      </fieldset>
      </div>
        </div>
        <div class="modal-footer col-lg-12">
          <button type="button" class="btn btn-success" name="button">Guardar</button>
          <a class="btn btn-warning" type="button">Imprimir Historia basica</a>
          <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary" name="button">+ Nueva nota de evolucion</button>
        </div>
      </div>
    </form>
        <div id="Laboratorios" class="tabcontent">
              <div class="alert panel panel-success cuerpo">
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
          						</thead></table>
                               </div>
                   </div>
                   <a target="_blank" style="margin-left:85%;" class = "btn btn-primary" onclick="javascript:pdflaboratorio();"><span class="fa fa-print"></span>
                             Imprimir laboratorio
                           </a>
                   </div>
                   </div>
        <div id="Recetas" class="tabcontent">
                <div class="alert panel panel-success cuerpo">
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
      </div>



    </body>
    <script>
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    document.getElementById("defaultOpen2").click();
    </script>
    </html>
