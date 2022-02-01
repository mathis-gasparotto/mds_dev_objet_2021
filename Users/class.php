<?php


class User {

    public function __construct(public string $firstName, public string $lastName, public string $birthday) {
    }

    public function getAge() : int {
        $date = new DateTime($this->birthday);
        $now = new DateTime();
        $interval = $now->diff($date);
        return  $interval->y;
    }

    public function isAdult() : bool {
        return $this->getAge() >= 18;
    }

    public function getFullName() : string {
        return $this->firstName . " " . $this->lastName;
    }
}

function getRandomElement(array $array) {
    return $array[array_rand($array)];
}

$userList = [
    new User('Pierre', 'FAUCHEUR', '2000-09-23'),
    new User('Jean-François-Regis', 'SIMBARE', '2001-04-31'),
    new User('Melvyn', 'REBECA','2002-06-05'),
    new User('Tom', 'PERRET', '2001-07-15'),
    new User('Mathis', 'GASPAROTTO', '2002-05-22')
];
$randomUser = getRandomElement($userList);
$randomUserName = $randomUser->getFullName();
$randomUserAge = $randomUser->getAge();


echo "$randomUserName tu as été choisi !\n"; ?><br/><?php
echo "Tu as $randomUserAge ans !\n"; ?><br/><?php

if ($randomUser->isAdult()) {
    echo "Tu es majeur !";
} else {
    echo "Tu n'es pas majeur !";
}