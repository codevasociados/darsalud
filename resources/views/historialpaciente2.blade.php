@extends('historialpaciente')
@section('contenido')

<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() {
    		$('#example').DataTable();
    		$('#example2').DataTable();
    		$('#example3').DataTable();
    		$('#example4').DataTable();
    		$('#example5').DataTable();
    		$('#example6').DataTable();
} );
		</script>
    <fieldset class="scheduler-border">
      <legend class="scheduler-border"><d>Datos Personales</d></legend>
       <form>
            <div class="row">
            <div class="col-xs-6 form-group">
        <label>Nombre Completo</label>
    <input class="form-control" type="text"/>
            </div>
            <div class="col-xs-6 form-group">
    <label>Fecha de nacimiento</label>
    <input class="form-control" type="text"/>
          </div>
          <div class="col-xs-6">
          <div class="row">
    <label class="col-xs-12">Profesion</label>
          </div>
          <div class="row">
          <div class="col-xs-12 col-sm-6">
    <input class="form-control" type="text" placeholder="first Name"/>
          </div>

    <div class="col-xs-12 col-sm-6" >
    <input class="form-control" type="text" placeholder="last Name" title="Edad" />
    </div>
    </div>
    </div>
    <div class="col-xs-6 form-group">
      <label>Direccion</label>
        <input class="form-control" type="text" />
        </div>
        </div>
        </form>
 </fieldset>      
<!--fieldset style="background-color:#E9EBBF; padding: 2%;" class="form-group">
	<legend class="form-group">Historial del paciente</legend>
	          <div class="form-group">
                    <label class="col-lg-2">Nombre completo: </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" name="" readonly="readonly" value="{{ $pacientes->NOM_PAC.' '.$pacientes->APA_PAC.' '.$pacientes->AMA_PAC}}">
                    </div>
                </div>
                <br/>
                <br/>

                <div class="form-group">
                    <label class="col-lg-2">Fecha de nacimiento: </label>
                    <div class="col-lg-5">
                        <input type="text" readonly="readonly" class="form-control" name="" value="{{ $pacientes->FEC_NAC}}">
                    </div>                                   <label class="col-lg-2">Edad: </label>
                    <div class="col-lg-2">
                        <input type="text" readonly="readonly" class="form-control" name="" value="<?php
      $edad = \Carbon\Carbon::createFromFormat('Y-m-d', $pacientes->FEC_NAC)->format('Y');
      $edad2 = \Carbon\Carbon::createFromFormat('Y-m-d', $pacientes->FEC_NAC)->format('m');
      $edad3 = \Carbon\Carbon::createFromFormat('Y-m-d', $pacientes->FEC_NAC)->format('d');

       echo $date = \Carbon\Carbon::createFromDate($edad,$edad2,$edad3)->age;
       ?>">
                    </div>
                </div>
                <br/><br/>

                <div class="form-group">
                    <label class="col-lg-2">Profesion: </label>
                    <div class="col-lg-2">
                        <input type="text" class="form-control" name="" readonly="readonly" value="{{ $pacientes->PRO_PAC}}">
                    </div>
                    <label class="col-lg-1">Direccion: </label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="" readonly="readonly" value="{{ $pacientes->DOM_PAC}}">
                    </div>
                </div>
</fieldset>!-->
    <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Evaluciones Medicas</a></li>
  <li><a data-toggle="tab" href="#menu1">Evaluciones Psicologicas</a></li>
  <li><a data-toggle="tab" href="#menu2">Evaluciones Oftalmologicas</a></li>
  <li><a data-toggle="tab" href="#menu3">Evaluciones Otorrinolaringologicas</a></li>
  <li><a data-toggle="tab" href="#menu4">Recetas</a></li>
  <li><a data-toggle="tab" href="#menu5">Laboratorios</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
<fieldset style="background-color:#BFD8EB; font-size: 15px; padding: 2%;"><legend>Lista de Evaluaciones Medicas</legend>
  <table id="example" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evamedi)>0):?>
      <tr>
        <?php
          foreach ($evamedi as $evamed):
            $nombre=$evamed->NOM_USU.' '.$evamed->APA_USU.' '.$evamed->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evamed->FEC_MED)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evamed->FEC_MED)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><a target="_blank" href="{{ url('/pacientes/'.$id.'/histmedica/'.$evamed->id) }}" class="btn btn-success"><span class="fa fa-file-text"></span></a></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>
  </div>
  <div id="menu1" class="tab-pane fade">
    <fieldset style="background-color:#EBD7BF; padding: 2%;">
  <legend>Evaluaciones Psicologicas</legend>
  <table id="example3" class="table table-hover" style="float:left; font-size:12px;">
  <thead>
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evapsi)>0):?>
      <tr>
        <?php
          foreach ($evapsi as $evapsico):
            $nombre=$evapsico->NOM_USU.' '.$evapsico->APA_USU.' '.$evapsico->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evapsico->FEC_PSI)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evapsico->FEC_PSI)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><a target="_blank" href="{{ url('/pacientes/'.$id.'/histpsico/'.$evapsico->id) }}" class="btn btn-success"><span class="fa fa-file-text"></span></a></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>
  </div>
  <div id="menu2" class="tab-pane fade">
<fieldset style="background-color:#C2EBBF; padding: 2%;">
  <legend>Evaluaciones Oftalmologicas</legend>
  <table id="example2" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evaoft)>0):?>
      <tr>
        <?php
          foreach ($evaoft as $evaoft):
            $nombre=$evaoft->NOM_USU.' '.$evaoft->APA_USU.' '.$evaoft->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoft->FEC_OFT)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoft->FEC_OFT)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>
  </div>
    <div id="menu3" class="tab-pane fade">
<fieldset style="background-color:#E6BFEB; padding: 2%;">
  <legend>Evaluaciones Otorrinolaringologicas</legend>
  <table id="example4" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evaoto)>0):?>
      <tr>
        <?php
          foreach ($evaoto as $evaoto):
            $nombre=$evaoto->NOM_USU.' '.$evaoto->APA_USU.' '.$evaoto->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoto->FEC_OTO)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoto->FEC_OTO)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>
  </div>
  <div id="menu4" class="tab-pane fade">
<fieldset style="background-color:#EBBFBF; padding: 2%;">
  <legend>Recetas</legend>
  <table id="example5" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($recetas)>0):?>
      <tr>
        <?php
          foreach ($recetas as $receta):
            $nombre=$receta->NOM_USU.' '.$receta->APA_USU.' '.$receta->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receta->FEC_REC)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receta->FEC_REC)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>
  </div>
    <div id="menu5" class="tab-pane fade">
<fieldset style="background-color:#BFCDEB; padding: 2%;">
  <legend>Laboratorios</legend>
  <table id="example6" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">


  </tbody>
</table>
</fieldset>
  </div>
  </div>
</div>
<!--	<fieldset style="background-color:#BFD8EB; font-size: 15px; padding: 2%;"><legend>Evaluaciones Medicas</legend>
	<table id="example" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evamedi)>0):?>
      <tr>
        <?php
          foreach ($evamedi as $evamed):
            $nombre=$evamed->NOM_USU.' '.$evamed->APA_USU.' '.$evamed->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evamed->FEC_MED)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evamed->FEC_MED)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><a target="_blank" href="{{ url('/pacientes/'.$id.'/histmedica/'.$evamed->id) }}" class="btn btn-success"><span class="fa fa-file-text"></span></a></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>!-->
<!--<fieldset style="background-color:#EBD7BF; padding: 2%;">
	<legend>Evaluaciones Psicologicas</legend>
	<table id="example3" class="table table-hover" style="float:left; font-size:12px;">
  <thead>
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evapsi)>0):?>
      <tr>
        <?php
          foreach ($evapsi as $evapsico):
            $nombre=$evapsico->NOM_USU.' '.$evapsico->APA_USU.' '.$evapsico->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evapsico->FEC_PSI)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evapsico->FEC_PSI)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><a target="_blank" href="{{ url('/pacientes/'.$id.'/histpsico/'.$evapsico->id) }}" class="btn btn-success"><span class="fa fa-file-text"></span></a></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>!-->
<!--<fieldset style="background-color:#C2EBBF; padding: 2%;">
	<legend>Evaluaciones Oftalmologicas</legend>
	<table id="example2" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evaoft)>0):?>
      <tr>
        <?php
          foreach ($evaoft as $evaoft):
            $nombre=$evaoft->NOM_USU.' '.$evaoft->APA_USU.' '.$evaoft->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoft->FEC_OFT)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoft->FEC_OFT)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>!-->
<!--<fieldset style="background-color:#E6BFEB; padding: 2%;">
	<legend>Evaluaciones Otorrinolaringologicas</legend>
	<table id="example4" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($evaoto)>0):?>
      <tr>
        <?php
          foreach ($evaoto as $evaoto):
            $nombre=$evaoto->NOM_USU.' '.$evaoto->APA_USU.' '.$evaoto->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoto->FEC_OTO)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$evaoto->FEC_OTO)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>!-->
<!--<fieldset style="background-color:#EBBFBF; padding: 2%;">
	<legend>Recetas</legend>
	<table id="example5" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
      <?php if(count($recetas)>0):?>
      <tr>
        <?php
          foreach ($recetas as $receta):
            $nombre=$receta->NOM_USU.' '.$receta->APA_USU.' '.$receta->AMA_USU;
          ?>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receta->FEC_REC)->format('d-m-Y');?></th>
            <th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$receta->FEC_REC)->format('H:i:s');?></th>
            <th><?php echo $nombre; ?></th>
            <th><span class="fa fa-glass"></span></th>
    </tr>
        <?php endforeach; endif;

      ?>

  </tbody>
</table>
</fieldset>!-->
<!--<fieldset style="background-color:#BFCDEB; padding: 2%;">
	<legend>Laboratorios</legend>
	<table id="example6" class="table table-hover" style="float:left; font-size:12px;">
  <thead >
    <tr>
      <th width="20%">Fecha de evaluacion</th>
      <th width="30%">Hora</th>
      <th width="20%">Medico de turno</th>
      <th data-orderable="false" width="5%">Ver</th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">


  </tbody>
</table>
</fieldset>!-->

@stop
