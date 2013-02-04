<h1>Investment applications List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Business name</th>
      <th>Email address</th>
      <th>Phone number</th>
      <th>Application letter</th>
      <th>Executive summary</th>
      <th>Promoter profile</th>
      <th>Project backgroud</th>
      <th>Market study</th>
      <th>Investment plan</th>
      <th>Equity financing</th>
      <th>Income expenditure</th>
      <th>Balance sheet</th>
      <th>Cash flow</th>
      <th>Payback period</th>
      <th>Loan amortazation</th>
      <th>Username logged</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($investment_applications as $investment_application): ?>
    <tr>
      <td><a href="<?php echo url_for('investmentapp/show?id='.$investment_application->getId()) ?>"><?php echo $investment_application->getId() ?></a></td>
      <td><?php echo $investment_application->getBusinessName() ?></td>
      <td><?php echo $investment_application->getEmailAddress() ?></td>
      <td><?php echo $investment_application->getPhoneNumber() ?></td>
      <td><?php echo $investment_application->getApplicationLetter() ?></td>
      <td><?php echo $investment_application->getExecutiveSummary() ?></td>
      <td><?php echo $investment_application->getPromoterProfile() ?></td>
      <td><?php echo $investment_application->getProjectBackgroud() ?></td>
      <td><?php echo $investment_application->getMarketStudy() ?></td>
      <td><?php echo $investment_application->getInvestmentPlan() ?></td>
      <td><?php echo $investment_application->getEquityFinancing() ?></td>
      <td><?php echo $investment_application->getIncomeExpenditure() ?></td>
      <td><?php echo $investment_application->getBalanceSheet() ?></td>
      <td><?php echo $investment_application->getCashFlow() ?></td>
      <td><?php echo $investment_application->getPaybackPeriod() ?></td>
      <td><?php echo $investment_application->getLoanAmortazation() ?></td>
      <td><?php echo $investment_application->getUsernameLogged() ?></td>
      <td><?php echo $investment_application->getCreatedAt() ?></td>
      <td><?php echo $investment_application->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('investmentapp/new') ?>">New</a>
