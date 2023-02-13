<?php
    // SELECT * FROM `pagination_table` LIMIT 3 OFFSET 4;

    // SELECT * FROM `pagination_table` LIMIT 4, 3;

    // Create a Database and Table with Dummy Data
    // Create a Database Connection
    // Get the Current Page Number
    // To get the current page number, we will use the $_GET .
    if (isset($_GET['page_no']) && $_GET['page_no']!="") {
        $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
            }


    // SET Total Records Per Page Value
    // You can set any value to total records per page, i am showing only 3 records per page.
    $total_records_per_page = 3;


    // Calculate OFFSET Value and SET other Variables
    // You can see that i have set offset value and calculating the next and previous page number, adjacent is also set here, we will use it soon.
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2";

    // Get the Total Number of Pages for Pagination
    // Now we need to calculate total number of pages for pagination, it depends on how many records we want to display on single page. We already have database connection so now getting the total number of pages and also setting the second last number in the below code.
    $result_count = mysqli_query(
    $con,
    "SELECT COUNT(*) As total_records FROM `pagination_table`"
    );
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total pages minus 1

    // SQL Query for Fetching Limited Records using LIMIT Clause and OFFSET
    // We will use OFFSET and total records per page here, and display these results.
    $result = mysqli_query(
        $con,
        "SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page"
        );
    while($row = mysqli_fetch_array($result)){
        echo "<tr>
         <td>".$row['id']."</td>
         <td>".$row['name']."</td>
         <td>".$row['age']."</td>
         <td>".$row['dept']."</td>
         </tr>";
            }
    mysqli_close($con);
    // This will just create table rows, so make sure that you also created a table header before writing all above PHP scripts, for CSS I am using the bootstrap table, make sure you include bootstrap in your head section.

    // <html>
    // <body>
    //     <table class="table table-striped table-bordered">
    // <thead>
    // <tr>
    // <th style='width:50px;'>ID</th>
    // <th style='width:150px;'>Name</th>
    // <th style='width:50px;'>Age</th>
    // <th style='width:150px;'>Department</th>
    // </tr>
    // </thead>
    // <tbody>
    // <!--
    // All your PHP Script will be here
    // -->
    // </tbody>
    // </table>
    // </body>
    // </html>
    // Showing Current Page Number Out of Total
    // To display your current page number, i am using the following. It should be comes after the end of above table.
    // <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    // <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
    <!-- // </div> -->

    <!-- // Creating Pagination Buttons
    // Now i want your attention because this may be little difficult to understand if you are not focused otherwise it is a piece of cake as this is the main part which plays a vital role. Although in here we can make it simple by just creating a First Page, Next, Previous, and Last Page buttons, but this is not much useful when you have hundred of pages, so user may want to go on page number 50, so user have to click next next next too much. -->

<!-- // But I will show you how can you achieve this, if you want to use it only. Again I am using bootstrap pagination for CSS. -->
<ul class="pagination">
<?php if($page_no > 1){
echo "<li><a href='?page_no=1'>First Page</a></li>";
} ?>
    
<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
<a <?php if($page_no > 1){
echo "href='?page_no=$previous_page'";
} ?>>Previous</a>
</li>
    
<li <?php if($page_no >= $total_no_of_pages){
echo "class='disabled'";
} ?>>
<a <?php if($page_no < $total_no_of_pages) {
echo "href='?page_no=$next_page'";
} ?>>Next</a>
</li>

<?php if($page_no < $total_no_of_pages){
echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
} ?>
</ul>
<!-- 

The above code will generate very beautiful buttons.

If you like only these buttons so you can use the above pagination button script.

First let me explain you how is it working.

If current page number is greater than 1 then we display the First Page button otherwise we hide it, same we are doing with the last button, if current page number is equal to the last page number (which is total number of pages) then we hide it too.
In between we are creating next and previous buttons, so if current page is equal or less then 1 then we disable the previous button, same we are doing with next button, if current number is equal to the last page number (which is total number of pages) then we disabled it too, otherwise we enabled them.
But i am not satisfied with these button, i want something like this.



Believe me this is very easy, just focus on what I am explaining to you below.

To create pagination like above, previous, next and last page will be generated same as we did above, i don’t like keeping First Page button, as we can reach it using 1 button. After previous button add the following script.


if ($total_no_of_pages <= 10){  	 
	for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
	if ($counter == $page_no) {
	echo "<li class='active'><a>$counter</a></li>";	
	        }else{
        echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }
        }
} -->

<!-- 
if($page_no <= 4) {			
    for ($counter = 1; $counter < 8; $counter++){		 
       if ($counter == $page_no) {
          echo "<li class='active'><a>$counter</a></li>";	
           }else{
              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
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
    for (
         $counter = $page_no - $adjacents;
         $counter <= $page_no + $adjacents;
         $counter++
         ) {		
         if ($counter == $page_no) {
        echo "<li class='active'><a>$counter</a></li>";	
        }else{
            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
              }                  
           }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    } -->

<!-- 
// Another 
// Get the total number of records from our table "students".
$total_pages = $mysqli->query('SELECT COUNT(*) FROM students')->fetch_row()[0];

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM students ORDER BY name LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	$stmt->close();
} -->
<!-- 
<table>
	<tr>
		<th>Name</th>
		<th>Age</th>
		<th>Join Date</th>
	</tr>
	<?php while ($row = $result->fetch_assoc()): ?>
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['age']; ?></td>
		<td><?php echo $row['joined']; ?></td>
	</tr>
	<?php endwhile; ?>
</table>

<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
    <ul class="pagination">
        <?php if ($page > 1): ?>
        <li class="prev"><a href="pagination.php?page=<?php echo $page-1 ?>">Prev</a></li>
        <?php endif; ?>
    
        <?php if ($page > 3): ?>
        <li class="start"><a href="pagination.php?page=1">1</a></li>
        <li class="dots">...</li>
        <?php endif; ?>
    
        <?php if ($page-2 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
        <?php if ($page-1 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>
    
        <li class="currentpage"><a href="pagination.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
    
        <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
        <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>
    
        <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
        <li class="dots">...</li>
        <li class="end"><a href="pagination.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
        <?php endif; ?>
    
        <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
        <li class="next"><a href="pagination.php?page=<?php echo $page+1 ?>">Next</a></li>
        <?php endif; ?>
    </ul>
    <?php endif; ?> -->

<!-- 

    table {
        border-collapse: collapse;
        width: 500px;
    }
    td, th {
        padding: 10px;
    }
    th {
        background-color: #54585d;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #54585d;
    }
    td {
        color: #636363;
        border: 1px solid #dddfe1;
    }
    tr {
        background-color: #f9fafb;
    }
    tr:nth-child(odd) {
        background-color: #ffffff;
    }
    .pagination {
        list-style-type: none;
        padding: 10px 0;
        display: inline-flex;
        justify-content: space-between;
        box-sizing: border-box;
    }
    .pagination li {
        box-sizing: border-box;
        padding-right: 10px;
    }
    .pagination li a {
        box-sizing: border-box;
        background-color: #e2e6e6;
        padding: 8px;
        text-decoration: none;
        font-size: 12px;
        font-weight: bold;
        color: #616872;
        border-radius: 4px;
    }
    .pagination li a:hover {
        background-color: #d4dada;
    }
    .pagination .next a, .pagination .prev a {
        text-transform: uppercase;
        font-size: 12px;
    }
    .pagination .currentpage a {
        background-color: #518acb;
        color: #fff;
    }
    .pagination .currentpage a:hover {
        background-color: #518acb;
    } -->



?>


// complete
<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'pagination');

// Get the total number of records from our table "students".
$total_pages = $mysqli->query('SELECT * FROM students')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;

if ($stmt = $mysqli->prepare('SELECT * FROM students ORDER BY name LIMIT ?,?')) {
	// Calculate the page to get the results we need from our table.
	$calc_page = ($page - 1) * $num_results_on_page;
	$stmt->bind_param('ii', $calc_page, $num_results_on_page);
	$stmt->execute(); 
	// Get the results...
	$result = $stmt->get_result();
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>PHP & MySQL Pagination by CodeShack</title>
			<meta charset="utf-8">
			<style>
			html {
				font-family: Tahoma, Geneva, sans-serif;
				padding: 20px;
				background-color: #F8F9F9;
			}
			table {
				border-collapse: collapse;
				width: 500px;
			}
			td, th {
				padding: 10px;
			}
			th {
				background-color: #54585d;
				color: #ffffff;
				font-weight: bold;
				font-size: 13px;
				border: 1px solid #54585d;
			}
			td {
				color: #636363;
				border: 1px solid #dddfe1;
			}
			tr {
				background-color: #f9fafb;
			}
			tr:nth-child(odd) {
				background-color: #ffffff;
			}
			.pagination {
				list-style-type: none;
				padding: 10px 0;
				display: inline-flex;
				justify-content: space-between;
				box-sizing: border-box;
			}
			.pagination li {
				box-sizing: border-box;
				padding-right: 10px;
			}
			.pagination li a {
				box-sizing: border-box;
				background-color: #e2e6e6;
				padding: 8px;
				text-decoration: none;
				font-size: 12px;
				font-weight: bold;
				color: #616872;
				border-radius: 4px;
			}
			.pagination li a:hover {
				background-color: #d4dada;
			}
			.pagination .next a, .pagination .prev a {
				text-transform: uppercase;
				font-size: 12px;
			}
			.pagination .currentpage a {
				background-color: #518acb;
				color: #fff;
			}
			.pagination .currentpage a:hover {
				background-color: #518acb;
			}
			</style>
		</head>
		<body>
			<table>
				<tr>
					<th>Name</th>
					<th>Age</th>
					<th>Join Date</th>
				</tr>
				<?php while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['age']; ?></td>
					<td><?php echo $row['joined']; ?></td>
				</tr>
				<?php endwhile; ?>
			</table>
			<?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
			<ul class="pagination">
				<?php if ($page > 1): ?>
				<li class="prev"><a href="pagination.php?page=<?php echo $page-1 ?>">Prev</a></li>
				<?php endif; ?>

				<?php if ($page > 3): ?>
				<li class="start"><a href="pagination.php?page=1">1</a></li>
				<li class="dots">...</li>
				<?php endif; ?>

				<?php if ($page-2 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
				<?php if ($page-1 > 0): ?><li class="page"><a href="pagination.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

				<li class="currentpage"><a href="pagination.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

				<?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
				<?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="pagination.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
				<li class="dots">...</li>
				<li class="end"><a href="pagination.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
				<?php endif; ?>

				<?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
				<li class="next"><a href="pagination.php?page=<?php echo $page+1 ?>">Next</a></li>
				<?php endif; ?>
			</ul>
			<?php endif; ?>
		</body>
	</html>
	<?php
	$stmt->close();
}
?>