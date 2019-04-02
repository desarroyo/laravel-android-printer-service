<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
//require __DIR__ . '/vendor/autoload.php';

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function print()
    {

    	$connector = new FilePrintConnector("php://stdout");
		$printer = new Printer($connector);
		$printer -> text("Hello World!\n");
		$printer -> cut();
		$printer -> close();

    	return "print";
    }
}
