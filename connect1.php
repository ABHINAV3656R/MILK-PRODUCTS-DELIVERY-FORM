<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect POST data safely
    $your_name = $_POST['name'] ?? '';
    $your_email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    $subject = $_POST['subject'] ?? '';

    // Connect to the MySQL database
    $conn = new mysqli('localhost', 'root', 'hema@4925', 'addre');

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Updated table name to 'contact_form'
        $stmt = $conn->prepare("INSERT INTO contact_form(`your name`, `your email`, message, subject) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $your_name, $your_email, $message, $subject);

        // Execute and give feedback
        if ($stmt->execute()) {
            echo "✅ Contact submitted successfully.";
        } else {
            echo "❌ Error submitting contact: " . $stmt->error;
        }

        // Close connection
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Form not submitted.";
}
?>
                    