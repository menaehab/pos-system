<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">

    <title>{{ $sale->invoice_number }}</title>

    <style>
        @font-face {
            font-family: 'arabic';
            src: url('{{ storage_path('fonts/Amiri-Regular.ttf') }}') format('truetype');
        }

        body {
            font-family: 'arabic', DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 14px;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 10px 0;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="center"><strong>{{ $thisText('نظام الكاشير') }}</strong></div>

    <p>{{ $sale->invoice_number }} :{{ $thisText('رقم الفاتورة') }}</p>
    <p>{{ $sale->created_at->format('Y-m-d H:i:s') }} :{{ $thisText('التاريخ') }}</p>

    <div class="line"></div>

    @foreach ($sale->saleItems as $item)
        <p>{{ $thisText($item->product->name) }}</p>
        <p>{{ number_format($item->quantity * $item->price, 2) }} = {{ number_format($item->price, 2) }} ×
            {{ $item->quantity }}</p>
    @endforeach

    <div class="line"></div>

    <p>ج.م {{ number_format($sale->total_price, 2) }} :{{ $thisText('الإجمالي') }}</p>
    <p>ج.م {{ number_format($printFee, 2) }} :{{ $thisText('رسوم الطباعة') }}</p>
    <p><strong>ج.م {{ number_format($finalTotal, 2) }} :{{ $thisText('الإجمالي النهائي') }}</strong></p>

    <div class="line"></div>

    <p class="center">{{ $thisText('شكراً لتعاملكم معنا') }}</p>

</body>

</html>
