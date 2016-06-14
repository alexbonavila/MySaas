<?php
namespace App\Http\Controllers;
use DOMPDF;
use App\Http\Requests;
use Response;
use View;
class PDFController extends Controller
{
    public function invoiceHtml()
    {
        $data = $this->getData();
        return view('receipt',$data);
    }
    public function downloadInvoice(array $data)
    {
        if (! defined('DOMPDF_ENABLE_AUTOLOAD')) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
        }
        if (file_exists($configPath = base_path().'/vendor/dompdf/dompdf/dompdf_config.inc.php')) {
            require_once $configPath;
        }
        $dompdf = new Dompdf();
        $dompdf->load_html($this->view($this->getData())->render());
        $dompdf->render();
        return $this->download($dompdf->output());
    }

    /**
     * Create an invoice download response.
     *
     * @param $pdf
     * @return \Symfony\Component\HttpFoundation\Response
     * @internal param array $data
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
    /**
     * Get the View instance for the invoice.
     *
     * @param  array  $data
     * @return \Illuminate\View\View
     */
    public function view(array $data)
    {
        return View::make('receipt', $data);
    }
    private function getData()
    {
        $descriptions = ["description1", "description2"];
        $subscriptions = [15, 125, 37, 241];
        $data = [
            'vendor' => 'PROVA',
            'user' => 'Alex Bonavila',
            'email' => 'alexbonavila@iesebre.com',
            'name' => 'Alex Bonavila',
            'product' => 'Producte1',
            'descriptions' => $descriptions,
            'subscriptions' => $subscriptions,
            'hasDiscount' => true,
            'discount' => "20%",
            'tax_percent' => "23%",
            'tax' => "456"
        ];
        return $data;
    }
}