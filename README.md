# ms_rest-socket-performance
 microservices
 
 что выбрать при разработке микросервисов
 ## Критерии производительности REST vs Socket
 
Требования к Запуску Теста:<br>
- Composer<br>
- ^PHP7<br>
- PHP Sockets Extensions Installed<br>
 
Перейдите в корневой каталог<br>
1. Запустите composer install для установки необходимых пакетов
2. Откройте 3 вкладки в консоле
3. На первой вкладке запустите веб-сервер с помощью: php -S 127.0.0.1:8000 -t http_server/
4. На второй вкладке запустите сокет с помощью: php socket_server/server.php
6. На третей вкладке запустите клиент с помощью: php client.php

__________________________________________________________________________________
## TESTING:

HTTP Routing Time: 0.73068189620972 <br>
HTTP GET Time (No Routing): 0.50415706634521 <br>
Socket Test Time: 0.050218820571899 <br>
