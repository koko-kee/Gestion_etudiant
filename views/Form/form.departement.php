<?php
session_start();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <?php if (isset($params['departement'])) : ?>
      <h1 style="text-align:center">Modifier</h1>
      <form action="/Gestion/departement/edit/<?=$params['departement']->NumD?>" method="post" class="forms-sample">
    <?php else : ?>
      <h1 style="text-align:center">Nouveau Departement</h1>
      <form action="/Gestion/departement/create" method="post" class="forms-sample">
    <?php endif; ?>
      <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input name="Nom" type="text" class="form-control <?php echo isset($_SESSION['message']['Nom']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['departement']->Nom) ? $params['departement']->Nom : ''; ?>" placeholder="Nom">
        <?php if (isset($_SESSION['message']['Nom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Nom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail3">Capacite</label>
        <input name="Capacite" type="number" class="form-control <?php echo isset($_SESSION['message']['Capacite']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['departement']->Capacite) ? $params['departement']->Capacite : ''; ?>" id="exampleInputEmail3" placeholder="Capacite">
        <?php if (isset($_SESSION['message']['Capacite'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Capacite']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleSelectGender">Faculte</label>
        <select name="CodeF" class="form-control <?php echo isset($_SESSION['message']['CodeF']) ? 'is-invalid' : ''; ?>" id="exampleSelectGender">
         <?php foreach($params['facultes'] as $faculte):?>
            <option value="<?=$faculte->CodeF?>" ><?=$faculte->Nom?></option>
         <?php endforeach ?>
        </select>
        <?php if (isset($_SESSION['message']['CodeF'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['CodeF']); ?></div>
        <?php endif; ?>
      </div>

      <?php if (isset($params['departement'])) : ?>
        <button type="submit" class="btn btn-primary mr-2">Modifier</button>
      <?php else : ?>
        <button type="submit" class="btn btn-primary mr-2">Valider</button>
      <?php endif; ?>

      <button class="btn btn-light">Cancel</button>
      </form>
    </div>
  </div>
</div>

<?php unset($_SESSION['message']); ?>
