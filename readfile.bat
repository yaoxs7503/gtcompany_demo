echo off
set INTERVAL=1
:Again
echo "��ʼɨ��ͼƬ"
set php="D:\NewXAMPP\php\php.exe"
%php% -f D:\NewXAMPP\htdocs\www\Bc_demo\readfile.php
timeout %INTERVAL%
goto Again
pause