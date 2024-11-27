<?php

require_once 'Classes/DbConnection.php';
require_once 'Classes/Employees.php';

use Classes\DbConnection;
use Classes\Employees;

include("navbar.php");

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($errors)) {
        $dbConnection = (new DbConnection())->getDbConnection();
        $employees = new Employees($dbConnection);

        $result = $employees->login($email, $password);

        if ($result === true) {
            header("Location: ./dashboard.php");
            exit;
        } else {
            $errors[] = $result;
        }
    }
}
?>

<div class="background">
    <div class="container-fluid d-flex vh-100 px-5 justify-content-center align-items-center">
        <div class="col-3">
            <form class="bg-info p-5 rounded" action="" method="POST">
                <h3 class="text-light mb-4">Log In</h3>

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-danger">Log In</button>
            </form>
        </div>
    </div>
</div>





