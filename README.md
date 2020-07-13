# summerSchool
В ветке dev находится выполненное задание для Летней школы, 1 вариант: Реализовать собственную платёжную систему, которая будет имитировать процесс оплаты банковской картой.
При выполнении использовался PHP 7.2.22, Laravel 5.8,БД MySQL

Проект размещен на heroku, https://ancient-ridge-56464.herokuapp.com/
Сваггер документация находится по запросу /api/documentation, локально работает (http://prntscr.com/th48lz),однако на heroku содержимое блокируется (blocked:mixed-content). 
Данная проблема не была исправлена. Вместо этого была опубликована  документация в google docs со скриншотами сваггер-документации. Она доступна по ссылке https://docs.google.com/document/d/1Hz0Sctwzd1ZSqws8Xk5iB1Gv2USEMI81hWltxAVsfG0/edit?usp=sharing

Данные для авторизации пользователя в методе /api/v1/user/login
admin@test.com
password123

При разворачивании проекта локально или на другом сервере необходимо запписать эти данные в БД при помощи команд
php artisan migrate
php artisan db:seed

Для АПИ написаны юнит-тесты
