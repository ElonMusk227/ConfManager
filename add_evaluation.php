<?php
    $title = 'Evaluate articles';
    require 'add_evaluation_process.php';
?>
    <div class="container-fluid py-4">
    <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header pb-0">
                  <h6>Add an evaluation</h6>
                  <?php if(!empty($mess)): ?>
                    <div class="alert alert-info">
                        <?=$mess ?>
                    </div>
                  <?php endif ?>
                </div>
                <div class="card-body pt-3">
                  <form  action="" method="POST">
                  <div class="mb-3">
                      <label for="article" class="form-label">Choose the article</label>
                       <select name="article" id="">
                        <?php foreach($articles as $article):?>
                        <option value="<?=$article['ID_ARTICLE']?>"><?= $article['TITLE']?></option>
                        <?php endforeach?>
                       </select>
                    </div>
                    <div class="mb3">
                      <label for="evaluation">Put your evaluation</label>
                      <textarea  class="form-control" style="" name="evaluation" id=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add evaluation</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>


<?php require './elements/footer.php' ?>