<?php
  require 'add_author_process.php';
  $title = 'Ajouter un auteur';
  require './elements/header.php';
?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Add an author</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-info">
                            <?= htmlspecialchars($mess) ?><br>
                            <?= htmlspecialchars($code_mess) ?? '' ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post" id="author-form">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Author's mail</label>
                            <input type="email" name="mail" class="form-control" id="mail" placeholder="Entrez l'email de l'auteur" required>
                        </div>
                        <div class="mb-3">
                            <label for="univ" class="form-label">Select the university</label>
                            <select class="form-select" name="univ" id="univ" required>
                                <?php foreach($select_univ as $univ): ?>
                                    <option value="<?= $univ['ID_UNIV'] ?>"><?= htmlspecialchars($univ['NOM_UNIV']) ?></option>
                                <?php endforeach ?>
                                <option value="add_entreprise.php">University not listed? Add it</option>
                                <option value="null">Nothing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="entreprise" class="form-label">Select the entreprise</label>
                            <select class="form-select" name="entreprise" id="entreprise" required>
                                <?php foreach($select_entreprise as $entreprise): ?>
                                    <option value="<?= $entreprise['ID_ENTREPRISE'] ?>"><?= htmlspecialchars($entreprise['NOM']) ?></option>
                                <?php endforeach ?>
                                <option value="add_entreprise.php">Entreprise  not listed? Add it</option>
                                <option value="null">Nothing</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="conf" class="form-label">Select the conference</label>
                            <select class="form-select" name="conf" id="conf" required>
                                <?php foreach($select as $conf): ?>
                                    <option value="<?= $conf['ID_CONF'] ?>"><?= htmlspecialchars($conf['NOM']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <input type="hidden" name="date" value="<?= $date->format('Y-m-d H:i:s') ?>">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add author</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './elements/footer.php'; ?>
