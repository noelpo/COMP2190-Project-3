<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $constituency = filter_var($_POST['constituency'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $years = filter_var($_POST['years'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $hidden = $_POST['hidden'];

        if(($firstname !== "") && ($lastname !== "") && ($constituency !== "") && ($email !== "") && ($years !== "") && ($password !== "") && ($confirmpassword !== "")){
            
            if($password === $confirmpassword) {
                $regex = "/^[a-zA-Z-. ]+$/";
                
                if(preg_match($regex, $firstname)){
                    
                    if(preg_match($regex, $lastname)){
                  
                        if(preg_match($regex, $constituency)) {
                            $emailRegex = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
                  
                            if(preg_match($emailRegex, $email)){
                  
                                if(($years <= 50) && ($years >= 1)) {

                                    require_once 'phpmysqlconnect.php';
                                    $salt = mt_rand();
                                    $passworddigest = md5($password . strval($salt));
                                    $conn->query("INSERT INTO Representatives (first_name, last_name, constituency, email, yrs_service, salt, password_digest) VALUES ('$firstname', '$lastname', '$constituency', '$email', '$years','$salt', '$passworddigest')");
                                    $stmt = $conn->query("SELECT * FROM Representatives");
                                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
                                    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

                                        <head>
                                            <title>CS 2190 Project 3, Problem 1</title>
                                            <!--<link rel="stylesheet" type="text/css" href="../styles/p1a.css" /> -->
                                            <!--<link rel="stylesheet" type="text/css" href="styles/p1b.css" /> -->
                                        </head>
                                        <body>
                                            <div id="frame">
                                                <table>
                                                    <tr id="heading">
                                                        <th class="left-align">First Name</th>
                                                        <th class="left-align">Last Name</th>
                                                        <th class="left-align">Constituency</th>
                                                        <th class="center">Email</th>
                                                        <th class="center">Hash</th>
                                                        <th class="center">Years of Service</th>
                                                    </tr>

                                                    <?php
                                                        $totalYears = 0;
                                                        foreach($results as $row) {
                                                            $firstname = $row['first_name'];
                                                            $lastname = $row['last_name'];
                                                            $constituency = $row['constituency'];
                                                            $email = $row['email'];
                                                            $hash = $row['password_digest'];
                                                            $years = $row['yrs_service'];
                                                            $totalYears += $years;
                                                            echo "<tr>";
                                                            echo "<td class=\"left-align\">$firstname</td>";
                                                            echo "<td class=\"left-align\">$lastname</td>";
                                                            echo "<td class=\"left-align\">$constituency</td>";
                                                            echo "<td class=\"center hover\">$email</td>";
                                                            echo "<td class=\"center\">$hash</td>";
                                                            echo "<td class=\"center\">$years</td>";
                                                            echo "</tr>";
                                                        }

                                                        echo"<tr id=\"lastrow\">";
                                                        echo"<td class=\"left-align\">Total</td>";
                                                        echo"<td></td>";
                                                        echo"<td></td>";
                                                        echo"<td></td>";
                                                        echo"<td></td>";
                                                        echo"<td class=\"center\">$totalYears</td>";
                                                        echo"</tr>";
                                                    ?>                    
                                                </table>
                                            </div>
                                        </body>

                                    </html>

<?php                                    
                                } 
                  
                            } 
                  
                        }

                    }
                }
                
            }
        }
    }
?>


