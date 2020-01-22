<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('add subject and delete it');

$I->amOnPage('/teachers/home');
$I->fillField('email', 'siwy@ggios.pl');
$I->fillField('password', 'hahaha');
$I->click('#login_button');
$I->click("Add new Subject");


$name = 'Leżakowanie';
$description = 'opis';
$capacity = '20';

$I->fillField('name', " ");
$I->fillField('description', " ");
$I->fillField('capacity', " ");

$I->click("Create");

$I->see("The name field is required.", "li");
$I->see("The capacity field is required.", "li");

$I->dontSeeInDatabase('subjects', [
    'name' => $name,
    'description' => $description,
    //"signup_capacity" => $capacity
]);

$I->fillField('name', $name);
$I->fillField('description', $description);
$I->fillField('capacity', "string");

$I->click("Create");

$I->see("The capacity must be an integer.", "li");

$I->dontSeeInDatabase('subjects', [
    'name' => $name,
    'description' => $description,
    //'signup capacity' => $capacity
]);

$I->fillField('name', $name);
$I->fillField('description', $description);
$I->fillField('capacity', $capacity);

$I->click("Create");

$I->dontSee("The name field is required.", "li");
$I->dontSee("The capacity field is required.", "li");
$I->dontSee("The capacity must be an integer.", "li");

//$I->SeeInDatabase('subjects', [
    //'name' => $name,
    //'description' => $description,
    //'signup capacity' => $capacity
//]);

$I->seeCurrentUrlEquals("/teachers/home");

$I->see($name);

$id = $I->grabFromDatabase('subjects', 'id', [
    'name' => $name
]);


$I->amOnPage("subjects/show/" . $id);

$I->wait(10);

$I->click("edit subject");

$I->seeCurrentUrlEquals("/subjects/edit/" . $id);

$I->click("Delete");

$I->dontSeeInDatabase('subjects', [
    'name' => $name,
    'description' => $description,
    //'signup capacity' => $capacity
]);


// Nie widzi w bazach danych dodanych przedmiotów oraz nie widzi kolumny signup capacity
