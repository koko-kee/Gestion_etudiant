<?php
session_start();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <?php if (isset($params['faculte'])) : ?>
      <h1 style="text-align:center">Modifie Faculter</h1>
      <form action="/Gestion/faculte/edit/<?=$params['faculte']->CodeF?>" method="post" class="forms-sample">
    <?php else : ?>
      <h1 style="text-align:center">Nouveau Faculte</h1>
      <form action="/Gestion/faculte/create" method="post" class="forms-sample">
    <?php endif; ?>
      <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input name="Nom" type="text" class="form-control <?php echo isset($_SESSION['message']['Nom']) ? 'is-invalid' : ''; ?>"
         value="<?php echo isset($params['faculte']->Nom) ? $params['faculte']->Nom : ''; ?>" placeholder="Nom">
        <?php if (isset($_SESSION['message']['Nom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Nom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleTextarea1">Textarea</label>
        <textarea class="form-control <?php echo isset($_SESSION['message']['Description']) ? 'is-invalid' : ''; ?>" name="Description" id="exampleTextarea1" placeholder="Description" rows="4"><?php echo isset($params['faculte']->Description) ? $params['faculte']->Description : ''; ?></textarea>
        <?php if (isset($_SESSION['message']['Description'])) : ?>
            <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Description']); ?></div>
        <?php endif; ?>
      </div>


      <?php if (isset($params['faculte'])) : ?>
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
