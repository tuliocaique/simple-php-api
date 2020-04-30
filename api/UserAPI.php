<?php
require ("../controller/ControllerUser.php");

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = array();
$controller = new ControllerUser();

switch ($_SERVER['REQUEST_METHOD']) {
    case "POST":
        if (isset($_POST["name"])
            && isset($_POST["email"])
                && isset($_POST["password"])
                    && isset($_POST["country"])) {
            if($controller->insertUser($_POST)){
                $data["success"] = true;
                $data["message"] = "User successfully registered!";
            }else{
                $data["success"] = false;
                $data["message"] = "It was not possible to register the user!";
            }
        } else {
            $data["success"] = false;
            $data["message"] = "Missing parameters!";
        }
        break;

    case "PUT":
        parse_str(file_get_contents("php://input"), $_PUT);
        if (isset($_PUT["id"])
            && isset($_PUT["name"])
                && isset($_PUT["email"])
                    && isset($_PUT["password"])
                        && isset($_PUT["country"])) {
            if($controller->updateUser($_PUT)){
                $data["success"] = true;
                $data["message"] = "User info was successfully updated!";
            }else{
                $data["success"] = false;
                $data["message"] = "It was not possible to update user info!";
            }
        } else {
            $data["success"] = false;
            $data["message"] = "Missing parameters!";
        }
        break;

    case "DELETE":
        parse_str(file_get_contents("php://input"), $_DELETE);
        if (isset($_DELETE["id"])) {
            if($controller->deleteUser($_DELETE)){
                $data["success"] = true;
                $data["message"] = "User was deleted!";
            }else{
                $data["success"] = false;
                $data["message"] = "It was not possible to delete user!";
            }
        } else {
            $data["success"] = false;
            $data["message"] = "Missing parameters!";
        }
        break;

    case "GET":
        if (isset($_GET["id"])) {
            $dataUser = $controller->selectUser($_GET);
            if($dataUser != false){
                $data["success"] = true;
                $data["user"] = $dataUser;
            }else{
                $data["success"] = false;
                $data["message"] = "It was not possible to get user info!";
            }
        } else {
            $dataUsers = $controller->selectUsers();
            if($dataUsers != false){
                $data["success"] = true;
                $data["users"] = $dataUsers;
            }else{
                $data["success"] = false;
                $data["message"] = "It was not possible to get users info!";
            }
        }
        break;

    default:
        $data["success"] = false;
        $data["message"] = "Missing parameters!";
        break;
}
echo json_encode($data, JSON_PRETTY_PRINT);