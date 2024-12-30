<?php
$email = $name = $gender = $selected_courses = $groupNumber = $classDetails=$agreeErr = " ";
$nameErr = $emailErr = $genderErr = '';


if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
       
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $nameErr = "Only letters and white space allowed in name";
            $name = "";  // Reset the name variable if the validation fails
        }
        else
        $name = $_POST["name"];
     
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        
    }

    // Group number (optional)
    if (!empty($_POST['groupNumber'])) {
        $groupNumber = $_POST["groupNumber"];
      
    }

    // Class details (optional)
    if (!empty($_POST['ClassDetails'])) {
        $classDetails = $_POST["ClassDetails"];
  
    }

    // Gender validation
    if (empty($_POST["Gender"])) {
        $genderErr = "Gender is required";
        echo $genderErr . "<br>";
    } else {
        $gender = $_POST["Gender"];
  
    }

    // Selected courses
    if (!empty($_POST['courses'])) {
        $selected_courses = $_POST['courses'];
    }

    // Agree checkbox validation
    if (empty($_POST["agree"])) {
        $agreeErr="You must agree to the terms";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AAST_BIS Class Registration</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Application name: AAST_BIS Class Registration</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="AAST_Form">
        <table>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="name"  value="<?php echo htmlspecialchars($name); ?> ">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?> ">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Group:</td>
                <td>
                    <input type="text" name="groupNumber" value="<?php echo htmlspecialchars($groupNumber); ?>">
                </td>
            </tr>
            <tr>
                <td>Class Details:</td>
                <td>
                    <textarea rows="6" cols="40" name="ClassDetails"> <?php echo htmlspecialchars($classDetails); ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" name="Gender" value="Female" required <?php if ($gender == "Female") echo "checked"; ?>>
                    <label>Female</label>
                    <input type="radio" name="Gender" value="Male" required <?php if ($gender == "male") echo "checked"; ?>>
                    <label>Male</label>
                    <span class="error">* <?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>Selected Courses:</td>
                <td>
                    <select name="courses[]" id="courses" multiple size="4" >
                        <option value="php">PHP</option>
                        <option value="javascript">JavaScript</option>
                        <option value="python">Python</option>
                        <option value="java">Java</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Agree:</td>
                <td>
                    <input type="checkbox" name="agree" id="agree" <?php echo isset($_POST['agree']) ? 'checked' : ''; ?>  >
                    <label for="agree">I agree to the terms and conditions</label>
                    <span class="error">*<?php echo $agreeErr; ?></span>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
<?php


if ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($name) && !empty($_POST["email"]) && !empty($_POST["Gender"]) && !empty($_POST["agree"])) {
    echo "<h1>Your giving values are as :</h1>";
   
    if (!empty($_POST["name"])) {
        echo "Name: " . htmlspecialchars($name) . "<br>";
    
    }

   
    if (!empty($_POST["email"])) {
        echo "Email: " . htmlspecialchars($email) . "<br>";
    }

    
    if (!empty($_POST['groupNumber'])) {
     
        echo "Group: " . htmlspecialchars($groupNumber) . "<br>";
    }

    
    if (!empty($_POST['ClassDetails'])) {
       
        echo "Class Details: " . htmlspecialchars($classDetails) . "<br>";
    }

   
    if (!empty($_POST["Gender"])) {
     
        echo "Gender: " . htmlspecialchars($gender) . "<br>";
    }

   
    if (!empty($_POST['courses'])) {
        $selected_courses = $_POST['courses'];
        echo "You selected the following courses: ";
        echo implode(", ", $selected_courses) . "<br>";
    } else {
        echo "No courses selected.<br>";
    }

   
}





?>