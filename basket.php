<?php
/**
 * Created by PhpStorm.
 * User: kuzmiak
 * Date: 06.02.16
 * Time: 13:47
 */
include_once("./includes/config.php");



        $results = $mysqli->query("SELECT id, product_code, quantity FROM basket ORDER BY id ASC");  //vyber produktov z tabulky produkty zoradit podla zostupu
        if ($results) {

            while ($obj = $results->fetch_object()) {


                echo '<tr>';
                echo '<td>' . $obj->id . '</td>';
                echo '<td>' . $obj->product_code . '</td>';                             //
                echo '<td>' . $obj->quantity . '</td>';





                echo '</tr>';


            }

            echo '</table>' ;


        }
            ?>
