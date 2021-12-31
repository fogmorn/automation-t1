# automation-t1
Тестовое задание по автоматизации.


## Дано
Необходимо создать три веб сервера: один FrontEnd и два BackEnd.  
На FrontEnd Веб страничка, запрашивающая ввести два числа, и кнопка «Посчитать».  
Веб сервера на NGINX или Apache, страничка на PHP и/или Python, может что-нибудь своё, главное результат.


## Задание
1. При нажатии кнопки «Посчитать», FrontEnd сервер должен через первый BackEnd посчитать сумму чисел, а через второй их перемножение и отобразить результат.
2. На страничке необходимо отобразить имена серверов, на которых осуществлялись вычисления, причем имя сервера должен сообщить именно BackEnd.


## Условия реализации
1. Собрать докер образы для FrontEnd и BackEnd.
2. Запустить контейнеры так, чтобы можно было получить результат, а именно: зайти на FrontEnd, ввести два числа и получить их математические вычисления с именами серверов, на которых эти вычисления осуществлялись.
3. Всё должно развернуться автоматически средствами Jenkins при пуше в GitHub.


## Решение

### Настройка связки GitHub, Jenkins, Docker
1. Установил Jenkins и Docker.
2. Связал Jenkins со своей учётной записью GitHub (создал *Personal access tokens* в GitHub и использовал его в Jenkins).
3. В Jenkins создал Job automation-t1 и настроил на этот репозиторий в GitHub.
4. В job использовал Shell-команды docker.


### Создание FrontEnd сервера
Создан Docker контейнер [FrontEnd](front1) с [nginx](front1/nginx_conf/site.conf) и [сайтом](front1/site_static) в /var/www/html/site.  
Сайт состоит из HTML странички и двух php скриптов - для сложения и умножения.  
[HTML страничка](front1/site_static/index.html) состоит из *формы* для ввода значений, *кнопки* отправки формы, *JavaScript* кода и *iframe* для отображения результатов.  
Так как было необходимо на одной страничке выводить результаты вычислений от разных BackEnd серверов, я использовал решение с JavaScript для отправки значений на сервера и iframe для отображения результатов.  
Для получения имени сервера используется функция *gethostname*.

### Создание BackEnd сервера
Созданы Docker контейнеры [back1-add](back1) и [back1-multiply](back2) c php-fpm.

### Объединение серверов FrontEnd и BackEnd
Для того чтобы все контейнеры работали вместе, был создан [docker-compose](docker-compose.yml) файл.  
Также был подключен каталог сайта с FrontEnd на BackEnd сервера чтобы можно было выполнять php скрипты.

### Конечный результат
![automation-t1_result](https://user-images.githubusercontent.com/49227124/147823885-0cf63be1-82cb-443a-addc-d64dcbf6ac6c.png)

<details><summary>Проверка подключения Jenkins и GitHub</summary>
  <img src="https://user-images.githubusercontent.com/49227124/147824412-368f0660-3e06-4105-8546-df003a501911.png" alt="Jenkins_github_test_connection"/>
</details>

<details><summary>Настройка команд в Jenkins</summary>
  <img src="https://user-images.githubusercontent.com/49227124/147825099-c25b113b-361a-461c-a7e0-fa4812edfef8.png" alt="Jenkins_job_shell_cmd_docker" /img>
</details>
