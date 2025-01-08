<?php

// Prompt the user for a reason
echo "Why do you want to uninstall the RJ Geo Locator package? Please provide a reason: ";
$reason = trim(fgets(STDIN));

// Display the user's reason
echo "You said: $reason\n";

// Confirm the uninstall
echo "Are you sure you want to uninstall the 'iamraghavan/rj-geo-locator' package? (yes/no): ";
$confirmation = trim(fgets(STDIN));

if (strtolower($confirmation) === 'yes') {
    // Run the composer command to remove the package
    echo "Removing the package...\n";
    $output = shell_exec('composer remove iamraghavan/rj-geo-locator');

    // Display the result of the composer command
    echo $output;

    // Optionally, you can perform additional cleanup tasks (e.g., removing config files, assets)
    echo "RJ Geo Locator package has been uninstalled successfully!\n";
} else {
    echo "Uninstall process canceled.\n";
}
