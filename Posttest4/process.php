<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Results</title>
    <style>
        /* Styles for the pop-up box */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $password = $_POST["password"];

        // Check if the password is correct (you can replace this with your own validation logic)
        $correctPassword = "your_password_here";

        if ($password === $correctPassword) {
            echo "<h2>Form Submission Results:</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Age: $age</p>";

            // Display the success pop-up
            echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    var modal = document.createElement('div');
                    modal.className = 'modal';
                    var modalContent = document.createElement('div');
                    modalContent.className = 'modal-content';
                    modalContent.innerHTML = 'Sign-in successful!';
                    modal.appendChild(modalContent);
                    document.body.appendChild(modal);

                    // Close the modal when clicking outside of it
                    modal.addEventListener('click', function () {
                        modal.style.display = 'none';
                    });

                    // Show the modal
                    modal.style.display = 'block';
                });
            </script>";
        } else {
            echo "<p>Incorrect password. Access denied.</p>";
        }
    }
    ?>
</body>
</html>
