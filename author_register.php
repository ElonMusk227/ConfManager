<?php
    include 'author_register_process.php';
    $title = 'Author Register';
    include './elements/header_author.php';
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12 offset-md-2">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Register as Author</h6>
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-info">
                            <?= $mess ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="card-body pt-3">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nom_auteur" class="form-label">Name</label>
                            <input type="text" name="nom_auteur" class="form-control" id="nom_auteur" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Password</label>
                            <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Enter a strong password" required>
                        </div>
                        <div class="mb-3">
                            <label for="univ_auteur" class="form-label">Select Your University</label>
                            <select name="univ_auteur" class="form-select" id="univ_auteur" onchange="selectOption(this)">
                                <?php foreach($select_univ as $univ): ?>
                                    <option value="<?= htmlspecialchars($univ['ID_UNIV']) ?>">
                                        <?= htmlspecialchars($univ['NOM_UNIV']) ?>
                                    </option>
                                <?php endforeach ?>
                                <option value="add_universite.php">Your university not listed? Add it</option>
                                <option value="null">None</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="entreprise" class="form-label">Select Your Company</label>
                            <select name="entreprise" class="form-select" id="entreprise" onchange="selectOption(this)">
                                <?php foreach($select_entreprise as $entreprise): ?>
                                    <option value="<?= htmlspecialchars($entreprise['ID_ENTREPRISE']) ?>">
                                        <?= htmlspecialchars($entreprise['NOM']) ?>
                                    </option>
                                <?php endforeach ?>
                                <option value="add_entreprise.php">Your company not listed? Add it</option>
                                <option value="null">None</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function selectOption(select) {
        var value = select.value;
        if (value === "add_universite.php" || value === "add_entreprise.php") {
            window.location.href = value;
        }
    }
</script>

<?php include './elements/footer.php'; ?>
