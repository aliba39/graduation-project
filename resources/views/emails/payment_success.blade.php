<!-- resources/views/emails/payment_success.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>إيصال الدفع</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
        }
        .header img {
            max-width: 150px;
        }
        .header h1 {
            margin: 10px 0;
            color: #333;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            line-height: 1.6;
            color: #555;
        }
        .details {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }
        .details th, .details td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .details th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            padding: 20px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
        .footer p {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('path_to_logo.png') }}" alt="شعار الشركة">
            <h1>إيصال الدفع</h1>
        </div>
        <div class="content">
            <p>عزيزي/عزيزتي {{ $user->name }},</p>
            <p>شكرًا لدفعك. تمت عملية الدفع بنجاح. فيما يلي تفاصيل عملية الدفع:</p>
        </div>
        <table class="details">
            <tr>
                <th>الوصف</th>
                <td>{{ $offerName }}</td>
            </tr>
            <tr>
                <th>المبلغ</th>
                <td>${{ number_format($amountInUsd / 100, 2) }}</td>
            </tr>
            <tr>
                <th>تاريخ العملية</th>
                <td>{{ now()->format('Y-m-d H:i:s') }}</td>
            </tr>
            <tr>
                <th>البريد الإلكتروني للعميل</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
        <div class="footer">
            <p>أطيب التحيات،<br>{{ config('app.name') }}</p>
            <p>إذا كان لديك أي استفسارات، لا تتردد في الاتصال بنا على البريد الإلكتروني: support@example.com.</p>
        </div>
    </div>
</body>
</html>
