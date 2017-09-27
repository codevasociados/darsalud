<?php

namespace Darsalud\Http\Controllers;

use Illuminate\Http\Request;

use Darsalud\Http\Requests;
use Darsalud\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use TCPDF;
use PDF;
use Darsalud\Paciente;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function pdflaboratorios(Request $request,$id)
    {
    //  $receta=new Receta;
    //  $receta->DES_REC=$request->input('rec_med');
    //  $receta->ID_PAC=$id;
    //  $receta->FEC_REC=Carbon::now();

  /*      if(isset($_POST['finreceta'])){
          $receta->save();
          $pacientes= Paciente::find($id);
          $evamedi=Evamedi::where('ID_PAC','=',$id)->join('users','ID_USU','=','users.id')->select('FEC_MED','evaluacionmedica.id','NOM_USU','APA_USU','AMA_USU')->get();
          $evapsi=EvaPsico::where('ID_PAC','=',$id)->join('users','ID_MED','=','users.id')->select('FEC_PSI','evaluacionpsicologica.id','NOM_USU','APA_USU','AMA_USU')->get();
          $evaoto=EvaOto::where('ID_PAC','=',$id)->join('users','ID_MED','=','users.id')->select('FEC_OTO','evaluacionotorrino.id','NOM_USU','APA_USU','AMA_USU')->get();
          $evaoft=EvaOftalmo::where('ID_PAC','=',$id)->join('users','ID_MED','=','users.id')->select('FEC_OFT','evaluacionoftalmo.id','NOM_USU','APA_USU','AMA_USU')->get();
          $recetas=Receta::where('ID_PAC','=',$id)->join('users','ID_MED','=','users.id')->select('FEC_REC','recetas.id','NOM_USU','APA_USU','AMA_USU')->get();
          return redirect()->route('pacientes/{id}',['id'=>$id])->with('pacientes',$pacientes)->with('id',$id)->with('evamedi',$evamedi)->with('evapsi',$evapsi)->with('evaoto',$evaoto)->with('evaoft',$evaoft)->with('recetas',$recetas);
        }else{*/
        $pagelayout = array('165', '216');
        $pdf = new TCPDF('P','mm',$pagelayout, true, 'UTF-8', false);
        $pdf->SetTitle('LABORATORIOS');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetAutoPageBreak(TRUE, 10);
        $pdf->SetMargins(15, 15, 10);
        $pdf->AddPage();
        $pdf->Image('img/logo.png', 140, 2, 25, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);
        $pdf->Image('img/laboratorio.png', 2, 2, 20, 25, 'PNG', '', '', true, 250, '', false, false, false, false, false, false);
        $pdf->SetFont('','B','15');
        $pdf->SetXY(65, 8);
        $pdf->Write(0,'Laboratorios','','',false);
        $pdf->SetFont('','B','12');
        $pdf->SetXY(52, 17);
        $pdf->Write(0,'Centro de salud - DARSALUD','','',false);
        $pdf->SetFont('','B','11');
        $pdf->SetXY(10, 30);
        $pdf->Write(0,'Paciente:','','',false);


        $paciente=Paciente::where('id','=',$id)->first();

        $nom=$paciente->NOM_PAC.' '.$paciente->APA_PAC.' '.$paciente->AMA_PAC;
        $pdf->SetXY(30, 30);
        $pdf->SetFont('','','10');
        $pdf->Write(0,ucwords(strtolower($nom)),'','',false);

        $pdf->SetFont('','B','11');
        $pdf->SetXY(10, 35);
        $pdf->Write(0,'Medico:','','',false);

        $pdf->SetXY(25, 45);
        $pdf->SetFont('','','8');
        $pdf->Write(0,Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU,'','',false);

        $pdf->SetXY(10, 55);
        $pdf->SetFont('','B','14');
        $pdf->Write(0,'R.f.','','',false);

        $pdf->SetXY(10, 65);
        $pdf->SetFont('','','10');
        $pdf->MultiCell(150, 10,'', 0, 'L', 0, 0, '', '', true);

        $pdf->write2DBarcode ( 'Paciente :'.$paciente->NOM_PAC.' '.$paciente->APA_PAC.' '.$paciente->AMA_PAC.' | Medico: '.Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU.' | Fecha:'.'', 'QRCODE,M', 80, 135, 20, 20, '','','');


        $pdf->Output('Receta.pdf');
  //    }
    }
    public function pdfhistoriabasica()
    {

    }
    public function pdf()
    {

    }

    public function dmedica($id)
    {
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
