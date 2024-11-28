<?php
    use Classes\Categories;
    use Classes\Employees;
    use Classes\Votes;

    require_once ("Classes/Employees.php");
    require_once ("Classes/Categories.php");
    require_once ("Classes/Votes.php");

    include("navbar.php");

    $categories = new Categories();
    $categoryList = $categories->getCategoryName();

    $employees = new Employees();
    $employeesList = $employees->getEmployeeName();


    $userName = $_SESSION['user_name'];

    $voterId = ['voter_id'];
    $nomineeId = ['nominee_id'];
    $categoryId = ['category_id'];
    $comment = ['comment'] ?? '';


    $vote = new Votes();
    $success = $vote->storeVote($voterId, $nomineeId, $categoryId, $comment);



?>

<div class="background py-5 mt-4 d-flex justify-content-center align-items-start">
    <div class="row">
        <div class="col text-center bg-info p-2 rounded ">
            <h1 class="text-light p-5 border border-2  rounded">
                <?php echo htmlspecialchars($userName); ?> You have successfully logged in.
            </h1>
            <form action="logout.php" method="POST" class=" ">
                <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Vote</button>
                <a type="button" href="results.php" class="btn btn-primary mt-2" >See Voting Results</a>
                <button type="submit" class="btn btn-danger mt-2">Log Out</button>
            </form>



            <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h1 class="modal-title fs-5 text-white fw-bold" id="exampleModalLabel">Vote Employee</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-info p-5">

                            <form action="" method="POST">


                                <div class="mb-3">
                                    <label for="voter_id" class="col-form-label text-white fw-bold">Voter</label>
                                    <select class="form-control" id="voter_id" name="voter_id" >
                                        <option value="">Select a voter</option>
                                        <?php foreach ($employeesList as $employee): ?>
                                            <option value="<?= htmlspecialchars($employee['id']); ?>">
                                                <?= htmlspecialchars($employee['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="nominee_id" class="col-form-label text-white fw-bold">Nominee</label>
                                    <select class="form-control" id="nominee_id" name="nominee_id" >
                                        <option value="">Select a nominee</option>
                                        <?php foreach ($employeesList as $employee): ?>
                                            <option value="<?= htmlspecialchars($employee['id']); ?>">
                                                <?= htmlspecialchars($employee['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="category_id" class="col-form-label text-white fw-bold">Category</label>
                                    <select class="form-control" id="category_id" name="category_id" >
                                        <option value="">Select a category</option>
                                        <?php foreach ($categoryList as $category): ?>
                                            <option value="<?= htmlspecialchars($category['id']); ?>">
                                                <?= htmlspecialchars($category['name']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="comment" class="col-form-label text-white fw-bold">Comment</label>
                                    <textarea class="form-control" id="comment" name="comment"  maxlength="500" placeholder="Enter your comment here"></textarea>
                                </div>

                                <button type="submit" class="btn btn-light">Vote</button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
</div>





