<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $numero_facture ?? '' }} - Cabinet Ouassi Expert</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
            color: #333;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            border-bottom: 2px solid #16A085;
            padding-bottom: 20px;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #2C3E50;
        }

        .logo span {
            color: #16A085;
        }

        .info-box {
            border: 1px solid #eee;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .info-box p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
        }

        th {
            background-color: #16A085;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .total-section {
            float: right;
            width: 300px;
            margin-top: 20px;
        }

        .total-table {
            width: 100%;
            border-collapse: collapse;
        }

        .total-table td {
            padding: 8px;
            text-align: right;
            border: none;
        }

        .total-table tr:last-child {
            border-top: 2px solid #16A085;
            font-weight: bold;
            font-size: 14px;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 10px;
            text-align: center;
            color: #777;
        }

        .title {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
            color: #2C3E50;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .client-info {
            margin-bottom: 30px;
        }

        .client-info p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
@php
        if (isset($facture)) {
            $numero_facture = $facture->numero_facture;
            $date_facture = $facture->date_facture;
            $client = $facture->client;
            $mode_paiement = $facture->mode_paiement;
            $articles = $facture->articles;
            $total_ht = $articles->sum(fn($article) => $article->pivot->quantite * $article->prix_ht);
            $tva = $total_ht * 0.20;
            $total_ttc = $total_ht + $tva;
        }
    @endphp

    <!-- En-tête -->
    <div class="header">
        <div class="logo">
            <span>Cabinet</span> Ouassi Expert
        </div>
        
        <div class="info-box">
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($date_facture)->format('d/m/Y') }}</p>
            <p><strong>Facture N° :</strong> {{ $numero_facture }}</p>
            <p><strong>Mode de paiement :</strong> {{ ucfirst($mode_paiement) }}</p>
        </div>
    </div>

    <!-- Titre -->
    <div class="title">Facture</div>

    <!-- Informations client -->
    <div class="client-info">
        <h3 style="margin-bottom: 10px; color: #2C3E50;">Client :</h3>
        <p><strong>Nom :</strong> {{ $client->nom }}</p>
        <p><strong>ICE :</strong> {{ $client->ICE }}</p>
       
        
        <p><strong>Téléphone :</strong> {{ $client->telephone }}</p>
       
    </div>

    <!-- Détails des articles -->
    <table>
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Prix HT (dh)</th>
                <th>Quantité</th>
                <th>Total HT (dh)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->designation }}</td>
                    <td>{{ number_format($article->prix_ht, 2, ',', ' ') }}</td>
                    <td>
                        {{ isset($article->pivot) ? $article->pivot->quantite : $article->quantite }}
                    </td>
                    <td>
                        {{ number_format(
                            $article->prix_ht * (isset($article->pivot) ? $article->pivot->quantite : $article->quantite),
                            2, ',', ' '
                        ) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Totaux -->
    <div class="total-section">
        <table class="total-table">
            <tr>
                <td>Total HT :</td>
                <td>{{ number_format($total_ht, 2, ',', ' ') }} dh</td>
            </tr>
            <tr>
                <td>TVA (20%) :</td>
                <td>{{ number_format($tva, 2, ',', ' ') }} dh</td>
            </tr>
            <tr>
                <td>Total TTC :</td>
                <td>{{ number_format($total_ttc, 2, ',', ' ') }} dh</td>
            </tr>
        </table>
    </div>

    <!-- Pied de page -->
    <div class="footer">
        <p>Cabinet Ouassi Expert - {{ \Carbon\Carbon::now()->format('Y') }}</p>
        <p>Merci pour votre confiance</p>
    </div>

</body>
</html>