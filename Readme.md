# Student Score Tracker
A simple PHP program to track user academic progress in terms of score.
This tools is created to assist the user on managing their study time.

## Architecture
### Tools
* PHP
* MariaDB / Mysql
* Mysqli

## Notes
### Adding new language
New language can be added by adding a translated file in `language/` directory named `lang_<tag>.php`.
Add the language `<tag>` to the array in the function `config_language()` in file `include/language.php`

See `language/lang_en.php` for translation reference.

## CSRF
No csrf protection is implemented.