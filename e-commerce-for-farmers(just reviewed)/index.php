<?php session_start();
error_reporting(0);
include_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
         <script src="js/jquery.min.js"></script>
       <!--  <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    </head>
    <body>
<?php include_once('includes/header.php');?>
        <!-- Header-->
        <header class="py-5" id="top-bg" style="background: url('./assets/banner.jpg'); background-position: top; background-size: cover;">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Only way to grow the country is to empower the farmers </h1>
                    <p class="lead fw-normal text-white-50 mb-0">Buy the most authetic products direct from farmer</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
<?php 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
 
    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
 
    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM products ");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


    $query=mysqli_query($con,"select products.id as pid,products.productImage1,products.productName,products.productPriceBeforeDiscount,products.productPrice from products order by pid desc LIMIT $offset, $total_records_per_page ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="admin/productimages/<?php echo htmlentities($row['productImage1']);?>" width="350" height="300" alt="<?php echo htmlentities($row['productName']);?>" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo htmlentities($row['productName']);?></h5>
                                    <!-- Product price-->
                                    <span class="text-decoration-line-through">&#8377;<?php echo htmlentities($row['productPriceBeforeDiscount']);?></span> - &#8377; <?php echo htmlentities($row['productPrice']);?> 
                                    / K.G
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="product-details.php?pid=<?php echo htmlentities($row['pid']);?>">View options</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
     
    

                </div>
            </div>


 <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
 

 <nav aria-label="Pagination">
                        <hr class="my-0">
<ul class="pagination justify-content-center my-4">
    
    <li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?> class="page-link">Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-link active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'> $counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
 
     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last' class='page-link'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1' class='page-link'>1</a></li>";
        echo "<li><a href='?page_no=2' class='page-link'>2</a></li>";
        echo "<li><a>...</a></li>";
 
        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class="page-link">Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
 
 

</div>
        </section>
        <!-- Footer-->
   <?php include_once('includes/footer.php'); ?>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
