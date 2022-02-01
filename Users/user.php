<?php

function getRandomElement(array $array)
{
  return $array[array_rand($array)];
}

function calculateAge(string $birthday): int
{
  $date = new DateTime($birthday);
  $now = new DateTime();
  $interval = $now->diff($date);
  return  $interval->y;
}


$userList = [
  ['name' => 'Pierre', 'birthday' => '2000-09-23'],
  ['name' => 'Jean-François', 'birthday' => '2001-04-31'],
  ['name' => 'Melvyn', 'birthday' => '2002-06-05'],
  ['name' => 'Tom', 'birthday' => '2001-07-15'],
  ['name' => 'Mathis', 'birthday' => '2002-05-22']
];

$randomUser = getRandomElement($userList);
$randomUserName = $randomUser['name'];
$randomUserAge = calculateAge($randomUser['birthday']);

echo "$randomUserName tu as été choisi !\n";
echo "Tu as $randomUserAge ans !";


