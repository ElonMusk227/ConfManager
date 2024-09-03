<?php
$title = 'Create a Conference';
require './elements/header.php';
require 'create_conf_process.php';
$sql = 'SELECT * FROM CONFERENCE';
$select = $pdo->query($sql);
$conferences = $select->fetchAll(PDO::FETCH_ASSOC);
?>  
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Add a Conference</h6>
        </div>
        <?php if(!empty(($mess))): ?>
          <div class="alert alert-info"><?=$mess?></div>
        <?php endif?>
        <div class="card-body pt-3">
          <form action="" method="post" id="conference-form">
            <div class="mb-3">
              <label for="conference-name" class="form-label">Conference Name</label>
              <input type="text" name="NOM" class="form-control" id="conference-name" placeholder="Enter the conference name" required>
            </div>
            <div class="mb-3">
              <label for="conference-acronym" class="form-label">Acronym</label>
              <input type="text" name="SIGLE" class="form-control" id="conference-acronym" placeholder="Enter the conference acronym">
            </div>
            <div class="mb-3">
              <label for="conference-submission-date" class="form-label">Submission Date</label>
              <input type="date" name="DATE_DE_SOUMISSION" class="form-control" id="conference-submission-date" required>
            </div>
            <div class="mb-3">
              <label for="conference-start-date" class="form-label">Start Date</label>
              <input type="date" name="DATE_DEROULEMENT" class="form-control" id="conference-start-date" required>
            </div>
            <div class="mb-3">
              <label for="conference-result-date" class="form-label">Result Date</label>
              <input type="date" name="DATE_DE_RESULTAT" class="form-control" id="conference-result-date" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Conference</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-8">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Conference List</h6>
        </div>
        <div class="card-body pt-3">
          <?php if (!empty($conferences)): ?>
            <ul class="list-group">
              <?php foreach ($conferences as $conference): ?>
                <li class="list-group-item">
                  <a href="conf-list.php?id=<?= htmlspecialchars($conference['ID_CONF']) ?>" class="text-decoration-none">
                    <?= htmlspecialchars($conference['NOM']) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <p>No conferences have been added yet.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require './elements/footer.php';
?>
