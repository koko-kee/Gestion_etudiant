<?php
session_start();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <?php if (isset($params['module'])) : ?>
      <h1 style="text-align:center">Modifie Module</h1>
      <form action="/Gestion/module/edit/<?=$params['module']->CodeM?>" method="post" class="forms-sample">
    <?php else : ?>
      <h1 style="text-align:center">Nouveau Module</h1>
      <form action="/Gestion/module/create" method="post" class="forms-sample">
    <?php endif; ?>
      <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input name="Nom" type="text" class="form-control <?php echo isset($_SESSION['message']['Nom']) ? 'is-invalid' : ''; ?>"
         value="<?php echo isset($params['module']->Nom) ? $params['module']->Nom : ''; ?>" placeholder="Nom">
        <?php if (isset($_SESSION['message']['Nom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Nom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleTextarea1">Textarea</label>
        <textarea class="form-control <?php echo isset($_SESSION['message']['description']) ? 'is-invalid' : ''; ?>" name="description" id="exampleTextarea1" placeholder="Description" rows="4">
        <?php echo isset($params['module']->description) ? $params['module']->description : ''; ?>
        </textarea>
        <?php if (isset($_SESSION['message']['description'])) : ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['description']); ?></div>
        <?php endif; ?>
      </div>


      <?php if (isset($params['module'])) : ?>
        <button type="submit" class="btn btn-primary mr-2">Modifier</button>
      <?php else : ?>
        <button type="submit" class="btn btn-primary mr-2">Inscription</button>
      <?php endif; ?>
      <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

<?php unset($_SESSION['message']); ?>
