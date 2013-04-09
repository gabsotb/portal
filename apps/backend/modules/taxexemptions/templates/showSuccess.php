<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tax_exemption_details->getId() ?></td>
    </tr>
    <tr>
      <th>Office name:</th>
      <td><?php echo $tax_exemption_details->getOfficeName() ?></td>
    </tr>
    <tr>
      <th>Office code:</th>
      <td><?php echo $tax_exemption_details->getOfficeCode() ?></td>
    </tr>
    <tr>
      <th>Company name:</th>
      <td><?php echo $tax_exemption_details->getCompanyName() ?></td>
    </tr>
    <tr>
      <th>Investment certificate:</th>
      <td><?php echo $tax_exemption_details->getInvestmentCertificate() ?></td>
    </tr>
    <tr>
      <th>Company tin:</th>
      <td><?php echo $tax_exemption_details->getCompanyTin() ?></td>
    </tr>
    <tr>
      <th>Declarant name:</th>
      <td><?php echo $tax_exemption_details->getDeclarantName() ?></td>
    </tr>
    <tr>
      <th>Declarant reference:</th>
      <td><?php echo $tax_exemption_details->getDeclarantReference() ?></td>
    </tr>
    <tr>
      <th>Declarant code:</th>
      <td><?php echo $tax_exemption_details->getDeclarantCode() ?></td>
    </tr>
    <tr>
      <th>Electronic request number:</th>
      <td><?php echo $tax_exemption_details->getElectronicRequestNumber() ?></td>
    </tr>
    <tr>
      <th>Electronic authrization number:</th>
      <td><?php echo $tax_exemption_details->getElectronicAuthrizationNumber() ?></td>
    </tr>
    <tr>
      <th>Customs declaration reference:</th>
      <td><?php echo $tax_exemption_details->getCustomsDeclarationReference() ?></td>
    </tr>
    <tr>
      <th>Revenue officer:</th>
      <td><?php echo $tax_exemption_details->getRevenueOfficer() ?></td>
    </tr>
    <tr>
      <th>Revenue officer e verification date:</th>
      <td><?php echo $tax_exemption_details->getRevenueOfficerEVerificationDate() ?></td>
    </tr>
    <tr>
      <th>Revenue officer remarks:</th>
      <td><?php echo $tax_exemption_details->getRevenueOfficerRemarks() ?></td>
    </tr>
    <tr>
      <th>Rdb officer remarks:</th>
      <td><?php echo $tax_exemption_details->getRdbOfficerRemarks() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $tax_exemption_details->getStatus() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $tax_exemption_details->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $tax_exemption_details->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $tax_exemption_details->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $tax_exemption_details->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('taxemptions/edit?id='.$tax_exemption_details->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('taxemptions/index') ?>">List</a>
