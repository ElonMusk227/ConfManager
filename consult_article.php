<?php
    require 'consult_article_process.php';
    $title = 'Consult my articles';
    require './elements/header_author.php';
?>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="mb-0">List of Articles</h6>
                    </div>
                    <div class="card-body pt-3">
                        <?php if (!empty($select)): ?>
                            <ol class="list-group list-group-numbered">
                                <?php foreach($select as $article): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold"><?= htmlspecialchars($article['TITLE']) ?></span>
                                        <a href="<?= htmlspecialchars($article['TITLE']) ?>" class="btn btn-link mt-2">
                                            Download Article
                                        </a>
                                    </div>
                                    <?php file_put_contents($article['TITLE'] . '.pdf', $article['FICHIER_ARTICLE']); ?>
                                </li>
                                <?php endforeach ?>
                            </ol>
                        <?php else: ?>
                            <p class="text-muted">No articles available at the moment.</p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require './elements/footer.php'; ?>
