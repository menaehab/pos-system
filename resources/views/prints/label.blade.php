<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $product->name }}</title>
    <style>
        @font-face {
            font-family: 'arabic';
            src: url('{{ storage_path('fonts/Amiri-Regular.ttf') }}') format('truetype');
        }

        @media print {
            body {
                margin: 0;
            }
        }

        .label {
            width: 200px;
            height: 100px;
            border: 1px solid #000;
            padding: 10px;
            font-family: 'arabic', Arial, sans-serif;
            font-size: 12px;
            text-align: center;
        }

        .barcode {
            margin-top: 5px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="label">
        <strong>{{ $product->name }}</strong><br>
        {{ __('keywords.pound') }} {{ number_format($product->sell_price, 2) }}
        <div class="barcode">
            {!! $barcode->getBarcodeHTML($product->barcode, 'C128') !!}
        </div>
    </div>
</body>

</html>
