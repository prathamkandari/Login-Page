<?php
$email = $_POST['email'];
$password = $_POST['password'];
//Database Connection over here
$con = new mysqli("localhost", "root", "Prathamk123@", "test");
if ($con->connect_error) {
    die("Failed to Connect  : " . $con->connect_error);
} else {
    $stmt = $con->prepare("select * from registration where email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password){
            echo "<h2>Login Successfully</h2>";
        } else{
            echo "Invalid<h2> Email or Password</h2>";
        }
    } else {
        echo "Invalid<h2> Email or Password</h2>";
    }
}
?>