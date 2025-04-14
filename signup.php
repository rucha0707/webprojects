<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - ScenicQuest</title>
    <link rel="stylesheet" href="./style.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: aquamarine;
            margin: 0;
            padding: 0;
        }
        .signup-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 { text-align: center; color: #333; }
        label { display: block; margin: 15px 0 5px; color: #555; }
        input[type="email"], input[type="password"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc;
            border-radius: 4px; box-sizing: border-box; font-size: 16px;
        }
        button {
            width: 100%; padding: 10px; background-color: #007BFF; color: white;
            border: none; border-radius: 4px; font-size: 16px; cursor: pointer;
        }
        button:hover { background-color: aquamarine; }
        p { text-align: center; margin-top: 10px; }
        p a { color: #007BFF; text-decoration: none; }
        p a:hover { text-decoration: underline; }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form action="signup_process.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
</body>
</html>