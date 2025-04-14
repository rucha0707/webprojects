<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        h2 {
            color: #00796b; 
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #333;
            line-height: 1.6;
            margin: 10px 0;
        }

     
        img {
            margin-top: 20px;
            border-radius: 10px;
            width: 100%;
            max-width: 300px;
            height: auto;
        }

        .book-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #00796b;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .book-btn:hover {
            background-color: #004d40;
        }

        
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Booking Confirmation</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($_GET['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_GET['email']); ?></p>
        <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($_GET['contact']); ?></p>
        <p><strong>Tour Type:</strong> <?php echo htmlspecialchars($_GET['tourType']); ?></p>
        <p><strong>Destination:</strong> <?php echo isset($_GET['destination']) ? htmlspecialchars($_GET['destination']) : 'Not specified'; ?></p>
        <p><strong>Tour Amount:</strong> <?php echo htmlspecialchars($_GET['amount']); ?></p>
<p><strong>Tour Package ID:</strong> <?php echo htmlspecialchars($_GET['pid']); ?></p>

<img src="imgs/qr.jpg" alt="QR" width="300" height="300" >
      <br>  
        <a href="form.php" class="book-btn">Back to Booking</a>
    </div>
</body>
</html>
