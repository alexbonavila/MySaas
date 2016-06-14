<?php
namespace App\Http\Controllers;
use DOMPDF;
use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\Response;
class PDFController extends Controller
{
    public function invoiceHtml()
    {
        if (! defined('DOMPDF_ENABLE_AUTOLOAD')) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
        }
        if (file_exists($configPath = base_path().'/vendor/dompdf/dompdf/dompdf_config.inc.php')) {
            require_once $configPath;
        }
        $dompdf = new DOMPDF;

        $dompdf->load_html("<h1>Hola</h1>");
        $dompdf->render();
        return $this->download($dompdf->output());

    }
    /**
     * Create an invoice download response.
     *
     * @param  array   $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function download($pdf)
    {
        $filename = "hola.pdf";
        return new Response($pdf, 200, [
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'filename="'.$filename.'"',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Type' => 'application/pdf',
        ]);
    }
}