<?php
  
$annualExpenses = [
    "vacations" => 1000,
    "carRepairs" => 1000,    
];

$monthlyExpenses = [
    "rent" => 1500,
    "utilities" => 200,
    "healthInsurance" => 200
];

$grossSalary = 48150;
$socialSecurity = $grossSalary * .062;

$incomeSegments = [[9700, .88], [29775, .78], [8675, .76]];

// Write your code below:
function calcAnnualSalaryAfterTaxes($arr){
  $num1= $arr[0][0] *  $arr[0][1];
  $num2= $arr[1][0] *  $arr[1][1];
  $num3= $arr[2][0] *  $arr[2][1];
  $total = $num1 + $num2 + $num3;
  echo $total;
  return $total;
}

$netIncome = calcAnnualSalaryAfterTaxes($incomeSegments);

function calcAnnualAfterSocialSecurity($netIncome, $socialSecurity){
  $newNumber = $netIncome - $socialSecurity;
  echo $newNumber;
  return $newNumber;
}
echo "\n";
$netIncome = calcAnnualAfterSocialSecurity($netIncome,$socialSecurity);

function accountForAnnual(&$netIncome, $arr){
 $netIncome -= $arr["vacations"];
 $netIncome -= $arr["carRepairs"];
  return $netIncome;
}
function accountForMonthly(&$monthlyIncome, $arr){
  $monthlyIncome -= $arr["rent"];
  $monthlyIncome -= $arr["utilities"];
  $monthlyIncome -= $arr["healthInsurance"];
  return $monthlyIncome;
}
function determineMonthly($netIncome){
  $netIncome /= 12;
  return $netIncome;
}
$monthlyIncome = determineMonthly($netIncome);
echo  "\n" . $monthlyIncome . " - Monthly income";

$netIncome = accountForMonthly($monthlyIncome, $monthlyExpenses);
echo"\n". $monthlyIncome . " - Monthly income after expenses.";

function determineWeeklyIncome($monthlyIncome){
  $monthlyIncome /= 4.33;
  return $monthlyIncome;
}
$weeklyIncome = determineWeeklyIncome($monthlyIncome);
echo "\n" . $weeklyIncome . " - Weekly income after expenses";

$weeklyExpenses = ["gas" => 25, "food" => 90, "entertainment" => 47];

function accountForWeeklyExpenses($weeklyIncome, $arr){
  $weeklyIncome -= $arr["gas"];
  $weeklyIncome -= $arr["food"];
  $weeklyIncome -= $arr["entertainment"];
  $final = $weeklyIncome;
  return $final;
}
$weeklyIncome = accountForWeeklyExpenses($weeklyIncome, $weeklyExpenses);
echo "\n" . $weeklyIncome . " after weekly expenes";
echo "\n" . $weeklyIncome * 52;