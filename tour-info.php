<?php

$servername = "localhost";  
$username = "root";        
$password = "kara@1829711"; 
$dbname = "world";          


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$tour = [];


$destination = isset($_GET['location']) ? $_GET['location'] : '';


if ($destination) {
    $stmt = $conn->prepare("SELECT * FROM main_tour1 WHERE dest = ?"); // Updated 'dest' column
    $stmt->bind_param("s", $destination);
    $stmt->execute();
    $result = $stmt->get_result();

   
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc();
    } else {
        echo "No details available for " . htmlspecialchars($destination) . ".";
        exit;
    }
    $stmt->close();
}


$destinations = [];
$query = "SELECT dest FROM main_tour1";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $destinations[] = $row['dest'];
    }
}
$conn->close();
?>
<style> 
body {
  background-color: #e0f7fa; 
  font-family: Arial, sans-serif;
  color: #333;
  margin: 0;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}


.tour-selection, .tour-info {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 20px;
  max-width: 800px;
  width: 100%;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  margin-bottom: 20px;
}

h2 {
  color: #00796b; 
}

select, button {
  padding: 10px;
  margin: 10px 0;
  font-size: 16px;
  width: 100%;
  border: 1px solid #b2dfdb;
  border-radius: 5px;
  outline: none;
}


button {
  background-color: #00796b;
  color: #ffffff;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #004d40;
}


.book-button {
  display: inline-block;
  margin-top: 15px;
  padding: 10px 20px;
  background-color: #00d0ff;
  color: #ffffff;
  text-decoration: none;
  font-size: 16px;
  font-weight: bold;
  border-radius: 5px;
  text-align: center;
  transition: background-color 0.3s;
}

.book-button:hover {
  background-color: #00a2cc;
}


img {
  width: 100%;
  max-width: 700px;
  border-radius: 10px;
  margin-top: 15px;
}

</style> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Selection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tour-selection">
        <h2>Select a Tour Destination</h2>
        <form action="" method="GET">
            <label for="location">Choose a destination:</label>
            <select name="location" id="location" required>
                <option value="">--Select a destination--</option>
                <?php foreach ($destinations as $dest): ?>
                    <option value="<?php echo htmlspecialchars($dest); ?>" <?php echo $dest === $destination ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($dest); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Get Tour Details</button>
        </form>
    </div>

    <?php if (!empty($tour)): ?>
        <div class="tour-info">
            <h2><?php echo htmlspecialchars($tour['dest']); ?> Tour</h2>
            <p><strong>Start Date:</strong> <?php echo htmlspecialchars($tour['sdate']); ?></p>
            <p><strong>End Date:</strong> <?php echo htmlspecialchars($tour['edate']); ?></p>
            <p><strong>Duration:</strong> <?php echo htmlspecialchars($tour['duration']); ?> days</p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($tour['tdescription']); ?></p>
            <p><strong>Guide:</strong> <?php echo htmlspecialchars($tour['tguide']); ?></p>
            <p><strong> <img src="<?php echo htmlspecialchars($tour['img']); ?>" alt="<?php echo htmlspecialchars($tour['dest']); ?> Image" style="width:100%; max-width:600px;">
            
       <br> <a href="form.php" class="book-button" >Book</a>
      

        </div>
    <?php endif; ?>
</body>
</html>
