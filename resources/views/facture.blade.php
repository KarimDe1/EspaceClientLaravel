<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }
        .invoice-box {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            background-color: #fff;
        }
        .invoice-box table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-box table td, .invoice-box table th {
            padding: 10px;
            vertical-align: top;
            border: 1px solid #ddd;
        }
        .invoice-box table th {
            background-color: #f9f9f9;
        }
        .logo {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table class="table">
            <tr class="table-light">
                <td colspan="2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="title">
                            <!-- Your Company Logo -->
                            
                        </div>
                        <div class="text-right">
                            <h4>Facture #:</h4>
                            <p>{{ $facture->numero_facture }}</p>
                            <h4>Date:</h4>
                            <p>{{ $facture->created_at }}</p>
                            <h4>Échéance:</h4>
                            <p>{{ $facture->echeance }}</p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="table-light">
                <td colspan="2">
                    <h4>Informations Client:</h4>
                    <p><strong>Client ID:</strong> {{ $facture->client_id }}</p>
                    <p><strong>Prise en Charge:</strong> {{ $facture->prise_en_charge }}</p>
                </td>
            </tr>
            <tr class="table-primary">
                <th>Description</th>
                <th>Montant</th>
            </tr>
            <tr>
                <td>Montant à Payer</td>
                <td>{{ $facture->montant_a_payer }}</td>
            </tr>
            <tr>
                <td>Reste à Payer</td>
                <td>{{ $facture->reste_a_payer }}</td>
            </tr>
            <tr class="table-primary">
                <td></td>
                <td><strong>Total:</strong> {{ $facture->montant_a_payer }}</td>
            </tr>
        </table>
        <div class="text-center">
            <p class="text-muted">Merci pour votre entreprise !<br>
            Si vous avez des questions concernant cette facture, veuillez contacter [nom, téléphone, e-mail]</p>
        </div>
    </div>
</body>
</html>
