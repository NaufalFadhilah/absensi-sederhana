<table border="1">
    <tr>
        <th>Tanggal</th>
        <th>Clock In</th>
        <th>Clock Out</th>
        <th>Performa</th>
    </tr>
   
<?php


include("../connect.php");

$user_id = $_SESSION['user_id'];
// $password = $_SESSION['password'];
$sql = "SELECT * FROM absen WHERE user_id='$user_id'";
$result = $db->query($sql);

while($data = $result->fetch_assoc()){
   echo "<tr>";
    echo "<td>". $data['tgl'] . " </td>";
    echo "<td>". $data['jam_masuk'] . " </td>";
    echo "<td>". $data['jam_keluar'] . " </td>";
    echo "<td>👌</td>";
   echo "</tr>";
}
?>
</table>


<form action="action.php" method="POST">

<button name="absen" type="submit">absen</button>

</form>