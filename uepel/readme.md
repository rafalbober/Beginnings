# Witryna do zajeć Proj Proj

Do ogarniecia:

    -segregacja plikow view do odpowiednich katalogów teachers, students etc i zmiany w routsach w ziazku z tym
    -FRONTEND
    -refactoring -> admin -> deanerie or deanerie->admin (less changes in other files when it comes to an admin)
    -FRONTEND
    -cofanie do strony poprzedniej
    -FRONTEND
    -przycisk cofania do panelu konkretnego uzytkownika, nie do panelu logowania
    -zabezpieczenie dodawania zytkownikow/przedmiotow, o tym samym mailu,nazwie
    -FRONTEND
    -zabezpieczenie wyswietlania przedmiotow danego naucyzciela
    -FRONTEND
    -prawidlowe paski wylogowywania
    -FRONTEND
    -resetowanie hasel przez admina, losowo przydzielane haslo
    -FRONTEND
    -testy
    -FRONTEND
    -edycja uzytkownikow
    -FRONTEND
    -dodawanie lekcji do przedmiotow
    -FRONTEND
    
    

To configure this application execute:

```bash
# Install prject dependencies
composer install

# Uses example credentials for DB and other services
cp .env.example .env

# Generates key for encryption
php artisan key:generate

# Create DB schema
php artisan migrate:fresh

# Add some example data
php artisan db:seed

# IDE helpers
php artisan ide-helper:generate
php artisan ide-helper:meta
php artisan ide-helper:models --write

mysqldump -u test test -p > tests_codeception/_data/dump.sql
```

To start local server:

```bash
php artisan serve
```
Regenerate datbase dump:

```bash
php artisan migrate:fresh
php artisan db:seed
mysqldump -u test test -p > tests_codeception/_data/dump.sql
```
