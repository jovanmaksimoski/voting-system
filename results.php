
<?php

    use Classes\Votes;
    use Classes\Categories;


    require_once ("Classes/Categories.php");
    require_once ("Classes/Votes.php");
    require_once("Classes/DbConnection.php");

    include ("navbar.php");

    $votes = new Votes();
    $allVotes = $votes->getAllVotes();



    ?>

<div class="background d-flex justify-content-center align-items-center ">
    <div class="row">
        <div class="col text-center mt-5 ">

                <table class="table table-bordered   " style="width; height: auto; margin: auto;">
                    <thead class="table-info">
                    <tr class="text-info">
                        <th scope="col">#</th>
                        <th scope="col">Voter Name</th>
                        <th scope="col">Nominee Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($allVotes as $vote): ?>
                        <tr>
                            <th scope="row"><?= htmlspecialchars($vote['id']) ?></th>
                            <td><?= htmlspecialchars($vote['voter_name']) ?></td>
                            <td><?= htmlspecialchars($vote['nominee_name']) ?></td>
                            <td><?= htmlspecialchars($vote['category_name']) ?></td>
                            <td><?= htmlspecialchars($vote['comment']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            <a class="btn btn-light mt-2" href="dashboard.php">Back to voting</a>
        </div>
    </div>
</div>