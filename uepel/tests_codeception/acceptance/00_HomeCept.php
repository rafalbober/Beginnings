<?php
$I = new AcceptanceTester($scenario);

$I->wantTo('see title on homepage');
$I->amOnPage('/');
$I->seeInTitle('Üpel');

$I->wantTo('see login and FAQ links');
$I->seeLink('Faq');
$I->seeLink("Teacher Panel", "/teachers/home");
$I->seeLink("Deanery Panel", "/admin");
$I->seeLink('Student Panel','/student/home');

$I->wantTo("use Faq link");
$I->click("Faq");
$I->seeCurrentUrlEquals("/faq");
$I->see("Faq");


$I->wantTo("use login links");

$I->amOnPage("/");
$I->click("Teacher Panel");
$I->seeCurrentUrlEquals("/teacher/login");
$I->see("Login Teacher");

$I->amOnPage("/");
$I->click("Deanery Panel");
$I->seeCurrentUrlEquals("/admin/login");
$I->see("Login Admin");

$I->amOnPage("/");
$I->click("Student Panel");
$I->seeCurrentUrlEquals("/student/login");
$I->see("Login Student");










