<?php
// Challenge 1: Arithmetic Operations
$num1 = 10;
$num2 = 5;
echo "Number 1: $num1<br>";
echo "Number 2: $num2<br>";
echo "Addition: " . ($num1 + $num2) . "<br>";
echo "Subtraction: " . ($num1 - $num2) . "<br>";
echo "Multiplication: " . ($num1 * $num2) . "<br>";
echo "Division: " . ($num1 / $num2) . "<br>";
echo "Modulus: " . ($num1 % $num2) . "<br>";

// Challenge 2: Even or Odd
$input = 7;
echo "<br>Input: $input<br>";
echo ($input % 2 == 0) ? "$input is an even number.<br>" : "$input is an odd number.<br>";

// Challenge 3: Increment and Decrement
$number = 10;
echo "<br>Starting number: $number<br>";
$number++;
echo "After increment: $number<br>";
$number--;
echo "After decrement: $number<br>";

// Challenge 4: Grade Classification
$marks = 85;
echo "<br>Input: $marks<br>";
if ($marks >= 90) {
    echo "You got an A!<br>";
} elseif ($marks >= 80) {
    echo "You got a B!<br>";
} elseif ($marks >= 70) {
    echo "You got a C!<br>";
} elseif ($marks >= 60) {
    echo "You got a D!<br>";
} else {
    echo "You got an F!<br>";
}

// Challenge 5: Leap Year
$year = 2024;
echo "<br>Input: $year<br>";
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a leap year.<br>";
} else {
    echo "$year is not a leap year.<br>";
}
?>
