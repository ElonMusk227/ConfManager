<?php
    $title = 'Ajouter un relecteur';
    require './elements/header.php';
    require './add_relector_process.php';
    $date = new DateTime();
    $date->setTimeZone(new DateTimeZone('Africa/Niamey'));
?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Add a sproofreader</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($mess) ?? '' ?>
                        </div>
                    <?php endif ?>
                    <?php if (!empty($code_mess)): ?>
                        <div class="alert alert-info">
                            <?= htmlspecialchars($code_mess) ?? '' ?>
                        </div>  
                    <?php endif ?>
                    <form action="" method="post" id="relector-form">
                        <div class="mb-3">
                            <label for="mail_relecteur" class="form-label">sproofreader </label>
                            <input type="email" name="mail_relecteur" class="form-control" id="mail_relecteur" placeholder="Entrez l'email du relecteur" required>
                        </div>
                        <div class="mb-3">
                            <label for="article" class="form-label">Select the article</label>
                            <select class="form-select" name="article" id="article" required>
                                <?php foreach ($articles as $article): ?>
                                    <option value="<?= $article['ID_ARTICLE'] ?>"><?= htmlspecialchars($article['TITLE']) ?></option>
                                <?php endforeach ?>                           
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="domaine" class="form-label">Select the field</label>
                            <select name="domaine" class="form-select" id="domaine" required>
                                <?php foreach ($domaines as $domaine): ?>
                                    <option value="<?= $domaine['ID_DOMAINE'] ?>"><?= htmlspecialchars($domaine['LIBELE']) ?></option>
                                <?php endforeach ?>                           
                            </select>
                        </div>
                        <input type="hidden" name="date" value="<?= $date->format('Y-m-d H:i:s') ?>">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add sproofreader</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './elements/footer.php'; ?>
