<?php 
session_start();
if ($_SESSION['loggedIn'] == true) {
    ;
} else {
    header('Location: index.php');
}


$query = "SELECT employees.emp_id AS ID,
                 CONCAT(first_name, ' ', last_name) AS 'NAME',
                 DATE_FORMAT(dob, '%D %M, %Y') AS 'DOB',
                 nationality,
                 IF(gender='m', 'male', 'female') AS 'gender',
                 CONCAT(address, ' ', city, ' ', postcode) AS 'address',
                 email,
                 CONCAT(mobile_num, '\n', IFNULL(landline_num, '')) AS 'contact number',
                 NI_number AS 'NI number',
                 DATE_FORMAT(start_date, '%D %M, %Y') AS 'Start date',
                 passport_num AS 'passport number',
                 tax_code AS 'Tax code',
                 IF(is_selfemployed='y', 'yes', 'no') AS 'Self-employed',
                 emergency_contact AS 'Emergency_contact',
                 is_enrolled_in_pension AS 'Pension'
          FROM people
          INNER JOIN employees ON people.person_id = employees.person_id
          INNER JOIN nurses ON employees.emp_id = nurses.emp_id
          ORDER BY employees.emp_id;";

$connection = mysqli_connect('localhost', $_SESSION['user'], $_SESSION['password'], 'tma_db');
$result = mysqli_query($connection, $query);
$all_property = array();

?>

<!DOCTYPE html>
<html>
<body class="blue darken-2 has-fixed-navbar">

    <?php include('templates/header.php') ?>
    <?php include('templates/sidenav.php') ?>

    <main>
        <div class="table-wrapper teal lighten-2" style="overflow-x: scroll">
            <table class="responsive-table highlight">
                <thead class="centered teal lighten-1">
                    <?php 
                        echo '<tr>';
                        while ($property = mysqli_fetch_field($result)) {
                            echo '<td>' . $property->name . '</td>';
                            array_push($all_property, $property->name);
                        }
                        echo '</tr>';
                    ?>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            foreach ($all_property as $item) {
                                echo '<td>' . $row[$item] . '</td>'; 
                            }
                            echo '</tr>';
                        }
                        echo "</table>";

                        mysqli_free_result($result);
                        mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php include('templates/footer.php') ?>

</body>
</html>