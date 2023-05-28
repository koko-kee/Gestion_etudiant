<?php
session_start();
?>
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
    <?php if (isset($params['teacher'])) : ?>
      <h1 style="text-align:center">Modification</h1>
      <form action="/Gestion/professeur/edit/<?=$params['teacher']->IDP?>" method="post" class="forms-sample">
    <?php else : ?>
      <h1 style="text-align:center">Nouveau Etudiant</h1>
      <form action="/Gestion/professeur/create" method="post" class="forms-sample">
    <?php endif; ?>
      <div class="form-group">
        <label for="exampleInputName1">Nom</label>
        <input name="Nom" type="text" class="form-control <?php echo isset($_SESSION['message']['Nom']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['teacher']->Nom) ? $params['teacher']->Nom : ''; ?>" placeholder="Nom">
        <?php if (isset($_SESSION['message']['Nom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Nom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail3">Prenom</label>
        <input name="Prenom" type="text" class="form-control <?php echo isset($_SESSION['message']['Prenom']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['teacher']->Prenom) ? $params['teacher']->Prenom : ''; ?>" id="exampleInputEmail3" placeholder="Prenom">
        <?php if (isset($_SESSION['message']['Prenom'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Prenom']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword4">Naissance</label>
        <input name="Naissance" type="date" class="form-control <?php echo isset($_SESSION['message']['Naissance']) ? 'is-invalid' : ''; ?>" value="<?php echo isset($params['teacher']->Naissance) ? $params['teacher']->Naissance : ''; ?>" id="exampleInputPassword4" placeholder="Naissance">
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
        <label for="exampleInputCity1">Grade</label>
        <input type="text" value="<?php echo isset($params['teacher']->Grade) ? $params['teacher']->Grade : ''; ?>" name="Grade" class="form-control <?php echo isset($_SESSION['message']['Grade']) ? 'is-invalid' : ''; ?>" id="exampleInputCity1" placeholder="Grade">
        <?php if (isset($_SESSION['message']['Grade'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Grade']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputCity1">Salaire</label>
        <input type="number" value="<?php echo isset($params['teacher']->Grade) ? $params['teacher']->Salaire : ''; ?>" name="Grade" class="form-control <?php echo isset($_SESSION['message']['Salaire']) ? 'is-invalid' : ''; ?>" id="exampleInputCity1" placeholder="Salaire">
        <?php if (isset($_SESSION['message']['Salaire'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Salaire']); ?></div>
        <?php endif; ?>
      </div>

      <div class="form-group">
        <label for="exampleInputCity1">Prime</label>
        <input type="number" value="<?php echo isset($params['teacher']->Prime) ? $params['teacher']->Prime : ''; ?>" name="Grade" class="form-control <?php echo isset($_SESSION['message']['Prime']) ? 'is-invalid' : ''; ?>" id="exampleInputCity1" placeholder="Prime">
        <?php if (isset($_SESSION['message']['Prime'])) : ?>
          <div class="invalid-feedback"><?php echo htmlspecialchars($_SESSION['message']['Prime']); ?></div>
        <?php endif; ?>
      </div>

      <?php if (isset($params['teacher'])) : ?>
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
