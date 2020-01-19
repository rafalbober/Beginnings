<?php
$I = new AcceptanceTester($scenario);

$I->wantTo('see title on homepage');
$I->amOnPage('/');
$I->seeInTitle('Üpel');

$I->wantTo('see login and FAQ links');
$I->seeLink('FAQ');
//$I->seeLink("TEACHER LOGIN", "/teacher/login");
$I->seeLink("TEACHER LOGIN", "/teachers/home");
//$I->seeLink("ADMIN LOGIN", "/admin/login");
$I->seeLink("ADMIN LOGIN", "/admin");
//$I->seeLink('STUDENT LOGIN, '/student/login');
$I->seeLink('STUDENT LOGIN','/student/home');

$I->wantTo("use Faq link");
$I->click("Faq");
$I->seeCurrentUrlEquals("/faq");
$I->see("Faq");


$I->wantTo("use login links");

$I->amOnPage("/");
$I->click("Teacher Login");
$I->seeCurrentUrlEquals("/teacher/login");
$I->see("Login (teacher)");

$I->amOnPage("/");
$I->click("Admin Login");
$I->seeCurrentUrlEquals("/admin/login");
$I->see("Login (admin)");

$I->amOnPage("/");
$I->click("Student Login");
$I->seeCurrentUrlEquals("/student/login");
$I->see("Login");










