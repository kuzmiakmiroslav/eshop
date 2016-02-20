<?php
/**
 * Created by PhpStorm.
 * User: kuzmik
 * Date: 03.01.16
 * Time: 20:34
 */

include_once("../includes/config.php");
include_once("header.php");
?>
<div class="container">
<h1>Product List</h1>    
<div class="table-responsive">
        <table class="table">
        <tr>    
        	<th>Code</th>
        	<th>Name</th>
        	<th>Desc</th>
        	<th>Image</th>
        	<th>Price</th>
        	<th>&nbsp;</th>
        	<th>&nbsp;</th>

        	</tr>
        <?php
        $results = $mysqli->query("SELECT id,product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");  //vyber produktov z tabulky produkty zoradit podla zostupu
        if ($results) {

        	while ($obj = $results->fetch_object()) {


        		echo '<tr>';
        		echo '<td>' . $obj->product_code . '</td>';                             //
        		echo '<td>' . $obj->product_name . '</td>';
        		echo '<td>' . $obj->product_desc . '</td>';
        		echo '<td>' . $obj->product_img_name . '</td>';
        		echo '<td>' . $obj->price . '</td>';
        		echo '<td><a href="edit.php?id=' . $obj->id . '"><i class="fa fa-pencil-square-o"></i> Edit</a></td>';         // zobrazenei presmerovania edit
        		echo '<td><a href="delete.php?id=' . $obj->id . '"><i class="fa fa-times"></i>Delete</a></td>';     //zobrazenie presmerovania delete

        		echo '</tr>';


        	}

        	echo '</table>' ;


        }
            ?>
        </table>
<a href="add.php"><i class="fa fa-plus"></i> Add product</a>
        </div>

</div>

<?php
include_once("footer.php");
?>
