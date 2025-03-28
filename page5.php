<?php
$items = [
    ["src" => "images/SSB Pickle.jpg", "alt" => "SSB Pickle", "name" => "SSB Pickle", "price" => "$1.5", "link" => "https://playerok.com/products/730ce9be6bc7-shiny-sparklingbig-sea-pickle-rick", "description" => "Shiny sparkling sea pickle - rare and valuable!"],
    ["src" => "images/Sparkling Nuclear A Megolodon.jpg", "alt" => "Sparkling Nuclear Megolodon", "name" => "Sparkling Nuclear Megolodon", "price" => "$3", "link" => "https://playerok.com/products/ef60d6e377ba-sparkling-nuclearancient-megalodon", "description" => "Powerful nuclear ancient Megalodon, highly sought after!"]
];
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Shop - Fisch</title>
    <style>
        body {
            text-align: center;
            background: linear-gradient(135deg, #89f7fe, #c254d3);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position: absolute;
            top: 0;
            left: 0;
        }
        .main-button, .button {
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            background: white;
            border: 1px solid black;
            border-radius: 5px;
            transition: 0.3s;
            color: black;
        }
        .main-button:hover, .button:hover {
            background: #66a6ff;
            color: white;
        }
        .items-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 800px;
        }
        .item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 200px;
            text-align: center;
            position: relative;
        }
        img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        .info-box {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            width: 250px;
        }
        .info-box.left {
            left: 20px;
        }
        .info-box.right {
            right: 20px;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a {
            margin: 5px;
            padding: 10px 15px;
            text-decoration: none;
            border: 1px solid black;
            background: white;
            border-radius: 5px;
            transition: 0.3s;
            color: black;
        }
        .pagination a:hover {
            background: #66a6ff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="mainpage.php" class="main-button">Main</a>
    </div>

    <h1>Item Shop - Fisch</h1>
    <div class="items-container">
        <?php foreach ($items as $index => $item): ?>
            <div class="item" onmouseover="showInfo('info<?= $index ?>')" onmouseout="hideInfo('info<?= $index ?>')">
                <h2><?= $item['name'] ?></h2>
                <img src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>">
                <p>Price: <?= $item['price'] ?></p>
                <a href="<?= $item['link'] ?>" class="button">Buy</a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php foreach ($items as $index => $item): ?>
        <div id="info<?= $index ?>" class="info-box <?= $index % 2 == 0 ? 'left' : 'right' ?>">
            <h3><?= $item['name'] ?></h3>
            <p><?= $item['description'] ?></p>
        </div>
    <?php endforeach; ?>

    <div class="pagination">
        <a href="page2.php">1</a>
        <a href="page3.php">2</a>
        <a href="page4.php">3</a>
        <a href="page5.php">4</a>
    </div>

    <script>
        function showInfo(id) {
            document.getElementById(id).style.display = 'block';
        }
        function hideInfo(id) {
            document.getElementById(id).style.display = 'none';
        }
    </script>
</body>
</html>
