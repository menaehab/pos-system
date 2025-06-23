<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
require_once(base_path('I18N/Arabic.php'));

class InvoiceController extends Controller
{
    public function print($sale_id)
    {
        try {
            $sale = Sale::with('saleItems.product')->findOrFail($sale_id);
            $printFee = env('PRINT_FEE', 0.00);
            $finalTotal = $sale->total_price + $printFee;

            $arabic = new \I18N_Arabic('Glyphs');

            // Share helper to blade
            view()->share('thisText', function ($text) use ($arabic) {
                $text = mb_convert_encoding($text, 'UTF-8', 'auto');
                return $arabic->utf8Glyphs($text);
            });

            $pdf = Pdf::loadView('invoices.pdf', compact('sale', 'printFee', 'finalTotal'));

            return $pdf->stream($sale->invoice_number . '.pdf');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
