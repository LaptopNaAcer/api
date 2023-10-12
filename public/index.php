<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
require '../src/vendor/autoload.php';

$app = new \Slim\App;

$servername = "localhost";
$username = "root";
$password = "";/*Code ni Azer*/
$dbname = "demo";

$app->post('/postName', function (Request $request, Response $response, array $args) use ($servername, $username, $password, $dbname) {
    $data = json_decode($request->getBody());
    $fname = $data->fname;
    $lname = $data->lname;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO names (fname, lname) VALUES (:fname, :lname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->execute();

        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(array("status" => "error", "message" => $e->getMessage())));
    }

    $conn = null;
});

$app->delete('/deleteName/{id}', function (Request $request, Response $response, array $args) use ($servername, $username, $password, $dbname) {
    $id = $args['id'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM names WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $response->getBody()->write(json_encode(array("status" => "success", "message" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(array("status" => "error", "message" => $e->getMessage())));
    }

    $conn = null;
});

$app->put('/updateName/{id}', function (Request $request, Response $response, array $args) use ($servername, $username, $password, $dbname) {
    $id = $args['id'];
    $data = json_decode($request->getBody());
    $fname = $data->fname;
    $lname = $data->lname;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);/*Code ni Azer*/

        $stmt = $conn->prepare("UPDATE names SET fname = :fname, lname = :lname WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->execute();

        $response->getBody()->write(json_encode(array("status" => "success", "data" => null)));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(array("status" => "error", "message" => $e->getMessage())));
    }

    $conn = null;
});

$app->get('/printName', function (Request $request, Response $response, array $args) use ($servername, $username, $password, $dbname) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*Code ni Azer*/
        $stmt = $conn->prepare("SELECT fname, lname FROM names");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($data)) {
            $response->getBody()->write(json_encode(array("status" => "success", "data" => $data)));
        } else {
            $response->getBody()->write(json_encode(array("status" => "success", "data" => null, "message" => "No names found")));
        }
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode(array("status" => "error", "data" => $e->getMessage())));
    }

    $conn = null;
});/*Code ni Azer*/

$app->run();