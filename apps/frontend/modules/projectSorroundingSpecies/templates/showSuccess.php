<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $eia_project_surrounding_species->getId() ?></td>
    </tr>
    <tr>
      <th>Project surrounding:</th>
      <td><?php echo $eia_project_surrounding_species->getProjectSurroundingId() ?></td>
    </tr>
    <tr>
      <th>Birds animals:</th>
      <td><?php echo $eia_project_surrounding_species->getBirdsAnimals() ?></td>
    </tr>
    <tr>
      <th>Trees vegetation:</th>
      <td><?php echo $eia_project_surrounding_species->getTreesVegetation() ?></td>
    </tr>
    <tr>
      <th>Fisheries:</th>
      <td><?php echo $eia_project_surrounding_species->getFisheries() ?></td>
    </tr>
    <tr>
      <th>Token:</th>
      <td><?php echo $eia_project_surrounding_species->getToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $eia_project_surrounding_species->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $eia_project_surrounding_species->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $eia_project_surrounding_species->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $eia_project_surrounding_species->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projectSorroundingSpecies/edit?id='.$eia_project_surrounding_species->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projectSorroundingSpecies/index') ?>">List</a>
