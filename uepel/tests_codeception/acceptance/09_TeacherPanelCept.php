<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('see all links');

$I->amOnPage('/teachers/home');
$I->fillField('email', 'siwy@ggios.pl');
$I->fillField('password', 'hahaha');
$I->click('#login_button');
$I->see("Teacher Panel");

$I->seeLink("Teacher Home", "/teachers/home");
$I->seeLink("About me", "/teachers/index/1");
$I->seeLink("My Subjects", "/subjects/1");
$I->seeLink("Add new Subject", "/subjects/create");


$I->wantTo("use all links on Teacher Panel page");
$I->click("About me");
$I->seeCurrentUrlEquals("/teachers/index/1");

$I->click("Teacher Home");

$I->click("My Subjects");
$I->seeCurrentUrlEquals("/subjects/1");

$I->click("Teacher Home");

$I->click("Add new Subject");
$I->seeCurrentUrlEquals("/subjects/create");

$I->click("Teacher Home");

$I->wantTo("Logout");
$I->click("Zdzisław");

