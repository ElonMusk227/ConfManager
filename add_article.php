<?php
$title = 'Ajouter un Article';
require './elements/header_author.php';
require 'add_article_process.php';
?>

<div class="container justify-content-center py-4">
    <div class="row ">
        <div class="col-md-12 ">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Add an article</h4> 
                </div>
                <div class="card-body">
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-danger">
                            <?= $mess ?? '' ?>
                        </div>
                    <?php endif ?>
                    <div class="card-body pt-3">
                      <form enctype="multipart/form-data" action="" method="POST" id="add-article-form">
                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" id="title" placeholder="Entrez le titre de l'article" required>
                        </div>
                        <div class="mb-3">
                          <label for="choose_conf" class="form-label">Choose a conference</label>
                          <select name="choose_conf" id="choose_conf" class="form-select" required>
                            <?php foreach ($conferences as $conf): ?>
                              <option value="<?= $conf['ID_CONF'] ?>"><?= $conf['NOM'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="file" class="form-label">File</label>
                          <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                        <!-- Ajoutez d'autres champs pour les détails de l'article selon vos besoins -->
                        <button type="submit" class="btn btn-primary">Add article</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
                                  

<?php include './elements/footer.php'; ?>
