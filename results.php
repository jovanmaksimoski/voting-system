
<?php

    use Classes\Votes;

    require_once ("Classes/Votes.php");
    require_once("Classes/DbConnection.php");

    include ("navbar.php");

    $votes = new Votes();
    $allVotes = $votes->getAllVotes()

    ?>

<div class="background d-flex justify-content-center align-items-center vh-100">
    <a class="btn btn-light" href="dashboard.php">Back to voting</a>
    <div class="row">
        <div class="col text-center">
                <table class="table table-striped" style="width: 800px; height: auto; margin: auto;">
                    <thead>
                    <tr>
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


        </div>
    </div>
</div>