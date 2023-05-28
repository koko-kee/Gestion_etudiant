
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
                      <?php foreach($params['modules'] as $module):?>
                        <tbody>
                        <tr>
                          <td>
                            <?=$module->CodeM?>
                          </td>
                          <td>
                          <?=$module->Nom?>
                          </td>
                          <td>
                          <?=$module->description?>
                          </td>
                           <td style="display: flex;justify-content:space-around;">
                            <a href="/Gestion/module/delete/<?=$module->CodeM?>"><i style="color: red;"  class="fas fa-trash"></i></a>
                            <a href="/Gestion/module/edit/<?=$module->CodeM?>"><i style="color:dimgrey;" class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                       </tbody>
                      <?php endforeach ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>