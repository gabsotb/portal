<h1>Business plans List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Investment</th>
      <th>Executive summary</th>
      <th>Promoter profile</th>
      <th>Project background</th>
      <th>Equity financing</th>
      <th>Income statement</th>
      <th>Cashflow statement</th>
      <th>Payback period</th>
      <th>Npv</th>
      <th>Loan amortization</th>
      <th>Implementation plan</th>
      <th>Notes</th>
      <th>Created at</th>
      <th>Updated at</th>
      <th>Created by</th>
      <th>Updated by</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($business_plans as $business_plan): ?>
    <tr>
      <td><a href="<?php echo url_for('businessplan/show?id='.$business_plan->getId()) ?>"><?php echo $business_plan->getId() ?></a></td>
      <td><?php echo $business_plan->getInvestmentId() ?></td>
      <td><?php echo $business_plan->getExecutiveSummary() ?></td>
      <td><?php echo $business_plan->getPromoterProfile() ?></td>
      <td><?php echo $business_plan->getProjectBackground() ?></td>
      <td><?php echo $business_plan->getEquityFinancing() ?></td>
      <td><?php echo $business_plan->getIncomeStatement() ?></td>
      <td><?php echo $business_plan->getCashflowStatement() ?></td>
      <td><?php echo $business_plan->getPaybackPeriod() ?></td>
      <td><?php echo $business_plan->getNpv() ?></td>
      <td><?php echo $business_plan->getLoanAmortization() ?></td>
      <td><?php echo $business_plan->getImplementationPlan() ?></td>
      <td><?php echo $business_plan->getNotes() ?></td>
      <td><?php echo $business_plan->getCreatedAt() ?></td>
      <td><?php echo $business_plan->getUpdatedAt() ?></td>
      <td><?php echo $business_plan->getCreatedBy() ?></td>
      <td><?php echo $business_plan->getUpdatedBy() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('businessplan/new') ?>">New</a>
