<?php
$items = [
    ["src" => "images/ssg nessie.png", "alt" => "SSG Nessie", "name" => "SSG Nessie"],
    ["src" => "images/ssbs Nessie.png", "alt" => "SSBS Nessie", "name" => "SSBS Nessie"],
    ["src" => "images/SSG Ancient Orca.png", "alt" => "SSG Ancient Orca", "name" => "SSG Ancient Orca"],
    ["src" => "images/SSG Kraken.png", "alt" => "SSG Kraken", "name" => "SSG Kraken"],
    ["src" => "images/SSB Pickle.jpg", "alt" => "SSB Pickle", "name" => "SSB Pickle"],
    ["src" => "images/SSGM Phantom Meg.png", "alt" => "SSGM Phantom Meg", "name" => "SSGM Phantom Meg"],
    ["src" => "images/Sparkling Nuclear A Megolodon.jpg", "alt" => "Nuclear Megalodon", "name" => "Nuclear Megalodon"],
    ["src" => "images/SSM Sea Mine.png", "alt" => "SSM Sea Mine", "name" => "SSM Sea Mine"]
];
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mystyle.css">
    <title>Item Shop - Fisch</title>
    <style>
        body {
            text-align: center;
            background: url('images/fisch1.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
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
        .main-button, .explore-button {
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            background: white;
            border: 1px solid black;
            border-radius: 5px;
            transition: 0.3s;
        }
        .main-button:hover, .explore-button:hover {
            background: #66a6ff;
            color: white;
        }
        .welcome-message {
            margin-top: 80px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 600px;
        }
        .footer {
            position: absolute;
            bottom: 20px;
            text-align: center;
            font-size: 14px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 5px;
        }
        .carousel-container {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .carousel {
            width: 220px;
            overflow: hidden;
            position: relative;
            background: rgba(122, 0, 0, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            padding: 10px;
        }
        .carousel-item {
            display: none;
            text-align: center;
            padding: 10px;
        }
        .carousel-item.active {
            display: block;
            animation: fadeIn 1s;
        }
        .carousel-item img {
            width: 100%;
            border-radius: 5px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="mainpage.php" class="main-button">Main</a>
    </div>
    <div class="welcome-message">
        <h1>Welcome to Fisch Item Shop</h1>
        <p>Best and rarest fish you can find.</p>
        <a href="page2.php" class="explore-button">Explorează</a>
    </div>
    
    <div class="carousel-container">
        <?php foreach (array_chunk($items, 4) as $index => $group) : ?>
            <div class="carousel" id="carousel-<?= $index ?>">
                <?php foreach ($group as $key => $item) : ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <img src="<?= $item['src'] ?>" alt="<?= $item['alt'] ?>">
                        <h3><?= $item['name'] ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="footer">
        <p>&copy; <?= date('Y') ?> Item Shop - Fisch. Toate drepturile rezervate.</p>
    </div>
    
    <script>
        function startCarousel(carouselId) {
            let index = 0;
            const items = document.querySelectorAll(`#${carouselId} .carousel-item`);
            setInterval(() => {
                items[index].classList.remove('active');
                index = (index + 1) % items.length;
                items[index].classList.add('active');
            }, 3000);
        }
        
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".carousel").forEach((carousel, idx) => {
                startCarousel(`carousel-${idx}`);
            });
        });
    </script>
</body>
</html>
