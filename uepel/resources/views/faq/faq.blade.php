@extends('layouts.app')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Üpel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .content {
               position: absolute;
                top: 50px;
                padding: 10%;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div>
                    <h4>FAQ</h4>
                    <ol>
                        <li>How can I get my password back?</li>
                        <p> - Please contact Your deanery via email or physically.</p>
                        <li>How to join the subject?</li>
                        <p> - Go to Available Subjects and join it, r u dumb?</p>
                        <li>How to create subject as a teacher?</li>
                        <p> - There is a button for it literally everywhere.</p>
                        <li>I didn't make to the next semester. What now?</li>
                        <p> - Well, we will drop you from the database. Good luck!</p>
                        <li>My teacher gave me wrong degree. How can I fix it?</li>
                        <p> - Just hack his account and change it for you and your colleges!</p>
                    </ol>
                </div>
            </div>
    </body>
</html>
