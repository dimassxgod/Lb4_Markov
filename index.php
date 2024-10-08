<?php
// Display PHP configuration
phpinfo();

// Function to display data from a CSV file in a table format
function displayCSVAsTable($filename) {
    // Check if the file exists
    if (!file_exists($filename) || !is_readable($filename)) {
        echo "File not found or is not readable.";
        return;
    }

    // Open the CSV file
    $file = fopen($filename, "r");

    // Start HTML table
    echo "<h2>Data from CSV</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Name</th><th>Age</th><th>Email</th></tr>";

    // Loop through the file and print each row as a table row
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach ($data as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    // End HTML table
    echo "</table>";

    // Close the file
    fclose($file);
}

// Call the function to display the CSV file
displayCSVAsTable("data.csv");
?>
