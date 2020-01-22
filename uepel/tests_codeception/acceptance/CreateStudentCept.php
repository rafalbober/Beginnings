<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create Student, reset password and delete him');

$I->amOnPage('/admin');
$I->fillField('email', 'admin@ggios.pl');
$I->fillField('password', 'admin');
$I->click('#login_button');
$I->click("Students");
$I->click("Create new Student");

$name = 'Katarzyna';
$surname = 'Żołądź';
$email = 'email@ggios.pl';
$pas = "hehe";

$I->fillField('name', " ");
$I->fillField('surname', " ");
$I->fillField('email', " ");
$I->fillField('password', " ");

$I->click("Create");

$I->see("The name field is required.", "li");
$I->see("The surname field is required.", "li");
$I->see("The email field is required.", "li");
$I->see("The password field is required.", "li");

$I->dontSeeInDatabase('students', [
    'name' => $name,
    'surname' => $surname,
    'email' => $email,
    'password' => $pas
]);

$I->fillField('name', $name);
$I->fillField('surname', $surname);
$I->fillField('email', $email);
$I->fillField('password', $pas);

$I->click("Create");

$I->SeeInDatabase('students', [
    'name' => $name,
    //'surname' => $surname,
    'email' => $email,
    //'password' => $pas
]);

$I->seeCurrentUrlEquals("/deaneries/student_store");

$I->see($email);

$id = $I->grabFromDatabase('students', 'id', [
    'name' => $name
    ]);

$id = "deaneries/student_show/" . $id;

$I->amOnPage($id);

$I->see($name . " " . $surname );

$I->click("Reset password");

$I->seeElementInDOM('#resetModal'); //- przez chwile działało !!!!

$I->click('Reset','#resetModal');
