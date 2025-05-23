<?php
$isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

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

if ($isAjax) {
    foreach ($reviews as $entry) {
        echo '<div class="review">';
        echo '<strong>' . htmlspecialchars($entry['nickname']) . '</strong><br>';
        echo '<div class="stars-display">' . str_repeat('★', $entry['rating']) . str_repeat('☆', 5 - $entry['rating']) . '</div>';
        echo '<p>' . htmlspecialchars($entry['review']) . '</p>';
        echo '</div>';
    }
    exit;
}
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
        #mainButton {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button id="mainButton" onclick="location.href='index.php'">Main</button>
    <div class="container">
        <h1>Leave a Review</h1>
        <form id="reviewForm">
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
        <div id="reviewsContainer">
            <?php foreach ($reviews as $entry): ?>
                <div class="review">
                    <strong><?= htmlspecialchars($entry['nickname']) ?></strong><br>
                    <div class="stars-display">
                        <?= str_repeat('★', $entry['rating']) . str_repeat('☆', 5 - $entry['rating']) ?>
                    </div>
                    <p><?= htmlspecialchars($entry['review']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
    document.getElementById("reviewForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("reviews.php", {
            method: "POST",
            headers: { "X-Requested-With": "XMLHttpRequest" },
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            this.reset();
            loadReviews();
        });
    });

    function loadReviews() {
        fetch("reviews.php", {
            headers: { "X-Requested-With": "XMLHttpRequest" }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById("reviewsContainer").innerHTML = html;
        });
    }

    loadReviews();
    </script>
</body>
</html>
