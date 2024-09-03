<?php
    $title = 'Add an entreprise';
    include 'add_entreprise_process.php';
    include './elements/header.php';
?>
    <div class="container-fluid py-4">
    <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header pb-0">
                  <h6>Add an entreprise</h6>
                  <?php if(!empty($mess)): ?>
                    <div class="alert alert-warnig">
                        <?=$mess?>
                    </div>
                  <?php endif?>
                </div>
                <div class="card-body pt-3">
                  <form action="" method="post" id="">
                    <div class="mb-3">
                      <label for="NOM_CONF" class="form-label">Entreprise Name</label>
                      <input type="text" name="entreprise" class="form-control" id="" placeholder="Entrez le nom de l'université" required>
                    </div>     
                    <!-- Ajoutez d'autres champs pour les détails de la conférence selon vos besoins -->
                    <button type="submit" class="btn btn-primary">Add entreprise</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>

<?php include './elements/footer.php'; ?>