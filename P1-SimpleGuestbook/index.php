<!doctype html>
<html>
<head>
  <title>Simple Guestbook</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 20px;
      color: #333;
    }

    h1, h2 {
      text-align: center;
      color: #2c3e50;
    }

    form {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
      width: 95%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    textarea {
      resize: vertical;
      height: 80px;
    }

    button {
      background: #3498db;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 15px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #2980b9;
    }

    .messages {
      max-width: 550px;
      margin: 30px auto;
    }

    .message-box {
      background: #fff;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    .message-box strong {
      color: #2c3e50;
      font-size: 15px;
    }

    .message-box p {
      margin: 5px 0 10px;
      line-height: 1.4;
    }

    .message-box img {
      max-width: 120px;
      border-radius: 8px;
      margin-top: 10px;
      display: block;
    }
  </style>
</head>
<body>
  <h1>Guestbook</h1>

  <!-- Form -->
  <form action="save.php" method="post" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="message">Message:</label>
    <textarea name="message" required></textarea>

    <label for="image">Upload Image (optional):</label>
    <input type="file" name="image">

    <button type="submit">Post</button>
  </form>

  <div class="messages">
    <h2>Messages</h2>
    <?php
    $file = "data.csv";
    if (file_exists($file)) {
        if (($handle = fopen($file, "r")) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                $name = htmlspecialchars($row[0]);
                $message = htmlspecialchars($row[1]);
                $image = $row[2];

                echo "<div class='message-box'>";
                echo "<strong>$name</strong>";
                echo "<p>$message</p>";
                if ($image != "") {
                    echo "<img src='uploads/$image'>";
                }
                echo "</div>";
            }
            fclose($handle);
        }
    } else {
        echo "<p>No Guest yet.</p>";
    }
    ?>
  </div>
</body>
</html>
