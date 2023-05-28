
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Tableau Professeurs</h1>
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
                           Prenom
                          </th>
                          <th>
                            Naissance
                          </th>
                          <th>
                           Sexe
                          </th>
                          <th>
                           Grade
                          </th>
                          <th>
                           Salaire
                          </th>
                          <th>
                            Prime
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <?php foreach($params['teachers'] as $teacher):?>
                        <tbody>
                        <tr>
                          <td>
                            <?=$teacher->IDP?>
                          </td>
                          <td>
                          <?=$teacher->Nom?>
                          </td>
                          <td>
                          <?=$teacher->Prenom?>
                          </td>
                          <td>
                          <?=$teacher->Naissance?>
                          </td>
                          <td>
                          <?=$teacher->Sexe?>
                          </td>
                          <td>
                          <?=$teacher->Grade?>
                          </td>
                          <td>
                          <?=$teacher->Salaire?>
                          </td>
                          <td>
                          <?=$teacher->Prime?>
                          </td>
                           <td style="display: flex;justify-content:space-around;">
                            <a href="/Gestion/professeur/delete/<?=$teacher->IDP?>"><i style="color: red;"  class="fas fa-trash"></i></a>
                            <a href="/Gestion/professeur/edit/<?=$teacher->IDP?>"><i style="color:dimgrey;" class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                       </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>