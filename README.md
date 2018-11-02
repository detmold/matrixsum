# sumowanie wycinka tablicy z tablicy

Matrix summation - https://www.hackerearth.com/practice/algorithms/dynamic-programming/2-dimensional/tutorial/

## Problem

Na wejściu dostajemy: 
- W pierwszej linii parametry $n i $m oddzielone spacją czyli liczbę wierszy i kolumn w danej tablicy dwuwymiarowej oznaczonej jako: $matrix[$n][$m]
- W każdej następnej linii dla każdego $n dostajemy $m elementów oddzielonych spacją
- W następnej linii parametr $q oznaczający liczbę przypadków testowych
- W następnej linii dla każdego $q dostajemy dwie zmienne oddzielone spacją $x i $y, oznaczjące dolny prawy indeks elementu do którego ma być wyznaczony podzbiór do sumy
od $matrix[1][1] do $matrix[$x][$y]

## Algorytm
1. Wyznaczamy tablicę o takich samych wymiarach jak tablica wejściowa $matrix i oznczamy ją jako $satMatrix będzie to tablica zawierająca sumy elementów od $matrix[1][1] do $matrix[$x][$y]
2. Element tablicy $satMatrix[$i][$j] wyznaczamy ze wzoru: $satMatrix[$i][$j] = $matrix[$i][$j] + $satMatrix[$i-1][$j] + $satMatrix[$i][$j-1] - $satMatrix[$i-1][$j-1] przy czym
$satMatrix[1][1] = $matrix[1][1]; dla $i = 1 oraz $j = 1
$satMatrix[$i][1] = $satMatrix[$i-1][1] + $matrix[$i][1]; dla $j = 1 
$satMatrix[1][$j] = $satMatrix[1][$j-1] + $matrix[1][$j]; dla $i = 1
$satMatrix[$i][$j] = $matrix[$i][$j] + $satMatrix[$i-1][$j] + $satMatrix[$i][$j-1] - $satMatrix[$i-1][$j-1]; dla 1 < $i <= $n oraz 1 < $j <= $m  