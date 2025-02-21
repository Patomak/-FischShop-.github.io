# -FischShop-.github.io
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazin de Iteme - Fishing Roblox</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Magazin de Iteme - Fishing Roblox</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Imagine</th>
            <th>Preț (Robux)</th>
            <th>Comandă</th>
        </tr>
        <tr>
            <td>Undiță Epică</td>
            <td><img src="undita.png" alt="Undiță Epică" width="100"></td>
            <td>500</td>
            <td><a href="comanda.html">Cumpără</a></td>
        </tr>
        <tr>
            <td>Barcă Rapidă</td>
            <td><img src="barca.png" alt="Barcă Rapidă" width="100"></td>
            <td>1200</td>
            <td><a href="comanda.html">Cumpără</a></td>
        </tr>
    </table>

    <h2>Hartă Magazin</h2>
    <img src="harta.png" usemap="#shopmap" alt="Harta Magazin">
    <map name="shopmap">
        <area shape="rect" coords="10,10,100,100" href="undiță.html" alt="Undiță">
        <area shape="rect" coords="120,10,220,100" href="barcă.html" alt="Barcă">
    </map>
</body>
</html>
