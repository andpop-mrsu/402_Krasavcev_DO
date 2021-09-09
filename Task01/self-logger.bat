@echo off

chcp 65001>nul

where sqlite3>nul 2>nul
if %ERRORLEVEL% NEQ 0 ( echo Команда sqlite3 не найдена & pause & exit ) 
echo create table if not exists bd(User varchar(10), Date text default current_timestamp); | sqlite3 bd.db
echo insert into bd values('%USERNAME%', datetime('now', 'localtime')); | sqlite3 bd.db

echo Имя программы: %~nx0
echo|<nul set /p="Количество запусков: "
echo select count(*) from bd; | sqlite3 bd.db
echo|<nul set /p="Первый запуск: "
echo select Date from bd order by Date asc limit 1; | sqlite3 bd.db

echo.
echo select * from bd; | sqlite3 -table bd.db
echo. 

pause