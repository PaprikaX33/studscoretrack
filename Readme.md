# Student Score Tracker
A simple PHP program to track user academic progress in terms of score.
This tools is created to assist the user on managing their study time.

## Architecture
### Tools
* PHP
* MariaDB / Mysql
* Mysqli

## About
### Score
Score is in the range between 0 and 100

### Maximum Score
Assuming the total test weight for the course is still less than 100, the maximum score calculates the maximum possible score obtained in the course based on the given number of test beforehand.

If total sum of weight exceeds 100, the value of in maximum score will not be usefull

## Notes
### Config Dbconfig.json
The file `config/dbconfig.json` contains an example database parameter.
Replace the information contained in the `config/dbconfig.json` file before use

### Adding new language
New language can be added by adding a translated file in `language/` directory named `lang_<tag>.php`.
Add the language `<tag>` to the array in the function `config_language()` in file `include/language.php`

See `language/lang_en.php` for translation reference.

### Test Score Weight
Test score weight should be added in total to 100.
If the total weight is over than 100, then 

## CSRF
No csrf protection is implemented.

