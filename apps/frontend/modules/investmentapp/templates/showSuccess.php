<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $investment_application->getId() ?></td>
    </tr>
    <tr>
      <th>Business name:</th>
      <td><?php echo $investment_application->getBusinessName() ?></td>
    </tr>
    <tr>
      <th>Email address:</th>
      <td><?php echo $investment_application->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Phone number:</th>
      <td><?php echo $investment_application->getPhoneNumber() ?></td>
    </tr>
    <tr>
      <th>Application letter:</th>
      <td><?php echo $investment_application->getApplicationLetter() ?></td>
    </tr>
    <tr>
      <th>Executive summary:</th>
      <td><?php echo $investment_application->getExecutiveSummary() ?></td>
    </tr>
    <tr>
      <th>Promoter profile:</th>
      <td><?php echo $investment_application->getPromoterProfile() ?></td>
    </tr>
    <tr>
      <th>Project backgroud:</th>
      <td><?php echo $investment_application->getProjectBackgroud() ?></td>
    </tr>
    <tr>
      <th>Market study:</th>
      <td><?php echo $investment_application->getMarketStudy() ?></td>
    </tr>
    <tr>
      <th>Investment plan:</th>
      <td><?php echo $investment_application->getInvestmentPlan() ?></td>
    </tr>
    <tr>
      <th>Equity financing:</th>
      <td><?php echo $investment_application->getEquityFinancing() ?></td>
    </tr>
    <tr>
      <th>Income expenditure:</th>
      <td><?php echo $investment_application->getIncomeExpenditure() ?></td>
    </tr>
    <tr>
      <th>Balance sheet:</th>
      <td><?php echo $investment_application->getBalanceSheet() ?></td>
    </tr>
    <tr>
      <th>Cash flow:</th>
      <td><?php echo $investment_application->getCashFlow() ?></td>
    </tr>
    <tr>
      <th>Payback period:</th>
      <td><?php echo $investment_application->getPaybackPeriod() ?></td>
    </tr>
    <tr>
      <th>Loan amortazation:</th>
      <td><?php echo $investment_application->getLoanAmortazation() ?></td>
    </tr>
    <tr>
      <th>Username logged:</th>
      <td><?php echo $investment_application->getUsernameLogged() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $investment_application->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $investment_application->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('investmentapp/edit?id='.$investment_application->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('investmentapp/index') ?>">List</a>
