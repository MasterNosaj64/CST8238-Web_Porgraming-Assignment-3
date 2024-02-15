<?php 
include 'database.inc.php';
$dbConnection = setConnectionInfo();

switch($_GET["sort"]){
        
    case city:

        $sqlquery = "SELECT * FROM $database.Customers ORDER BY city ASC";
        $result = $dbConnection->query($sqlquery);
        break;
        
    case country:
        
        $sqlquery = "SELECT * FROM $database.Customers ORDER BY country ASC";
        $result = $dbConnection->query($sqlquery);
        break;
        
    default:
    
        $sqlquery = "SELECT * FROM $database.Customers ORDER BY lastName ASC";
        $result = $dbConnection->query($sqlquery);
        break;
}

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

      <div class="col-md-8">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>My Customers</h4></div>
           <table class="table">
             <tr>
               <th><a href=.\customer-list.php?sort=name>Name</a><?php  if($_GET["sort"] == name){ echo "&#11015";}?></th>
               <th>Email</th>
               <th>Address</th>
               <th><a href=.\customer-list.php?sort=city>City</a><?php  if($_GET["sort"] == city){ echo "&#11015";}?></th>
               <th><a href=.\customer-list.php?sort=country>Country</a><?php  if($_GET["sort"] == country){ echo "&#11015";}?></th>
             </tr>
  			 <?php 
             //list of customers
             while($row = $result->fetch(PDO::FETCH_ASSOC)){
                 echo "<tr><td>" . $row["firstName"] . " " . $row["lastName"] .  "</td><td>" . $row["email"] . "</td><td>" . $row["address"] . "</td><td>" . $row["city"] . "</td><td>" . $row["country"] ."</td></tr>";
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
         
         <div class="panel panel-info">
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