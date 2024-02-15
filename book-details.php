<?php 
include 'database.inc.php';

$dbConnection = setConnectionInfo();
$sqlquery = "SELECT * FROM $database.Books WHERE ID=$_GET[bookid]";
$result = $dbConnection->query($sqlquery);

$book = $result->fetch(PDO::FETCH_ASSOC);
   
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

      <div class="col-md-10">  <!-- start main content column -->
        
         <!-- book panel  -->
         <div class="panel panel-danger spaceabove">           
           <div class="panel-heading"><h4>Book Details</h4></div>
           
           <table class="table">
             <tr>
               <th>Cover</th>
               <td><?php echo "<img src=\"./images/tinysquare/" . $book["ISBN10"] . ".jpg\">";?></td>
             </tr>            
             <tr>
               <th>Title</th>
               <td><em><?php echo $book["Title"]; ?></em></td>
             </tr>    
             <tr>
               <th>Authors</th>
               <td>
              <?php 
              //gets Author id assigned to this book id
              $authorsSQLQuery = "SELECT * FROM $database.BookAuthors WHERE BookId=$_GET[bookid]";
              $authorsResult = $dbConnection->query($authorsSQLQuery);
              
              while($authors = $authorsResult->fetch(PDO::FETCH_ASSOC)){
                
              //gets authors assigned to author id's
              $authorsSQLQuery = "SELECT * FROM $database.Authors WHERE ID=$authors[Id]";
              $printResult = $dbConnection->query($authorsSQLQuery);
              $print = $printResult->fetch(PDO::FETCH_ASSOC);
              
              echo "$print[FirstName] $print[LastName]<br>";
              
              }
              
              
              ?>
               </td>
             </tr>   
             <tr>
               <th>ISBN-10</th>
               <td><?php echo $book["ISBN10"]; ?></td>
             </tr>
             <tr>
               <th>ISBN-13</th>
               <td><?php echo $book["ISBN13"]; ?></td>
             </tr>
             <tr>
               <th>Copyright Year</th>
               <td><?php echo $book["CopyrightYear"]; ?></td>
             </tr>   
             <tr>
               <th>Instock Date</th>
               <td>
               <?php echo $book["LatestInstockDate"]; ?>
               </td>
             </tr>              
             <tr>
               <th>Trim Size</th>
               <td><?php echo $book["TrimSize"]; ?></td>
             </tr> 
             <tr>
               <th>Page Count</th>
               <td><?php echo $book["PageCountsEditorialEst"]; ?></td>
             </tr> 
             <tr>
               <th>Description</th>
               <td><?php echo $book["Description"]; ?></td>
             </tr> 
             <tr>
               <th>Sub Category</th>
               <td><?php 
               
               $categorySQLQuery = "SELECT * FROM $database.Subcategories WHERE ID=$book[SubcategoryID]";
               $categoryResult = $dbConnection->query($categorySQLQuery);

               
               while($category = $categoryResult->fetch(PDO::FETCH_ASSOC)){
                   
                   echo "$category[SubcategoryName]";
                 
               }
               
               ?></td>
             </tr>
             <tr>
               <th>Imprint</th>
               <td><?php 
               $imprintSQLQuery = "SELECT * FROM $database.Imprints WHERE ID=$book[ImprintID]";
               $imprintResult = $dbConnection->query($imprintSQLQuery);
               
               while($imprint = $imprintResult->fetch(PDO::FETCH_ASSOC)){
                   
                   echo "$imprint[Imprint]";
                   
               }
               
               ?></td>
             </tr>   
             <tr>
               <th>Binding Type</th>
               <td><?php 
               $bindingTypeSQLQuery = "SELECT * FROM $database.BindingTypes WHERE ID=$book[BindingTypeID]";
               $bindingTypeResult = $dbConnection->query($bindingTypeSQLQuery);
               
               while($bindingType = $bindingTypeResult->fetch(PDO::FETCH_ASSOC)){
                   
                   echo "$bindingType[BindingType]";
                   
               }
               ?></td>
             </tr> 
             <tr>
               <th>Production Status</th>
               <td><?php 
               $ProductionStatusSQLQuery = "SELECT * FROM $database.ProductionStatuses WHERE ID=$book[ProductionStatusID];";
               $ProductionStatusResult = $dbConnection->query($ProductionStatusSQLQuery);
               
               while($productionStatus = $ProductionStatusResult->fetch(PDO::FETCH_ASSOC)){
                   
                   echo "$productionStatus[ProductionStatus]";
                   
               }
               ?></td>
             </tr>              
           </table>

         </div>           
      </div>



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