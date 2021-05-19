<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "select * from student";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table border='1'>";
      $data['content'] .= "<tr><th colspan='11' align='center'>Student Information</th></tr>";
      $data['content'] .= "<tr><th>Check</th><th>Student ID</th><th>DOB</th><th>First Name</th><th>Last Name</th><th>Address</th><th>Town</th><th>County</th><th>Country</th><th>Postcode</th><th>Student Photo</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td><input type='checkbox' name='checkbox[]' </td><td> $row[studentid] </td><td> $row[dob] </td><td> $row[firstname] </td><td> $row[lastname] </td><td> $row[house] </td><td> $row[town] </td><td> $row[county] </td><td> $row[country] </td><td> $row[postcode] </td>";
      }
      $data['content'] .= "</table>";
      $data['content'] .= "<br><input type='submit' value='Delete' name='delete'/>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>