<?php 
// Displays a list of all the Payments in the database, and allows to Create, View, Edit and Delete
// each of the individual payment rows 
require_once '../model/database.php';
require_once '../model/payment_db.php';
require_once 'header.php';

$db_handler = Database::getDB();
$p = new Payment();
$payments = $p->paymentsList($db_handler);
?>

<body>
    <h2>View Payments</h2>
    <div id="create_payment">
        <a href="Create.php">+ Create a Payment</a>
    </div>
    <table>
        <?php 
        echo "<thead>";
        echo "<th>Email</th>";
        echo "<th>Amount Paid</th>";
        echo "<th>Payment Method</th>";
        echo "</thead><tbody>";
        foreach ($payments as $payment) {
            echo "<tr>";
            echo "<td><form action='View.php' method='post'>" .
            "<input type='hidden' value='$payment->payment_id' name='id' />" .
            "<input class='button-link' type='submit' value='$payment->email' name='view' /></form></td>";
            echo "<td>$" . $payment->amount . "</td>";
            echo "<td>" . $payment->payment_method . "</td>";
            echo "<td><form action='Edit.php' method='post'>" .
                "<input type='hidden' value='$payment->payment_id' name='id' />" .
                "<input type='submit' value='Edit' name='edit' /></form></td>";
            echo "<td><form action='Delete.php' method='post'>" .
                "<input type='hidden' value='$payment->payment_id' name='id' />" .
                "<input type='submit' value='Delete' name='delete' /></form></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</body>