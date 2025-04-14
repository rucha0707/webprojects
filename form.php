<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Booking Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f4fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        .book-btn {
            width: 100%;
            padding: 12px;
            background-color: aquamarine;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .book-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="form-container">
        <h2>Tour Booking Form</h2>
        
        <?php
        
        $servername = "localhost"; 
        $username = "root"; 
        $password = "kara@1829711"; 
        $dbname = "world"; 

      
        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $stmt = $conn->prepare("INSERT INTO form (name, email, contact, tourType,destination) VALUES (?, ?, ?, ?,?)");
            $stmt->bind_param("sssss", $name, $email, $contact, $tourType,$destination);

            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $tourType = $_POST['tourType'];
            $destination = $_POST['destination'];
          
           if ($tourType === 'solo') {
            $stmt = $conn->prepare("SELECT s.pid, s.samount 
                                     FROM solo AS s
                                     JOIN main_tour1 AS m ON s.pid = m.pid 
                                     WHERE m.dest = ?");
        } else {
            $stmt = $conn->prepare("SELECT g.pid, g.gamount 
                                     FROM tgroup AS g
                                     JOIN main_tour1 AS m ON g.pid = m.pid 
                                     WHERE m.dest = ?");
        }
    $stmt->bind_param("s", $destination);
    $stmt->execute();
    if ($stmt->error) {
        die("SQL Error: " . $stmt->error);
    }
    $result = $stmt->get_result();

  
    $pid = null;
    $amount = null;

   
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc();
        $pid = $tour['pid']; 
        if ($tourType === 'solo') {
            $amount = $tour['samount']; 
        } else {
            $amount = $tour['gamount']; 
        }
    } else {
        echo "No tours found for the selected destination and tour type.";
        exit; 
    }

      
      $stmt = $conn->prepare("INSERT INTO bookings (name, email, contact, tour_type, destination, amount, pid) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssss", $name, $email, $contact, $tourType, $destination, $amount, $pid);
  
      

            if ($stmt->execute()) {
                echo  header("Location: confirmation.php?name=" . urlencode($name) . "&email=" . urlencode($email) . "&contact=" . urlencode($contact) . "&tourType=" . urlencode($tourType). "&destination=" . urlencode($destination) . "&pid=" . urlencode($pid) . "&amount=" . urlencode($amount));
                exit; 
            } else {
                echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }
       
        
        $conn->close();
        ?>

        <form id="bookingForm" method="POST" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" name="contact" placeholder="Enter your contact number" required>
            </div>

            <div class="form-group">
                <label for="tourType">Tour Type</label>
                <select id="tourType" name="tourType" required>
                    <option value="" disabled selected>Select tour type</option>
                    <option value="solo">Solo Tour</option>
                    <option value="group">Group Tour</option>
                </select>
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <select id="destination" name="destination" required>
                    <option value="" disabled selected>Select destination</option>
                    <option value="bangkok">bangkok</option>
                    <option value="rome">Rome</option>
                    <option value="new_york">New York</option>
                    <option value="tokyo">Tokyo</option>
                    <option value="rishikesh">Rishikesh</option>
                    <option value="pondicherry">Pondicherry</option>
                    <option value="switzerland">Switzerland</option>
                    <option value="mussoorie">Mussoorie</option>
                    <option value="turkey">Turkey</option>
                    <option value="kerala">Kerala</option>
                    <option value="paris">Paris</option>
                    <option value="jaipur">Jaipur</option>
                    <option value="goa">Goa</option>
                    <option value="tokyo">Tokyo</option>
                    <option value="leh_ladakh">Leh Ladakh</option>
                    <option value="sydney">Sydney</option>
                    <option value="agra">Agra</option>
                    <option value="kolkata">Kolkata</option>
                    <option value="cape_town">Cape Town</option>
                    <option value="manali">Manali</option>
                    <option value="dubai">Dubai</option>
                    <option value="hyderabad">Hyderabad</option>
                    <option value="rio_de_janeiro">Rio de Janeiro</option>
                    <option value="varanasi">Varanasi</option>
                    <option value="moscow">Moscow</option>

                </select>
            </div>


            <button type="submit" class="book-btn">Confirm Booking and Pay</button>
        </form>
        
    </div>

    <script>
        document.getElementById("bookingForm").addEventListener("submit", function (e) {
            
            alert("Booking Successful!");
        });
    

    </script>
    
</body>
</html>
    