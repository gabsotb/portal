<h1>Eia project surrounding speciess List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Project surrounding</th>
      <th>Birds animals</th>
      <th>Trees vegetation</th>
      <th>Fisheries</th>
      <th>Token</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($eia_project_surrounding_speciess as $eia_project_surrounding_species): ?>
    <tr>
      <td><a href="<?php echo url_for('projectSorroundingSpecies/show?id='.$eia_project_surrounding_species->getId()) ?>"><?php echo $eia_project_surrounding_species->getId() ?></a></td>
      <td><?php echo $eia_project_surrounding_species->getProjectSurroundingId() ?></td>
      <td><?php echo $eia_project_surrounding_species->getBirdsAnimals() ?></td>
      <td><?php echo $eia_project_surrounding_species->getTreesVegetation() ?></td>
      <td><?php echo $eia_project_surrounding_species->getFisheries() ?></td>
      <td><?php echo $eia_project_surrounding_species->getToken() ?></td>
      <td><?php echo $eia_project_surrounding_species->getCreatedAt() ?></td>
      <td><?php echo $eia_project_surrounding_species->getUpdatedAt() ?></td>
      <td><?php echo $eia_project_surrounding_species->getCreatedBy() ?></td>
      <td><?php echo $eia_project_surrounding_species->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projectSorroundingSpecies/new') ?>">New</a>
