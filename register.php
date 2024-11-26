<?php

include ("navbar.php");

?>
<div class="background">
    <div class="container-fluid d-flex vh-100 px-5  justify-content-center align-items-center">
        <div class="col-3">
            <form class="bg-info p-5 rounded " action="" method="">
                <div class="mb-3">
                    <label for="name" class="form-label text-light">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label text-light">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-danger">Register</button>
            </form>
        </div>
    </div>

</div>

