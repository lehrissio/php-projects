<?php
/* Employee Salary Analysis (Part 1)
Background Scenario:

Embark on a challenge to navigate the complex financial landscapes of a company's salary expenditures. With employees dispersed across various departments, each making unique contributions to the company's success, your mission is to efficiently analyze and manage these financial records. 💼📊

Data Provided:
You will work with three associative arrays representing the monthly salaries of employees across different departments. Each array maps employee names to their respective monthly salaries in dollars.

$hrSalaries
Example: $hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];

$salesSalaries
Example: $salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];

$itSalaries
Example: $itSalaries = ['Fiona' => 5300, 'George' => 5600, 'Hannah' => 5900, 'Ivan' => 6400];

Note: The arrays will be provided during testing; ensure to use these variable names accurately.

Tasks:
Calculate Departmental Expenditures: Begin by summing up the salaries in each department to calculate the monthly salary expenditure. Then, create an associative array named $totals to consolidate this information, structured as follows: [ 'HR' => $hrTotal, 'Sales' => $salesTotal, 'IT' => $itTotal ].

Example: $totals =[ 'HR' => 16500, 'Sales' => 16300, 'IT' => 23400];

Determine the Highest Expenditure: Analyze the total expenditures across the departments to pinpoint the one with the highest monthly salary expenditure. Record this department's name in a variable named $maxDept.

Example: 'IT'

In the test data provided, there will always be exactly one department with the maximum salary expenditure. This ensures you don't have to deal with the edge case of multiple departments sharing the highest total salary expenditure.

You will be provided with 3 arrays: $hrSalaries, $salesSalaries, $itSalaries

Write your code here
*/

$hrTotal = 0;
$salesTotal = 0;
$itTotal = 0;

foreach ($hrSalaries AS $value) {
    $hrTotal += $value;
}

foreach ($salesSalaries AS $value) {
    $salesTotal += $value;
}

foreach ($itSalaries AS $value) {
    $itTotal += $value;
}

$totals = ['HR' => $hrTotal, 'Sales' => $salesTotal, 'IT' => $itTotal];

$maxDept = array_search(max($totals), $totals);

/* Employee Salary Analysis (Part 2)

Data Provided:
You are equipped with three associative arrays representing the monthly salaries of employees in different departments, with each array mapping employee names to their respective monthly salaries in dollars.

$hrSalaries
Example: $hrSalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];

$salesSalaries
Example: $salesSalaries = ['David' => 6200, 'Elena' => 4800, 'Fiona' => 5300];

$itSalaries
Example: $itSalaries = ['Fiona' => 5300, 'George' => 4800, 'Hannah' => 5900, 'Ivan' => 6400];

Note: These arrays will be provided during testing; ensure to accurately use these variable names.

Tasks
Consolidate Departmental Records: Your task is to combine all departmental salary records into a single associative array named $companySalaries. This unified array should list every employee across all departments, mapping their names to their monthly salaries.

Example: $companySalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500, 'David' => 6200, ...];

The order in which employees appear in your $companySalaries array is not important for the purposes of this task and will not be a factor in testing

Identify the Minimum Salary: After consolidating the records, examine $companySalaries to identify the employee(s) with the lowest monthly salary.  Save this information in an associative array, adopting the format [name => salary], and store it in a variable named $lowestSalaries.

Given that there might be instances where more than one employee shares the lowest salary, capture all such cases.

Example: $lowestSalaries = ['Elena' => 4800, 'George' => 4800 ];

You will be provided with 3 arrays: $hrSalaries, $salesSalaries, $itSalaries

Write your code here */

$hrTotal = 0;
$salesTotal = 0;
$itTotal = 0;

$companySalaries = array_merge($hrSalaries, $salesSalaries, $itSalaries);

$lowestSalaries;

foreach ($companySalaries as $key => $value) {
    if ($value === min($companySalaries)) {
        $lowestSalaries[$key] = $value;
    }
}

/* Employee Salary Analysis (Part 3)

Background Scenario:
Advance into the deeper intricacies of financial management within the company's ecosystem. Armed with the comprehensive salary data across all departments consolidated into the $companySalaries array, embark on a mission to optimize salary expenditures with strategic adjustments. Your analytical skills will play a pivotal role in balancing the scales of financial fairness and operational efficiency. 💼📊

Data Provided:
You will work with a single associative array named $companySalaries, representing the monthly salaries of all employees within the company. Each entry maps employee names to their respective monthly salaries in dollars.

Example: $companySalaries = ['Alice' => 5000, 'Bob' => 6000, 'Charlie' => 5500];

Tasks:
Compute the Average Salary: Determine the overall average monthly salary for the entire company using the $companySalaries array. Save this value in a variable named $averageSalary.

Example: $averageSalary = 5500;

Adjust Salary Records:
For employees earning less than the average salary, apply a $200 raise to their current salary.

For employees earning more than the average salary, reduce their salary by 5%.
For employees earning exactly the average salary, their salary does not change at all.
Ensure these adjustments are accurately reflected in the $companySalaries array.

Example: $companySalaries = ['Alice' => 5200, 'Bob' => 5700, 'Charlie' => 5500];

Evaluate Financial Impact: Calculate the net financial impact of the salary adjustments on the company's overall budget. Determine if these adjustments result in an increase in expenses or a reduction, indicating savings. Provide a precise statement about this financial impact, using the format:

"The net impact of the salary adjustments is a cost increase of $X for the company." if the adjustments lead to an increase in overall salary expenses, or in zero cost increase, indicating no change in overall salary expenses.

"The net impact of the salary adjustments is a savings of $X for the company." if the adjustments result in a decrease in overall salary expenses. Ensure the output does not include a negative sign (-) in these scenarios.

Example:
The cost increase due to Alice's raise: +$200
The savings due to Bob's reduction: -$300
Net impact: Savings of $100 ($300 savings - $200 cost)

Given the net impact is savings, the output statement would be: "The net impact of the salary adjustments is a savings of $100 for the company."

Beware: the Udemy IDE cannot handle $$!

It will not properly interpret \$$var: please always use concatenation ('$'. $var) or curly brackets ("\${$var}"), when you are working with $$
*/

$totalBefore = array_sum($companySalaries);

$averageSalary = array_sum($companySalaries)/ count($companySalaries);

foreach ($companySalaries AS $key => $value) {
    if ($value < $averageSalary) {
        $companySalaries[$key] += 200;
    } else if ($value > $averageSalary) {
        $companySalaries[$key] *= 0.95;
    }
}

$totalAfter = array_sum($companySalaries);

$diference = $totalBefore - $totalAfter;

if ($diference > 0) {
    echo "The net impact of the salary adjustments is a savings of \${$diference} for the company.";
} else {
    $difference_positive = abs($diference);
    echo "The net impact of the salary adjustments is a cost increase of \${$difference_positive} for the company.";
}