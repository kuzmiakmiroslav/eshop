<?php
include_once("../includes/session.php");
include_once("includes/checkUser.php");
include_once("../includes/databaseConnect.php");
include_once("pageHeader.php");
?>


<div class="container">
    <h1>Objednavky</h1>

    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Číslo objednavky</th>
                <th>Kód tovaru</th>
                <th>Názov</th>
                <th>Uživateľ</th>
                <th>Email</th>
                <th>Cena</th>
                <th>Adresa</th>
                <th>Správa</th>

            </tr>
            <?php
            $results = $connection->query("SELECT * FROM orders order by order_id desc");
            if ($results) {

                while ($obj = $results->fetch_object()) {


                    echo '<tr>';
                    echo '<td>' . $obj->order_id . '</td>';
                    echo '<td>' . $obj->product_code . '</td>';//
                    echo '<td>' . $obj->product_name . '</td>';
                    echo '<td>' . $obj->user_name . '</td>';
                    echo '<td>' . $obj->email . '</td>';
                    echo '<td>' . $obj->price . '</td>';
                    echo '<td>' . $obj->user_address . '</td>';
                    echo '<td>' . $obj->message . '</td>';

                    echo '</tr>';


                }

                echo '</table>';


            }
            ?>
        </table>
    </div>

</div>

<?php
include_once("pageFooter.php");
include_once("../includes/databaseClose.php");

?>
