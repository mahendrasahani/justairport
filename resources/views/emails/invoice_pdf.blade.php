<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Details</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Helvetica, Arial, sans-serif;
            line-height: 1.5;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        .content {
            width: 65%;
            margin: 4rem auto;
            padding: 20px;
            
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }

        .text_align {
            text-align: center;
        }

        .header {
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            padding: 2rem;
        }

        .header img {
            max-width: 100%;
            height: auto;
        }

        .verification-code {
            background: #00466a;
            margin: 20px auto;
            width: max-content;
            padding: 0 10px;
            color: #fff;
            border-radius: 4px;
            display: inline-block;
            text-align: center;
        }

        .footer {
            font-size: 0.9em;
        }

        .footer hr {
            border: none;
            border-top: 1px solid #eee;
        }

        .row {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .col-6 {
            display: table-cell;
            width: 50%;
            padding: 8px 0;
        }
    </style>
</head>

<body>
    <table class="container" role="presentation" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <table class="content" role="presentation" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="header text_align">
                            <a href="#">
                                <img src="{{url('public/assets/backend/images/brand_logo.png')}}" alt="Brand Logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:3rem; padding-bottom: 2rem; ">
                            <div class="row">
                                <p class="col-12">Account Name: {{$invoice_pdf_data['account_name'] ?? ''}}</p>
                                <p class="col-12">Account Number: {{$invoice_pdf_data['account_number'] ?? ''}}</p>
                                <p class="col-12">Invoice Date: {{$invoice_pdf_data['invoice_date'] ?? ''}}</p>
                                <p class="col-12">Due Date: {{ \Carbon\Carbon::parse($invoice_pdf_data['invoice_date'])->addMonth()->format('d/m/Y') }}</p>
                             </div> 
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
</body>

</html>