<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Facturacion;
use App\FacturasRubros;

use Carbon\Carbon;

use Excel;

class MorososController extends Controller
{
    public function vencidas()
    {
    	$facturaciones = FacturasRubros::all();
    	$fecha = Carbon::now();

    	foreach ($facturaciones as $key => $facturas) 
    	{
    		
    		$fechaExp = Carbon::createFromFormat('Y-m-d', $facturas->rubro->fecha);

    		//--------------------------------- SI TIENE ALGUN PAGO DE RUBRO ---------------------------------//

    		if(!empty($facturas->realizados()->get()->last())) 
    		{
    			if($facturas->realizados()->get()->last()->monto_adeudado > 0)
    			{

		    		if($fecha >= $fechaExp)
		    		{
			    		if($fecha->diffInDays($fechaExp) <= 5)
			    		{
			    			$facturacionesVencidas[] = $facturas;
			    			$vencidos[] = $fecha->diffInDays($fechaExp);
			    		}
		    		}
	    		}
    		} else {

    			if($fecha >= $fechaExp)
		    	{
			    	if($fecha->diffInDays($fechaExp) <= 5)
			    	{
			    		$facturacionesVencidas[] = $facturas;
			    		$vencidos[] = $fecha->diffInDays($fechaExp);
			    	}
		    	}
    		}
    	}

    	return view('facturaciones.morosos.index', compact('facturacionesVencidas', 'vencidos'));
    }

    public function porvencer()
    {	
    	$facturaciones = FacturasRubros::all();
    	$fecha = Carbon::now();

    	foreach ($facturaciones as $key => $facturas) 
    	{
    		$fechaExp = Carbon::createFromFormat('Y-m-d', $facturas->rubro->fecha);

    		if(!empty($facturas->realizados()->get()->last())) 
    		{
    			if($facturas->realizados()->get()->last()->monto_adeudado > 0)
    			{
		    		if($fecha <= $fechaExp)
				    {
				    	$facturacionesxVencer[] = $facturas;
			    		$xvencer[] = $fecha->diffInDays($fechaExp);
				    }
				}

			} else {

    			if($fecha <= $fechaExp)
		    	{
			    	if($fecha->diffInDays($fechaExp) <= 5)
			    	{
			    		$facturacionesxVencer[] = $facturas;
			    		$xvencer[] = $fecha->diffInDays($fechaExp);
			    	}

		    	} else {

		    		$facturacionesxVencer = array();
		    	}
    		}
    	}

    	return view('facturaciones.morosos.index2', compact('facturacionesxVencer', 'xvencer'));
    }

    public function adeudados()
    {
    	$facturaciones = FacturasRubros::all();

    	foreach ($facturaciones as $key => $facturas) 
    	{
    		if($facturas->realizados()->exists())
    		{

    			if($facturas->realizados()->get()->last()->monto_adeudado > 0)
    			{
    				$adeudados[] = $facturas->factura()->orderBy('id_estudiante', 'DESC')->first();
    				$deuda[] = $facturas->realizados()->get()->last()->monto_adeudado;
    			}

    		} else {

    			$adeudados[] = $facturas->factura()->orderBy('id_estudiante', 'DESC')->first();
    			$deuda[] = 0;
    		}
    	}

    	Excel::create("LISTADO TOTAL DE CLIENTES ADEUDADOS", function ($excel) use ($adeudados, $deuda) {

	            $excel->setTitle("Listado Total de Morosos");
	            $excel->sheet("Pestaña 1", function ($sheet) use ($adeudados, $deuda) 
	            {
	            	$sheet->loadView('facturaciones.excel.descargarAdeudados')->with('adeudados', $adeudados)
	            															  ->with('deuda', $deuda);
	            });

        })->download('xls');
    }
}
