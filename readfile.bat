echo off
set INTERVAL=1
:Again
echo "¿ªÊ¼É¨ÃèÍ¼Æ¬"
set php="D:\NewXAMPP\php\php.exe"
%php% -f D:\NewXAMPP\htdocs\www\Bc_demo\readfile.php
timeout %INTERVAL%
goto Again
pause