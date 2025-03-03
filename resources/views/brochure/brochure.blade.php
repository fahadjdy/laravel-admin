<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>PDF Template</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
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
        
        <thead style="border:1px solid #dee2e6">
            <tr>
                <td>
                @include('brochure.header')
                </td>
            </tr>
        </thead>    
        <tbody>
            <tr>
                <td>
                    @include('brochure.main')
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    @include('brochure.footer')
                </td>
            </tr>
        </tfoot>

    </table>
</body>
</html>
