<?php


$imageDir = 'imgs'; 
$images = array_diff(scandir($imageDir), array('.', '..'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScenicQuest</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <style>
        
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1000; 
            left: 0; 
            top: 0; 
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0, 0, 0, 0.4); 
        }
        .modal-content {
            background-color: #fff; 
            margin: 15% auto; 
            padding: 20px; 
            border: 1px solid #888; 
            width: 300px; 
            text-align: center; 
            border-radius: 10px;
        }
        .image-gallery {
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center; 
        }
        .image-box { 
            margin: 10px; 
        }
        .image-box img { 
            width: 200px; 
            height: auto; 
            border-radius: 5px; 
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); 
        }
        footer {
            text-align: center; 
            padding: 20px; 
            background-color: #f1f1f1; 
        }
    </style>
</head>

<body>
    <div id="loginPopup" class="modal">
        <div class="modal-content">
            <h2>Login to ScenicQuest</h2>
            <form id="loginForm" action="login.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
                <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
            </form>
        </div>
    </div>

    <div id="mainContent" style="display:none;">
        
        <section class="travel-options">
            <h2>Explore Our Destinations</h2>
            <div class="image-gallery">
                <?php foreach ($images as $image): ?>
                    <div class="image-box">
                        <img src="<?php echo $imageDir . '/' . $image; ?>" alt="Travel destination">
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

       
        <footer>
            <div class="footer-content">
                <p>&copy; 2024 ScenicQuest. All rights reserved.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        
        window.onload = function() {
            document.getElementById('loginPopup').style.display = 'block';
        };

        
        document.getElementById('loginForm').onsubmit = function(event) {
            event.preventDefault(); 

            document.getElementById('loginPopup').style.display = 'none';
            document.getElementById('mainContent').style.display = 'block';
        };
    </script>

    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>
