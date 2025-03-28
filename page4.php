<?php
$items = [
    ["src" => "images/SSGM Phantom Meg.png", "alt" => "SSGM Phantom Meg", "name" => "SSGM Phantom Meg", "price" => "$8.5", "link" => "https://playerok.com/products/fa3366286512-sparkling-shiny-giant-mythical-phantom-megalodon135000kg", "description" => "A mythical phantom megalodon with sparkling scales, highly prized by expert fishers."],
    ["src" => "images/SSM Sea Mine.png", "alt" => "SSM Sea Mine", "name" => "SSM Sea Mine", "price" => "$3", "link" => "https://playerok.com/products/31b71a9bd54a-shiny-sparklingmythical-sea-mine", "description" => "A rare, sparkling sea mine, known for its explosive charm and stunning look."],
];
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Shop - Page 4</title>
    <style>
        body {
            text-align: center;
            background: linear-gradient(135deg, #830e0e, #02214c);
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
        .item-info {
            display: none;
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            width: 250px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
        .item:hover .item-info {
            display: block;
        }
        .item:nth-child(1):hover .item-info {
            left: 20px;
        }
        .item:nth-child(2):hover .item-info {
            right: 20px;
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
            <div class="item">
                <h2><?= $item['name'] ?></h2>
                <img src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>">
                <p>Price: <?= $item['price'] ?></p>
                <a href="<?= $item['link'] ?>" class="button">Buy</a>
                <div class="item-info">
                    <h3><?= $item['name'] ?></h3>
                    <p><?= $item['description'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <a href="page2.php">1</a>
        <a href="page3.php">2</a>
        <a href="page4.php">3</a>
        <a href="page5.php">4</a>
    </div>
</body>
</html>
