<?php

$a=$_POST['name'];
$b=$_POST['category'];
if($_POST['submit'])
{
    echo $s="insert into `zena`(name,category) values('$a','$b')";
    echo "Your Data Inserted";

}
?>
<html>
<body bgcolor="pink">

    <form method="post">
        <table border="1" bgcolor="#00CCFF">
            <tr><td>Name</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr><td rowspan="2">Sex</td>
                <td><input type="radio" name="category" value="Male"/>Male</td>
            <tr>
                <td><input type="radio" name="category" value="Female"/>Female</td></tr>
            </tr>
            <tr><td><input type="submit" name="submit" value="Submit"/></td></tr>
        </table>
    </form>

</body>
</html>