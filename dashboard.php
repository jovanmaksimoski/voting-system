<?php
session_start();

include("navbar.php");

$userName = $_SESSION['user_name'];
?>

<div class="background py-5 mt-4 d-flex justify-content-center align-items-start">
    <div class="row">
        <div class="col text-center bg-info p-2 rounded ">
            <h1 class="text-light   rounded">
                <?php echo htmlspecialchars($userName); ?> You have successfully logged in.
            </h1>
            <form action="logout.php" method="POST" class="mt-4">
                <button type="submit" class="btn btn-danger">Log Out</button>
            </form>
            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Vote</button>

            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h1 class="modal-title fs-5 text-white fw-bold" id="exampleModalLabel">Vote Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-info p-5">
                            <form action="" method="">
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label text-white fw-bold">Employee</label>
                                    <select class="form-control" id="message-text"></select>
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label text-white fw-bold">Category</label>
                                    <select class="form-control" id="message-text"></select>
                                </div>

                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label text-white fw-bold">Comment</label>
                                    <textarea class="form-control" id="message-text"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer bg-info">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-light">Vote</button>
                        </div>
                    </div>
                </div>
            </div>
</div>





