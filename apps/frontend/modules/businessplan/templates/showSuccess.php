<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $business_plan->getId() ?></td>
    </tr>
    <tr>
      <th>Investment:</th>
      <td><?php echo $business_plan->getInvestmentId() ?></td>
    </tr>
    <tr>
      <th>Executive summary:</th>
      <td><?php echo $business_plan->getExecutiveSummary() ?></td>
    </tr>
    <tr>
      <th>Promoter profile:</th>
      <td><?php echo $business_plan->getPromoterProfile() ?></td>
    </tr>
    <tr>
      <th>Project background:</th>
      <td><?php echo $business_plan->getProjectBackground() ?></td>
    </tr>
    <tr>
      <th>Equity financing:</th>
      <td><?php echo $business_plan->getEquityFinancing() ?></td>
    </tr>
    <tr>
      <th>Income statement:</th>
      <td><?php echo $business_plan->getIncomeStatement() ?></td>
    </tr>
    <tr>
      <th>Cashflow statement:</th>
      <td><?php echo $business_plan->getCashflowStatement() ?></td>
    </tr>
    <tr>
      <th>Payback period:</th>
      <td><?php echo $business_plan->getPaybackPeriod() ?></td>
    </tr>
    <tr>
      <th>Npv:</th>
      <td><?php echo $business_plan->getNpv() ?></td>
    </tr>
    <tr>
      <th>Loan amortization:</th>
      <td><?php echo $business_plan->getLoanAmortization() ?></td>
    </tr>
    <tr>
      <th>Implementation plan:</th>
      <td><?php echo $business_plan->getImplementationPlan() ?></td>
    </tr>
    <tr>
      <th>Notes:</th>
      <td><?php echo $business_plan->getNotes() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $business_plan->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $business_plan->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created by:</th>
      <td><?php echo $business_plan->getCreatedBy() ?></td>
    </tr>
    <tr>
      <th>Updated by:</th>
      <td><?php echo $business_plan->getUpdatedBy() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('businessplan/edit?id='.$business_plan->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('businessplan/index') ?>">List</a>
