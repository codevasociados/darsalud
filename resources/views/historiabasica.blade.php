@extends('historialpaciente')
@section('contenido')
{!! Html::style('css/pests.css')!!}
{!! Html::script('js/pest.js')!!}
<form>
<!-- codigo parte de datos personales del paciente en la  historia basica!-->
<div class="row">
  <div class="col-md-3 col-md-push-9">
  	<div class="row">
 		<div class="col-xs-9 form-group">
 			<label><b>Nro. de H.C.:</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-9 form-group">
 			<label><b>Glas</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-5 form-group">
 			<label><b>sanguineo:</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-4 form-group">
 			<label><b>Factor</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<label><b>Razon de especial cuidado:</b></label>


 	</div>
 </div>

  <div class="col-md-9 col-md-pull-3">
  	<fieldset class="scheduler-border">
 		<legend class="scheduler-border"><H1><b> <center><FONT FACE="impact" SIZE=6 COLOR="black">
 Historia Basica</FONT></center></b></H1></legend>
 	<form>
 		<div class="row">
 			<div class="col-xs-3 form-group">
 			<label><b>Apellido Paterno:</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-3 form-group">
 			<label>Apellido Materno</label>
 				<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-6 form-group">
 			<label>Nombres</label>
 			<input class="form-control" type="text"/>
 		</div>

 		<div class="row">
 			<div class="col-xs-3 form-group">
 			<label><b>Fecha de Nacimiento</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-2 form-group">
 			<label>Edad</label>
 				<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-4 form-group">
 			<label>Genero</label>
 			<input class="form-control" type="text"/>
 		</div>

 		<div class="col-xs-6 form-group">
 			<label>Profesion u oficio</label>
 				<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-5 form-group">
 			<label>Fecha de ingreso</label>
 			<input class="form-control" type="text"/>
 		</div>
 			<div class="col-xs-5 form-group">
 			<label><b>Direccion:</b></label>
 			<input class="form-control" type="text"/>
 		</div>
 		<div class="col-xs-4 form-group">
 			<label>Telefono</label>
 				<input class="form-control" type="text"/>
 		</div>

 		</div>
 </form>
 </fieldset>

  </div>
</div>
</form>
<!-- codigo parte de las pestañas de historia basica!-->

<section style="background:#efefe9;">
        <div class="container">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active">
                     <a href="#AntPed" data-toggle="tab" title="Antecedentes Pediatricos">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-paste"></i>
                      </span>
                  </a></li>

                  <li><a href="#AntObs" data-toggle="tab" title="Antecedentes obstetricos">
                     <span class="round-tabs two">
                         <i class="fa fa-female"></i>
                     </span>
           </a>
                 </li>
                 <li><a href="#Ant" data-toggle="tab" title="Anticoncepcion">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-compressed"></i>
                     </span> </a>
                     </li>

                     <li><a href="#Lac" data-toggle="tab" title="Lactancia">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-tint"></i>
                         </span>
                     </a></li>

                     <li><a href="#FacRieSoc" data-toggle="tab" title="Factor de riesgo social">
                         <span class="round-tabs five">
                              <i class="fa fa-slideshare"></i>
                         </span> </a>
                     </li>
                     <li><a href="#Ries" data-toggle="tab" title="Riesgos">
                         <span class="round-tabs six">
                              <i class="fa fa-exclamation-triangle"></i>
                         </span> </a>
                     </li>

                     <li><a href="#AntPat" data-toggle="tab" title="Antecedentes Patologicos">
                         <span class="round-tabs seven">
                              <i class="fa fa-clipboard"></i>
                         </span> </a>
                     </li>

                     <li><a href="#MenferCro" data-toggle="tab" title="Medicamentos en enfermedades cronicas">
                         <span class="round-tabs height">
                              <i class="fa fa-briefcase"></i>
                         </span> </a>
                     </li>

                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="AntPed">

                          <h3 class="head text-center">Welcome to Bootsnipp<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>

                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="AntObs">
                          <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>

                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>

                      </div>
                      <div class="tab-pane fade" id="Lac">
                          <h3 class="head text-center">Bootsnipp goodies</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>

                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="FacRieSoc">
                          <h3 class="head text-center">Drop comments!</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>

                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="doner">
  <div class="text-center">
    <i class="img-intro icon-checkmark-circle"></i>
</div>
<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
<p class="narrow text-center">
  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
</p>
</div>
<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</section>



<!--parte del conenido del menu!-->



@stop
