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
    <style type="text/css">
    .fila-base{ display: none; } /* fila base oculta */
    .eliminar{ cursor: pointer; color: #000; }
    </style>
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
                <span class="col-md-4"><input id="inputR" type="text" class="form-control" name="" value=""></span>
                <label for="" class="col-md-1">N:</label>
                <span class="col-md-4 "><input id="inputN" type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-7">Edad actual:</label>
                <span class="col-md-5">
                <?php
                $edad = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('Y');
                $edad2 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('m');
                $edad3 = \Carbon\Carbon::createFromFormat('Y-m-d', $paciente->FEC_NAC)->format('d');
                $date = \Carbon\Carbon::createFromDate($edad,$edad2,$edad3)->age;
                ?>{{$date}}</span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Peso:</label>
                <span class="col-md-9"><input id="inputPeso" type="text" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Talla:</label>
                <span class="col-md-9"><input type="text" id="inputTalla" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">P.A.:</label>
                <span class="col-md-9"><input type="text" id="inputPA" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">F.C.:</label>
                <span class="col-md-9"><input type="text" id="inputFC" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-6">Temperatura:</label>
                <span class="col-md-6"><input type="text" id="inputTem" class="form-control" name="" value=""></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">F.U.M:</label>
                <span class="col-md-9"><input type="text" id="inputFUM" class="form-control" name="" value=""></span>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row form-group">
                <label for="" class="col-md-3">Subjetivo:</label>
                <span class="col-md-9"><textarea name="name" id="inputSub" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Objetivo:</label>
                <span class="col-md-9"><textarea name="name" rows="4" id="inputObj" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Analisis:</label>
                <span class="col-md-9"><textarea name="name" id="inputAna" rows="4" cols="80" class="form-control"></textarea></span>
              </div>
              <div class="row form-group">
                <label for="" class="col-md-3">Plan de acción:</label>
                <span class="col-md-9"><textarea name="name" rows="4" id="inputPlan" cols="80" class="form-control"></textarea></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal" id="guardarnota" onclick="guardarnota('{{$id}}','{{$ids}}');"><span class="fa fa-save"></span> Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
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
        <button class="tablinks" type="button" onclick="openCity(event, 'Consulta')" id="defaultOpen">Historia basica</button>
        <button class="tablinks" type="button" onclick="openCity(event, 'Laboratorios')">Laboratorios</button>
        <button class="tablinks" type="button" onclick="openCity(event, 'Recetas')">Recetas</button>
          <div class="col-md-offset-8" style="padding:5px;">
          <a class="btn btn-danger" type="button">Finalizar consulta</a>
        </div>
      </div>
    <form class="" action="{{url($id.'/consultaexterna'.'/'.$ids.'/pdfconsultaext')}}" target="_blank" accept-charset="UTF-8"  enctype="multipart/form-data" method="post">
      <div id="Consulta" class="tabcontent">
        <div class="tab tab2">
          <button class="tablinks2" type="button" onclick="openCity2(event, 'paciente')" id="defaultOpen2">Datos de paciente</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'historia')" >Historial</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'antecped')" >Antec. pediatricos</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'antecobs')" >Antec. obstectricos</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'anticon')" >Anticoncepcion</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'lact')">Lactancia</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'facries')">Factor Riesgo</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'riesgo')">Riesgos</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'patologico')">Antec. patologicos</button>
          <button class="tablinks2" type="button" onclick="openCity2(event, 'enfcro')">Enfermedades cronicas</button>
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
            <a href="#" id="agregar" >+ Agregar Razon de especial cuidado</a>
            <table id="tabla" class="table table-hover">
            	<thead>
            		<tr>
            			<th>Razon</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr class="fila-base">
            			<td><input type="text" class="form-control" placeholder="Razon de especial cuidado" /></td>
            			<td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
            		</tr>
            	</tbody>
            </table>
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
            <a href="#" id="agregar2">+ Agregar Observacion perinatal</a>
            <table id="tabla2" class="table table-hover">
            	<thead>
            		<tr>
            			<th>Observaciones perinatales</th>
            			<th>Eliminar</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr class="fila-base">
            			<td><input type="text" class="form-control" placeholder="Observaciones perinatales" /></td>
            			<td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
            		</tr>
            	</tbody>
            </table>
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
          <a href="#" id="agregar3">+ Agregar nuevo registro </a>
          <table id="tabla3" class="table table-hover">
            <thead>
              <tr >
                <th rowspan="2"><center>Año</center></th>
                <th rowspan="2"><center>Duracion meses</center></th>
                <th colspan="2" class="danger"><center>Tipo de parto</center></th>
                <th colspan="2" class="success"><center>Nro de recien nacidos</center></th>
                <th colspan="2" class="info"><center>PAP Colposcopia</center></th>
                <th rowspan="2"><center>Eliminar</center></th>
              </tr>
              <tr>
                <th class="danger"><center>Vaginal</center></th>
                <th class="danger"><center>Cesarea</center></th>
                <th class="success"><center>Vivos</center></th>
                <th class="success"><center>Muertos</center></th>
                <th class="info"><center>Fecha</center></th>
                <th class="info"><center>Resultado</center></th>
              </tr>
            </thead>
            <tbody>
              <tr class="fila-base">
                <td><input type="text" class="form-control" placeholder="Año" /></td>
                <td><input type="text" class="form-control" placeholder="Duracion meses" /></td>
                <td><input type="text" class="form-control" placeholder="Parto vaginal" /></td>
                <td><input type="text" class="form-control" placeholder="Parto cesarea" /></td>
                <td><input type="number" class="form-control" placeholder="Vivos" /></td>
                <td><input type="number" class="form-control" placeholder="Muertos" /></td>
                <td><input type="date" class="form-control" placeholder="Fecha" /></td>
                <td><input type="text" class="form-control" placeholder="Resultado" /></td>
                <td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="anticon" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Anticoncepcion</legend>
        <div class=" row form-group ">
          <a href="#" id="agregar4">+ Agregar nuevo registro </a>
          <table id="tabla4" class="table table-hover">
            <thead>
              <tr>
                <th>Inicio</th>
                <th>Metodo</th>
                <th>Control</th>
                <th>Orientacion</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr class="fila-base">
                <td><input type="text" class="form-control" placeholder="Inicio" /></td>
                <td><input type="text" class="form-control" placeholder="Metodo" /></td>
                <td><input type="text" class="form-control" placeholder="Control" /></td>
                <td><input type="text" class="form-control" placeholder="Orientacion" /></td>
                <td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
              </tr>
            </tbody>
          </table>
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
          <a href="#" id="agregar5">+ Añadir nuevo factor de riesgo social</a><br/><br/>
          <table id="tabla5" class="table table-hover">
            <thead>
              <tr>
                <th>Factor de riesgo social</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr class="fila-base">
                <td><input type="text" class="form-control" placeholder="Factor de riesgo social" /></td>
                <td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
              </tr>
            </tbody>
          </table>
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
          <a href="#" id="agregar6">+ Añadir nuevo antecedente patologico</a>
          <table id="tabla6" class="table table-hover">
            <thead>
              <tr>
                <th>Hospitalizado por</th>
                <th>Año</th>
                <th>Evaluacion</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr class="fila-base">
                <td><input type="text" class="form-control" placeholder="Hospitalizado por" /></td>
                <td><input type="text" class="form-control" placeholder="Año" /></td>
                <td><input type="text" class="form-control" placeholder="Evaluacion" /></td>
                <td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="enfcro" class="tabcontent2">
          <div style="padding: 2% 10% 0 10%" class="form-group">
        <fieldset class="">
          <legend>Medicamentos en enfermedades cronicas</legend>
        <div class=" row form-group ">
          <a href="#" id="agregar7">+ Añadir nuevo medicamento</a><br><br>
          <table id="tabla7" class="table table-hover">
            <thead>
              <tr>
                <th>Medicamentos</th>
                <th>Dosificacion</th>
                <th>Final</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <tr class="fila-base">
                <td><input type="text" class="form-control" placeholder="Medicamentos" /></td>
                <td><input type="text" class="form-control" placeholder="Dosificacion" /></td>
                <td><input type="text" class="form-control" placeholder="Final" /></td>
                <td class="eliminar"><button type="button" class="btn btn-danger" name="button"><span class="fa fa-close"></span></button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </fieldset>
      </div>
        </div>
        <div id="notas" class="form-group row col-md-offset-2" style="width:80%">
          <fieldset>
            <legend>Notas de evolucion</legend>
          <table class="table table-hover">
            <thead>
              <tr class="danger">
                <td>Fecha</td>
                <td>Acciones</td>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          </fieldset>
        </div>
        <div class="modal-footer col-lg-12">
          <button type="submit" class="btn btn-success" name="button">Guardar</button>
          <button class="btn btn-warning" type="submit">Imprimir Historia basica</button>
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
    <script type="text/javascript">
      $(function(){
        	$("#agregar").on('click', function(){
      		$("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar2").on('click', function(){
      		$("#tabla2 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla2 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar3").on('click', function(){
      		$("#tabla3 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla3 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar4").on('click', function(){
      		$("#tabla4 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla4 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar5").on('click', function(){
      		$("#tabla5 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla5 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar6").on('click', function(){
      		$("#tabla6 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla6 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
      $(function(){
        	$("#agregar7").on('click', function(){
      		$("#tabla7 tbody tr:eq(0)").clone().removeClass('fila-base').appendTo("#tabla7 tbody");
      	});
    	$(document).on("click",".eliminar",function(){
        		var parent = $(this).parents().get(0);
        		$(parent).remove();
        	});
      });
    </script>
    <script type="text/javascript">
      function guardarnota(var1,var2){
        e.preventDefault();
        var n = $('#inputN').val();
        var r = $('#inputR').val();
        var peso = $('#inputPeso').val();
        var talla = $('#inputTalla').val();
        var pa = $('#inputPA').val();
        var fc = $('#inputFC').val();
        var temperatura = $('#inputTem').val();
        var fum = $('#inputFUM').val();
        var sub = $('#inputSub').val();
        var obj = $('#inputObj').val();
        var ana = $('#inputAna').val();
        var plan = $('#inputPlan').val();
        $.ajax({
            type: "POST",
            url: host + '/'var1+'/consultaexterna/'+var2+'/guardarnota',
            data: {n,r,peso,talla,pa,fc,temperatura,fum,sub,obj,ana,plan},
            success: function( msg ) {
                $("#ajaxResponse").append("<div>"+msg+"</div>");
            }
        });

      }
    </script>
    </html>
