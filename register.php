<?php

    require_once 'Classes/DbConnection.php';
    require_once 'Classes/Employees.php';

    use Classes\DbConnection;
    use Classes\Employees;

    $errors = [];
    $success = "";


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($name)) {
            $errors[] = "Name is required.";
        }

        if (empty($surname)) {
            $errors[] = "Surname is required.";
        }

        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (empty($password)) {
            $errors[] = "Password is required.";
        } elseif (strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters long.";
        }


        if (empty($errors)) {
            $dbConnection = (new DbConnection())->getDbConnection();
            $employees = new Employees($dbConnection);

            $result = $employees->register($name, $surname, $email, $password);

            if ($result === true) {
                header("Location: dashboard.php");
                exit;
            } else {
                $errors[] = $result;
            }
        }
    }

    include("navbar.php");
?>


<div class="background">
    <div class="container-fluid d-flex vh-100 px-5 justify-content-center align-items-center">
        <div class="col-3">
            <form class="bg-info p-5 rounded" action="register.php" method="POST">
                <h3 class="text-light mb-4">Register</h3>

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
                    <label for="name" class="form-label text-light">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label text-light">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="<?php echo htmlspecialchars($surname ?? ''); ?>" placeholder="Enter your surname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                </div>

                <button type="submit" class="btn btn-danger">Register</button>
            </form>
        </div>
    </div>
</div>
