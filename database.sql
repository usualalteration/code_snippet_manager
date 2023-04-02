CREATE DATABASE code_snippet_manager;
USE code_snippet_manager;

CREATE TABLE snippets(
id int PRIMARY KEY NOT NULL auto_increment,
linguaggio varchar(25),
descrizione text NOT NULL,
snippet text NOT NULL
);

CREATE TABLE users(
username VARCHAR(25) PRIMARY KEY,
password VARCHAR(16)
);

USE code_snippet_manager;
INSERT INTO users (username,password) VALUES ('Nicole', 'LampadaAdOlio12#');

INSERT INTO snippets(id,linguaggio,descrizione,snippet) VALUES ('1','C++','Find the maximum element in an array',
'#include <iostream>
using namespace std;

int main() {
int arr[] = {5, 2, 8, 3, 9, 1};
int n = sizeof(arr)/sizeof(arr[0]);
int max_element = arr[0];
for(int i=1; i<n; i++) {
if(arr[i] > max_element) {
max_element = arr[i];
}
}
cout << "Max Element: " << max_element;
return 0;
}
');

INSERT INTO snippets(id,linguaggio,descrizione,snippet) VALUES ('2', 'Arduino', 'Print random number between 0 and 10',
'import random

random_number = random.randint(1, 10)
print(random_number)
');

INSERT INTO snippets(id,linguaggio,descrizione,snippet) VALUES ('3', 'Javascript', 'Swap two variables without using a temporary variable',
'let a = 5;
let b = 7;

a = a + b;
b = a - b;
a = a - b;

console.log("a =", a);
console.log("b =", b);
');

INSERT INTO snippets(id,linguaggio,descrizione,snippet) VALUES ('4', 'Java', 'Factorial with recursion',
'public static int factorial(int n) {
if (n == 0) {
return 1;
} else {
return n * factorial(n - 1);
}
}

int num = 5;
int result = factorial(num);
System.out.println(result);');

INSERT INTO snippets(id,linguaggio,descrizione,snippet) VALUES ('5', 'PHP', 'Sort an array in descending order',
'$array = array(5, 2, 8, 3, 9, 1);

rsort($array);

print_r($array);');
