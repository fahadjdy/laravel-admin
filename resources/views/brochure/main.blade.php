<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead, tfoot {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        tbody {
            display: table-row-group;
        }

        thead tr, tfoot tr {
            background-color: red;
            text-align: center;
        }

        thead td, tfoot td {
            padding: 10px;
            font-weight: bold;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        @media print {
            @page {
                size: A4;
                margin: 20mm 10mm;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <table>
        
        @include('brochure.header')

        <tbody>
            <tr>
                <td>
                    <h1>This is Main Content</h1>
                    <h1>This is main</h1>
      
                    <p>1.</p>
                    ..
                    <p>50. </p>
                </td>
            </tr>
        </tbody>

       @include('brochure.footer')
    </table>
</body>
</html>
