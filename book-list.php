<?php 
include 'database.inc.php';

$dbConnection = setConnectionInfo();



$sqlquery = "SELECT * FROM $database.Books ORDER BY Title ASC";
$result = $dbConnection->query($sqlquery);


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; 
   charset=UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="">
   <meta name="author" content="">
   <title>Book Template</title>

   <link rel="shortcut icon" href="../../assets/ico/favicon.png">   

   <!-- Bootstrap core CSS -->
   <link href="bootstrap3_bookTheme/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap theme CSS -->
   <link href="bootstrap3_bookTheme/theme.css" rel="stylesheet">


   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
   <script src="bootstrap3_bookTheme/assets/js/html5shiv.js"></script>
   <script src="bootstrap3_bookTheme/assets/js/respond.min.js"></script>
   <![endif]-->
</head>

<body>

<?php include 'book-header.inc.php'; ?>
   
<div class="container">
   <div class="row">  <!-- start main content row -->

      <div class="col-md-2">  <!-- start left navigation rail column -->
         <?php include 'book-left-nav.inc.php'; ?>
      </div>  <!-- end left navigation rail --> 

      <div class="col-md-6">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4> </h4></div>
           <table class="table">
             <tr>
               <th>Cover</th>
               <th>ISBN</th>
               <th>Title</th>
             </tr>
             
             <?php 
             //list of books
             while($row = $result->fetch(PDO::FETCH_ASSOC)){
                 echo "<tr><td><img src=\"./images/tinysquare/" . $row["ISBN10"] . ".jpg\"></td><td>" . $row["ISBN10"] . "</td><td><a href=.\book-details.php?bookid=\"$row[ID]\">" .$row["Title"]. "</a></td></tr>";
             }
             ?>
             
             
           </table>
         </div>           
      </div>
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Categories</h4></div>
               <ul class="nav nav-pills nav-stacked">
                  <?php 
					$sqlquery = "SELECT * FROM $database.Subcategories ORDER BY SubcategoryName ASC limit 20";
					$result = $dbConnection->query($sqlquery);
					
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
					    echo "<li>" . $row["SubcategoryName"] . "</li>";
					}
					
					
					?>
             </ul> 
         </div>
                 
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-2">  <!-- start left navigation rail column -->
         <div class="panel panel-info spaceabove">
            <div class="panel-heading"><h4>Imprints</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php 
					$sqlquery = "SELECT * FROM $database.Imprints ORDER BY Imprint ASC";
					$result = $dbConnection->query($sqlquery);
					
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
					    echo "<li>" . $row["Imprint"] . "</li>";
					}
					
					
					?>
             </ul>
         </div>    

         <div class="panel panel-info">
            <div class="panel-heading"><h4>Status</h4></div>
            <ul class="nav nav-pills nav-stacked">
               <?php 
					$sqlquery = "SELECT * FROM $database.ProductionStatuses ORDER BY ProductionStatus ASC";
					$result = $dbConnection->query($sqlquery);
					
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
					    echo "<li>" . $row["ProductionStatus"] . "</li>";
					}
					
					
					?>
             </ul>
         </div>  
         
         <div class="panel panel-info">
            <div class="panel-heading"><h4>Binding</h4></div>
            <ul class="nav nav-pills nav-stacked">
                 <?php 
					$sqlquery = "SELECT * FROM $database.BindingTypes ORDER BY BindingType ASC";
					$result = $dbConnection->query($sqlquery);
					
					while($row = $result->fetch(PDO::FETCH_ASSOC)){
					    echo "<li>" . $row["BindingType"] . "</li>";
					}
					
					
					?>
             </ul>
         </div>           
      </div>  <!-- end left navigation rail -->       


      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end container -->
   


   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_bookTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_bookTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_bookTheme/assets/js/holder.js"></script>
</body>
</html>