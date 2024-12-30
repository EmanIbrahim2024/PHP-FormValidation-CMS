<?php
    $students = [
        ['name' => 'Alaa', 'email' => 'ahmed@test.com', 'track' => 'PHP'],
        ['name' => 'Shamy', 'email' => 'ali@test.com', 'track' => 'CMS'],
        ['name' => 'Youssef', 'email' => 'basem@test.com', 'track' => 'PHP'],
        ['name' => 'Waleid', 'email' => 'farouk@test.com', 'track' => 'CMS'],
        ['name' => 'Rahma', 'email' => 'hany@test.com', 'track' => 'PHP'],
    ];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PHP Class registration</title>
</head>
<body>
    <h1> Application name: PHP Class registration </h1>
   <table>
        <thead> 
            <tr>
              <th>Name</th>
                <th>E-mail</th>
                <th>Track </th>
            </tr>   
        </theadh>
        <tbody>
            <?php

            foreach($students as $studentInfo)
            {
                if ($studentInfo['track'] === 'CMS') {   
                    echo "<tr>";
                    echo "<td><span style='color:red'>" . htmlspecialchars($studentInfo['name']) . "</span></td>";
                    echo "<td><span style='color:red'>" . htmlspecialchars($studentInfo['email']) . "</span></td>";
                    echo "<td><span style='color:red'>" . htmlspecialchars($studentInfo['track']) . "</span></td>";
                    echo "</tr>";
                } else {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($studentInfo['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($studentInfo['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($studentInfo['track']) . "</td>";
                    echo "</tr>";
                }
                


            }


            ?>


        </tbody>

    


    </table>






















</body>
</html>