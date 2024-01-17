<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process personal information
    $fullName = $_POST["fullName"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];

    // Process address information
    $homeAddress = $_POST["homeAddress"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipCode = $_POST["zipCode"];

    // Process contact information
    $contactNumber = $_POST["contactNumber"];
    $email = $_POST["email"];

    // Process parent/guardian information
    $parentName = $_POST["parentName"];
    $parentContact = $_POST["parentContact"];

    // Process academic information
    $currentGrade = $_POST["currentGrade"];
    $currentSchool = $_POST["currentSchool"];

    // Process educational background
    $academicAchievements = $_POST["academicAchievements"];

    // Process extracurricular activities
    $extracurricularActivities = $_POST["extracurricularActivities"];

    // Process short answer questions
    $whyJoin = $_POST["whyJoin"];
    $goals = $_POST["goals"];

    // Handle file upload (profile picture)
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if ($check === false) {
        echo "Error: File is not a valid image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profilePicture"]["size"] > 500000) {
        echo "Error: File is too large.";
        $uploadOk = 0;
    }

    // Allow only specific image file formats
    $allowedFormats = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Error: File was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
            echo "Application submitted successfully!";
            // Save form data to a database or perform additional actions as needed
        } else {
            echo "Error: There was an error uploading your file.";
        }
    }
} else {
    echo "Error: Invalid request method.";
}
?>
