
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
                           Description
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <?php foreach($params['facultes'] as $faculte):?>
                        <tbody>
                        <tr>
                          <td>
                            <?=$faculte->CodeF?>
                          </td>
                          <td>
                          <?=$faculte->Nom?>
                          </td>
                          <td>
                          <?=$faculte->Description?>
                          </td>
                           <td style="display: flex;justify-content:space-around;">
                            <a href="/Gestion/faculte/delete/<?=$faculte->CodeF?>"><i style="color: red;"  class="fas fa-trash"></i></a>
                            <a href="/Gestion/faculte/edit/<?=$faculte->CodeF?>"><i style="color:dimgrey;" class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                       </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>