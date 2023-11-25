<?php include('../dbConnection/db.php');

session_start();

$data = $_POST['productoId'];
$iduser = $_SESSION["Id_User"];

$stmt5 = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$iduser}' AND IS_ACTIVE = 1;");
$lists = mysqli_fetch_array($stmt5);

$response = "";

if ($lists == null) {

    $stmtXD = $mysqli->query("INSERT INTO LISTS (`LIST_OWNER`, `IS_ACTIVE`) VALUES ('{$iduser}', 1)");

    if ($stmtXD) {
        $response = "se creo la lista";

        $stmtxd = $mysqli->query("SELECT * FROM LISTS WHERE LIST_OWNER = '{$iduser}' AND IS_ACTIVE = 1;");
        $listsxd = mysqli_fetch_array($stmtxd);

        $stmtXD = $mysqli->query("INSERT INTO LISTS_LINK (`LIST_ID`, `PRODUCT_ID`) VALUES ('{$listsxd['LIST_ID']}', '{$data}' )");
    } else {
        $response = "error";
    }
} else {

    $stmtXD = $mysqli->query("INSERT INTO LISTS_LINK (`LIST_ID`, `PRODUCT_ID`) VALUES ('{$lists['LIST_ID']}', '{$data}' )");
    $response = "producto agregado al carrito :)";
}


// Send JSON response
echo json_encode($response);
