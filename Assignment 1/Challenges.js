//challenge 1 
int num1 = 10, num2 = 5;
System.out.println("Number 1: " + num1);
System.out.println("Number 2: " + num2);
System.out.println("Addition: " + (num1 + num2));
System.out.println("Subtraction: " + (num1 - num2));
System.out.println("Multiplication: " + (num1 * num2));
System.out.println("Division: " + (num1 / num2));
System.out.println("Modulus: " + (num1 % num2));

//Challenge 2 
int input = 7;
System.out.println("\nInput: " + input);
System.out.println(input + (input % 2 == 0 ? " is an even number." : " is an odd number."));

//Challenge 3
int number = 10;
System.out.println("\nStarting number: " + number);
number++;
System.out.println("After increment: " + number);
number--;
System.out.println("After decrement: " + number);

//Challenge 4 
int marks = 85;
System.out.println("\nInput: " + marks);
if (marks >= 90) {
    System.out.println("You got an A!");
} else if (marks >= 80) {
    System.out.println("You got a B!");
} else if (marks >= 70) {
    System.out.println("You got a C!");
} else if (marks >= 60) {
    System.out.println("You got a D!");
} else {
    System.out.println("You got an F!");
}

//Chanlleng 5 
int year = 2024;
System.out.println("\nInput: " + year);
if ((year % 4 == 0 && year % 100 != 0) || (year % 400 == 0)) {
    System.out.println(year + " is a leap year.");
} else {
    System.out.println(year + " is not a leap year.");
}
