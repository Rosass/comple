<?php namespace App\Controllers\Escolares;

use Vendor\autoload;
use App\Controllers\BaseController;
use Dompdf\Dompdf;

class GenerarController extends BaseController
{
    protected $generarService;

     function __construct()
    {
        $this->generarService = new \App\Services\Escolares\GenerarService();
        //parent::__construct();
        helper('utilerias_helper');
    }  


	public function constanciaParcial()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ESCOLARES)
        {
        
        $control = $this->request->getPost("control");
        $folio = $this->request->getPost('folio');
        $alumno = $this->generarService->getAlumnoPorNoControl($control);
        $actividades = $this->generarService->getActividad($control);


        $dompdf = new Dompdf();
    
        $dompdf->loadHtml (view('Escolares/Generar/index', [
            'alumno' => $alumno,
            'folio' => $folio,
            'control' => $control,
            'actividades' => $actividades
            ]));
        $dompdf->setPaper('letter', 'portrait');
		// Se renderiza el HTML como PDF
		$dompdf->render();
        // Se muestra el PDF generado en el Browser
        $canvas = $dompdf->getCanvas();

        $w = $canvas->get_width();
        $h = $canvas->get_height();

        $imageURL = 'public/img/estado.png';
        $imgWidth = 450;
        $imgHeight = 440;

        $canvas->set_opacity(0.09);

        $x = (($w-$imgWidth)/2);
        $y = (($h-$imgHeight)/2);

        $canvas->image($imageURL,$x,$y,$imgWidth,$imgHeight);
    
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="document.pdf"');
        header('Content-Transfer-Encoding: binary');

        $dompdf->stream("Constancia Parcial -  ".$control." .pdf", array("Attachment" => 0));
        exit();

        }
        else
        {
            return redirect("/");
        }

    }
    
	public function constanciaLiberacion()
	{
        if($this->session->login && $this->session->usuario_logueado->id_tipo_usuario == USUARIO_ESCOLARES)
        {
        
        $control = $this->request->getPost('control');
        $folio = $this->request->getPost('folio');
        $alumno = $this->generarService->getAlumnoPorNoControl($control);
        $actividades = $this->generarService->getActividad($control);
        $calificacion = $this->generarService->calificacion($control);
        $calificacionRows = $this->generarService->calificacionRows($control);
        $promedio = round(((float)$calificacion->valor_numerico / (float)$calificacionRows->valor_numerico), 2);
        $nivel_desempenio = $this->Calcular_nivel_desempeno( $promedio );
    
            $dompdf = new Dompdf();
        
            $dompdf->loadHtml (view('Escolares/Generar/listar', [
                'alumno' => $alumno,
                'folio' => $folio,
                'control' => $control,
                'actividades' => $actividades,
                'calificacion' => $promedio,
                'nivelDesempenio' => $nivel_desempenio
            ]));
            
            $dompdf->setPaper('letter', 'portrait');
            // Se renderiza el HTML como PDF
            $dompdf->render();
            // Se muestra el PDF generado en el Browser
                    
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="document.pdf"');
            header('Content-Transfer-Encoding: binary');

    
            $dompdf->stream("Constancia liberacion- ".$control." .pdf", array("Attachment" => 0));
            exit();
        }
		else
		{
			return redirect("/");
		}
    }
    
    protected function Calcular_nivel_desempeno( $calificacion )
    { $desempeno = '';
        if($calificacion<1){
            $desempeno = 'Insuficiente';
        }else if ($calificacion>1 && $calificacion < 1.50){
            $desempeno = 'Suficiente';
        }else if($calificacion >= 1.50 && $calificacion<2.50){
            $desempeno = 'Bueno';
        }else if($calificacion >= 2.50 && $calificacion<3.50){
            $desempeno = 'Notable';
        }else if ($calificacion >=2.50 && $calificacion <=4){
            $desempeno = 'Excelente';
        }else{
            $desempeno = 'Algo salio mal';
        }
        return $desempeno;
    }
    

}
