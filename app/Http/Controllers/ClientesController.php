<?php

namespace Darsalud\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Darsalud\Http\Requests;
use Darsalud\Http\Controllers\Controller;
use Darsalud\Paciente;
use Darsalud\Producto;
use Darsalud\Reserva;
use Activity;
use Darsalud\Especialidad;
use Darsalud\User;
use Darsalud\Ticket;
use Carbon\Carbon;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->NIV_USU==3){
        return view('index');
        }
        elseif(Auth::user()->NIV_USU==2){
          $reservas= Reserva::join('ticket','ticket.id','=','ID_TIC')->join('pacientes','pacientes.id','=','ticket.ID_PAC')->join('users','users.id','=','ticket.ID_MED')->where('EST_TIC','!=',2)->where('FEC_RES','>=',Carbon::now()->toDateString())->where('ID_MED','=',Auth::user()->id)->get();
        return view('indexmed')->with('reservas',$reservas);
        }
        elseif(Auth::user()->NIV_USU==1){
        return view('administrador.indexadmin');
        }
    }

    public function index3()
    {
          $pacientes = Paciente::OrderBy('updated_at','DESC')->get();
           $actividades = Activity::users(600)->get();
           $especialidades = Especialidad::where('TIP_ESP','=',1)->get();
            $especialidades2 = Especialidad::where('TIP_ESP','=',2)->get();
            $medicos = User::where('NIV_USU','=',2)->get();
           return view('registropacientes2')->with('pacientes',$pacientes)->with('actividades',$actividades)->with('especialidades',$especialidades)->with('especialidades2',$especialidades2)->with('medicos',$medicos);
    }
    public function factura()
    {
        return view('factura');
    }
    public function farmacia()
    {
        $productos= Producto::get();
        return view('farmacia')->with('productos',$productos);
    }
     public function reservas()
    {
        if(Auth::user()->NIV_USU==3):
        $reservas= Reserva::join('ticket','ticket.id','=','ID_TIC')->join('pacientes','pacientes.id','=','ticket.ID_PAC')->join('users','users.id','=','ticket.ID_MED')->where('EST_TIC','!=',2)->get();
        return view('reserva')->with('reservas',$reservas);
        endif;
        if(Auth::user()->NIV_USU==2):
            $reservas= Reserva::join('ticket','ticket.id','=','ID_TIC')->join('pacientes','pacientes.id','=','ticket.ID_PAC')->join('users','users.id','=','ticket.ID_MED')->where('EST_TIC','!=',2)->where('ID_MED','=',Auth::user()->id)->get();
        return view('reservamed')->with('reservas',$reservas);
        endif;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function laboratorios()
      {
          $id = $_POST['id'];
          $productos = Laboratorios::where('ID_CAT','=',$id)->get();
          $i=1;

          $html2 ='
          <table id="example2" class="display table table-hover"  >
      <thead>
          <tr class="info">
              <th><label class="label label-success">Titulo</label> </th>
              <th><label class="label label-primary">Precio</label></th>
              <th><label class="label label-danger">Agregar</label></th>
          </tr>
      </thead>';
      foreach ($productos as $producto) {
          $html2=$html2.'<tr><td>'.$producto->TIT_ART.'</td>'.'<td>'.$producto->PRE_ART.' Bs.</td>'.'<td><a href="#" onclick="javascript:agregavalor('."'".$producto->TIT_ART."',"."'".$producto->PRE_ART."','".$producto->id."'".')" data-dismiss="modal" class="btn btn-success btn-circle btn-lg2"><i class="fa fa-plus"></i></a></td></tr>';
      }

      $html2=$html2.'</table>';
      echo "<script type='text/javascript' language='javascript' class='init'>";
           echo "function elimina(data)";
           echo "{";
           echo "$('#'+data+'"."').remove();";
            echo "var yea=document.getElementById('tabla').rows.length;";
            echo "var total=0;";
            echo "var name3 = 'sub_pro[]';";
            echo "var campo=document.getElementsByName(name3);";

            echo "for (i = 0; i < yea; i++) { ";
            echo "total = total + parseFloat(campo[i].value);";
            echo "}";
            echo "$('#total').val('+total+')";
           echo "}";

      echo "</script>";
          echo "<script type='text/javascript' language='javascript' class='init'>";
          echo "$(document).ready(function() {";
          echo "$('#example2').DataTable();";
          echo "});";
           echo "</script>";
           echo "<script type='text/javascript' language='javascript' class='init'>";
           echo "var cont=0;";
          echo 'function agregavalor(data1,data2,data3){';
          echo "cont++;";
          echo "var name = 'pre_pro[]';";
          echo "var name2 = 'can_pro[]';";
          echo "var name3 = 'sub_pro[]';";
          echo 'var fila="<tr id=fila"+cont+" ><td>"+data1+" <input  type="+"hidden"+" name="+"idproducto"+"[] value="+data3+"></td><td><input type='."'text' readonly='yes' class='form-control' ".'value="+data2+" name="+"pre_pro"+"[]></td><td><input required class="+"form-control"+" type="+"number"+" id="+"can_pro"+" min="+"1"+" name="+"can_pro"+"[]></td><td class="+"info"+"><input class="+"form-control"+" readonly="+"yes"+" type="+"number"+" name="+"sub_pro"+"[]></td><td><button type="+"button"+" class='."'btn btn-danger btn-circle btn-lg2' "."onclick=javascript:elimina('fila".'"+cont+"'."') title='Eliminar'><i class='fa fa-minus'></i></button>'".'</td></tr>";

              $('."'#tabla'".').append(fila);';
          echo "$('#idproducto').val(data3);";
          echo "$('#producto').val(data1);";
          echo "$('#pre_pro').val(data2);";

             echo "var yea=document.getElementById('tabla').rows.length;";
      echo "yea--;";
      echo "var total=0;";
      echo "var campo=document.getElementsByName(name3);";
       echo "var precio=document.getElementsByName(name);";
      echo "var cantidad=document.getElementsByName(name2);";
      echo "$(document.getElementsByName('can_pro[]')).change(function(){";
      echo "for (i = 0; i < yea; i++) { ";
      echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
      echo "}";
      echo"});";
      echo "$(document.getElementsByName('can_pro[]')).change(function(){";
          echo "var total=0;";
      echo "for (i = 0; i < yea; i++) { ";
      echo "  total = total + parseFloat(campo[i].value);";
      echo "}";
      $abc='"<div class=';
      $abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
      $abc3='"+total+"';
      $abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
      $abc5='";';
      echo "document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
      echo"});";

      echo '}';

          echo "</script>";

       //   dd($html2);
          echo $html2;


      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
