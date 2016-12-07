<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body> 

<div class="container">
  <h2>Feedback Display</h2> 
 
  <div class="panel panel-default"> 
    <table class="table">
      <thead>
        <tr> 
          <th>#</th>
          <th>Module</th>
          <th>Semester</th>
          <th>Text</th>
          <th>Rating</th>
        </tr>
      </thead>
    <tbody>
              
    <?php
      $xml=simplexml_load_file("./data/feedbacks.xml") or die("ERROR: Cannot load feedbacks.xml file.");
              
      $n = 1; // simple counter
              
      foreach($xml->children() as $feedback) {
                
        echo "<tr>"; // beginning of row
        echo "<th scope=\"row\">" . $n . "</th>";
        
        foreach($feedback->children() as $child){
          echo "<td>" . $child . "</td>";
        }
                
        echo "</tr>"; // end of row
        $n++;
      }
              
      ?>
              
      </tbody> 
    </table> 
  </div>
</div>

</body>
</html>