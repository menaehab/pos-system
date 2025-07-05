<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
require_once(base_path('I18N/Arabic.php'));

class LabelController extends Controller
{
    public function print($slug)
    {
        try {
            $product = Product::where('slug', $slug)->firstOrFail();

            $barcode = new \Milon\Barcode\DNS1D();

            $arabic = new \I18N_Arabic('Glyphs');

            // Share helper to blade
            view()->share('thisText', function ($text) use ($arabic) {
                $text = mb_convert_encoding($text, 'UTF-8', 'auto');
                return $arabic->utf8Glyphs($text);
            });

            $pdf = Pdf::loadView('prints.label', compact('product', 'barcode'));

            return $pdf->stream($product->name . '.pdf');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
