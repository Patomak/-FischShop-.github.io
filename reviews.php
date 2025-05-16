<?php
// Save reviews to file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = htmlspecialchars($_POST['nickname']);
    $email = htmlspecialchars($_POST['email']);
    $review = htmlspecialchars($_POST['review']);
    $rating = (int)$_POST['rating'];

    $entry = [
        'nickname' => $nickname,
        'review' => $review,
        'rating' => $rating
    ];

    $reviews = file_exists('reviews.json') ? json_decode(file_get_contents('reviews.json'), true) : [];
    $reviews[] = $entry;

    file_put_contents('reviews.json', json_encode($reviews));
}

$reviews = file_exists('reviews.json') ? json_decode(file_get_contents('reviews.json'), true) : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fisch Item Shop - Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('images/fisch1.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            color: #333;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .stars {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .stars input[type="radio"] {
            display: none;
        }
        .stars label {
            font-size: 25px;
            color: #ccc;
            cursor: pointer;
        }
        .stars input[type="radio"]:checked ~ label {
            color: gold;
        }
        .stars label:hover,
        .stars label:hover ~ label {
            color: gold;
        }
        .review {
            border-top: 1px solid #ccc;
            padding: 10px 0;
        }
        .stars-display {
            color: gold;
        }
        .main-button {
            position: fixed;
            top: 20px;
            left: 20px;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #333;
            border-radius: 8px;
            color: #333;
            transition: background 0.3s, color 0.3s;
            z-index: 999;
        }
        .main-button:hover {
            background: #3399ff;
            color: white;
        }
    </style>
</head>
<body>
    <a href="index.php" class="main-button">Main</a>
    <div class="container">
        <h1>Leave a Review</h1>
        <form method="POST">
            <input type="text" name="nickname" placeholder="Nickname" required>
            <input type="email" name="email" placeholder="Email (will not be shown)" required>
            <textarea name="review" placeholder="Your review" rows="4" required></textarea>
            <div class="stars">
                <input type="radio" name="rating" value="5" id="star5" required><label for="star5">★</label>
                <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
            </div>
            <button type="submit">Submit Review</button>
        </form>
        <h2>Reviews</h2>
        <?php foreach ($reviews as $entry): ?>
            <div class="review">
                <strong><?= htmlspecialchars($entry['nickname'] ?? 'Anonymous') ?></strong><br>
                <div class="stars-display">
                    <?php
                    $rating = isset($entry['rating']) ? (int)$entry['rating'] : 0;
                    echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
                    ?>
                </div>
                <p><?= htmlspecialchars($entry['review'] ?? '') ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>