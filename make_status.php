<?php
    include 'make_status_process.php';
    $title = 'Define A Status';
    include './elements/header.php';
?>
    
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-gradient-primary text-white">
                    <h4 class="mb-0">Define A Status</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($mess)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($mess) ?>
                        </div>
                    <?php endif ?>
                    <form action="" method="post" id="status-form">
                        <div class="mb-3">
                            <label for="article" class="form-label">Choose Article</label>
                            <select class="form-select" name="article" id="article" required>
                                <?php foreach ($articles as $article): ?>
                                    <option value="<?= htmlspecialchars($article['ID_ARTICLE']) ?>"><?= htmlspecialchars($article['TITLE']) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Choose Status</label>
                            <select class="form-select" name="status" id="status" required>
                                <option value="Accepter">Accept</option>
                                <option value="Accepter avec modification">Accept with modifications</option>
                                <option value="Refuser">Reject</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="justificatif" class="form-label">Justification</label>
                            <textarea class="form-control" rows="3" name="justificatif" id="justificatif" placeholder="Enter justification here..." required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './elements/footer.php'; ?>
