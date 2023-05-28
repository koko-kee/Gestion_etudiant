<?php
session_start();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <?php if (isset($params['student'])) : ?>
      <h1 style="text-align:center">Modification</h1>
      <form action="/Gestion/etudiant/edit/<?=$params['student']->Matricule?>" method="post" class="forms-sample">
    <?php else : ?>
      <h1 style="text-align:center">Nouveau Etudiant</h1>
      <form action="/Gestion/etudiant/create" method="post" class="forms-sample">
    <?php endif; ?>
      <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input name="Nom" type="text" class="form-control <?php echo isset($_SESSION['message']['Nom']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['student']->Nom) ? $params['student']->Nom : ''; ?>" placeholder="Nom">
        <?php if (isset($_SESSION['message']['Nom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Nom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail3">Prenom</label>
        <input name="Prenom" type="text" class="form-control <?php echo isset($_SESSION['message']['Prenom']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['student']->Prenom) ? $params['student']->Prenom : ''; ?>" id="exampleInputEmail3" placeholder="Prenom">
        <?php if (isset($_SESSION['message']['Prenom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Prenom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword4">Adresse</label>
        <input name="Adresse" type="text" class="form-control <?php echo isset($_SESSION['message']['Adresse']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['student']->Adresse) ? $params['student']->Adresse : ''; ?>" id="exampleInputPassword4" placeholder="Adresse">
        <?php if (isset($_SESSION['message']['Adresse'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Adresse']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputCity1">Lieu</label>
        <input name="Lieu" type="text" class="form-control <?php echo isset($_SESSION['message']['Lieu']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['student']->Lieu) ? $params['student']->Lieu : ''; ?>" id="exampleInputCity1" placeholder="Lieu">
        <?php if (isset($_SESSION['message']['Lieu'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Lieu']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword4">Naissance</label>
        <input name="Naissance" type="date" class="form-control <?php echo isset($_SESSION['message']['Naissance']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['student']->Naissance) ? $params['student']->Naissance : ''; ?>" id="exampleInputPassword4" placeholder="Naissance">
        <?php if (isset($_SESSION['message']['Naissance'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Naissance']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleSelectGender">Genre</label>
        <select name="Sexe" class="form-control <?php echo isset($_SESSION['message']['Sexe']) ? 'is-invalid' : ''; ?>" id="exampleSelectGender">
          <option>Male</option>
          <option>Female</option>
        </select>
        <?php if (isset($_SESSION['message']['Sexe'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Sexe']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputCity1">Diplome</label>
        <input type="text" value="<?php echo isset($params['student']->Diplome) ? $params['student']->Diplome : ''; ?>" name="Diplome" class="form-control <?php echo isset($_SESSION['message']['Diplome']) ? 'is-invalid' : ''; ?>" id="exampleInputCity1" placeholder="Diplome">
        <?php if (isset($_SESSION['message']['Diplome'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Diplome']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleSelectGender">Departement</label>
        <select name="NumD" class="form-control <?php echo isset($_SESSION['message']['NumD']) ? 'is-invalid' : ''; ?>" id="exampleSelectGender">
          <?php foreach ($params['departements'] as $departement) : ?>
            <option value="<?= $departement->NumD ?>"><?= $departement->Nom ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset($_SESSION['message']['NumD'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['NumD']); ?></div>
        <?php endif; ?>
      </div>

      <?php if (isset($params['student'])) : ?>
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
