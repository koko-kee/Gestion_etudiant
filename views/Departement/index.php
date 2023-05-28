
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Tableau des departements </h1>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                           Capacite
                          </th>
                          <th>
                            Faculte
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <?php foreach($params['departements'] as $departement):?>
                        <tbody>
                        <tr>
                          <td>
                            <?=$departement->NumD?>
                          </td>
                          <td>
                          <?=$departement->Nom?>
                          </td>
                          <td>
                          <?=$departement->Capacite?>
                          </td>
                          <td>
                           <?= $departement->showFaculty($departement->CodeF)->Nom ?>
                          </td>
                           <td style="display: flex;justify-content:space-around;">
                            <a href="/Gestion/departement/delete/<?=$departement->NumD?>"><i style="color: red;"  class="fas fa-trash"></i></a>
                            <a href="/Gestion/departement/edit/<?=$departement->NumD?>"><i style="color:dimgrey;" class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                       </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>