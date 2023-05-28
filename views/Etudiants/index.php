
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1>Tableau Etudiants </h1>
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
                            Adresse
                          </th>
                          <th>
                            Lieu
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <?php foreach($params['students'] as $student):?>
                        <tbody>
                        <tr>
                          <td>
                            <?=$student->Matricule?>
                          </td>
                          <td>
                          <?=$student->Nom?>
                          </td>
                          <td>
                          <?=$student->Prenom?>
                          </td>
                          <td>
                          <?=$student->Adresse?>
                          </td>
                          <td>
                          <?=$student->Lieu?>
                          </td>
                           <td style="display: flex;justify-content:space-around;">
                            <a href="/Gestion/etudiant/delete/<?=$student->Matricule?>"><i style="color: red;"  class="fas fa-trash"></i></a>
                            <a href="/Gestion/etudiant/edit/<?=$student->Matricule?>"><i style="color:dimgrey;" class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                       </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>