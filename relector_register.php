<?php
    include 'relector_register_process.php';
    include 'sign_up_relector_process.php';
    $title = 'Proofreader Register';
    include './elements/header.php';
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Register as a Proofreader</h6>
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-info">
                            <?= htmlspecialchars($mess) ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="card-body pt-3">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nom_relecteur" class="form-label">Name</label>
                            <input type="text" name="nom_relecteur" class="form-control" id="nom_relecteur" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Password</label>
                            <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Enter a strong password" required>
                        </div>
                        <input type="hidden" name="id_relecteur" value="<?= htmlspecialchars($_GET['num']) ?>">
                        <input type="hidden" name="id_article" value="<?= htmlspecialchars($_GET['art']) ?>">
                        <div class="mb-3">
                            <label for="domaine" class="form-label">Select Your Field of Expertise</label>
                            <select name="domaine" class="form-select" id="domaine" required>
                                <?php foreach($select_domaine as $domaine): ?>
                                    <option value="<?= htmlspecialchars($domaine['ID_DOMAINE']) ?>">
                                        <?= htmlspecialchars($domaine['LIBELE']) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './elements/footer.php'; ?>
