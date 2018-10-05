# Exercice ex00 : session
|| Exercice : 00 |
|---------------|--|
|***session***
|Dossier de rendu : | *ex00/*     |
|Fichiers à rendre :| *index.php*	|
|Fonctions Autorisées :| *session_start()* |


Créez une page **index.php** qui contient un formulaire permettant de créer/modifier son identifiant et son mot de passe. 

 - le formulaire devra appeler “index.php” et utiliser la méthode “GET” 
 -  le champ identifiant devra s’appeler “login” 
 -  le champ mot de passe devra s’appeler “passwd” 
 -  le bouton submit devra s’appeler “submit” et avoir comme valeur “OK” (si vous ne recevez pas cette valeur dans le champ submit, ne modifiez pas les valeurs stockées dans la session) 
 -  tous les tags du formulaire devront êtres chacun sur une et une seule ligne (voir l’exemple)
 -  les champs déjà renseignés précédemment devront être pré-remplis.

## Exemple d'utilisation


- on commence par tester qu’on reçoit bien le cookie de session au premier accès
```zsh
$> curl -v -c cook.txt 'http://e2r12p3.42.fr:8100/d04/ex00/index.php'
```
```shell
*   Trying 10.12.12.3...
* TCP_NODELAY set
* Connected to e2r12p3.42.fr (10.12.12.3) port 8100 (#0)
> GET /d04/ex00/index.php HTTP/1.1
> Host: e2r12p3.42.fr:8100
> User-Agent: curl/7.54.0
> Accept: */*
>
< HTTP/1.1 200 OK
< Date: Fri, 05 Oct 2018 12:40:59 GMT
< Server: Apache
< X-Frame-Options: SAMEORIGIN
< X-Powered-By: PHP/7.1.22
* Added cookie PHPSESSID="matr67slfgbdr3fr9aou1hrp59" for domain e2r12p3.42.fr, path /, expire 0
< Set-Cookie: PHPSESSID=matr67slfgbdr3fr9aou1hrp59; path=/
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate
< Pragma: no-cache
< Vary: Accept-Encoding
< Content-Length: 331
< Content-Type: text/html; charset=UTF-8
<
```
```html
<html>
    <body>
        <form action="/d04/ex00/index.php" method="get">
            Identifiant: <input type="text" name="login" value=""/><br/>
            <br />
            Mot de passe: <input type="password" name="passwd" id="pwd" value=""/>
            <input type="submit" value="OK">
        </form>
    </body>
</html>
```
```shell
* Connection #0 to host e2r12p3.42.fr left intact
```

- Ensuite on soumet le formulaire et on observe le résultat

```zsh
$> curl -v -b cook.txt 'http://e2r12p3.42.fr:8100/d04/ex00/index.php?login=lolo&passwd=tata&submit=OK'
```
```shell
*   Trying 10.12.12.3...
* TCP_NODELAY set
* Connected to e2r12p3.42.fr (10.12.12.3) port 8100 (#0)
> GET /d04/ex00/index.php?login=lolo&passwd=tata&submit=OK HTTP/1.1
> Host: e2r12p3.42.fr:8100
> User-Agent: curl/7.54.0
> Accept: */*
> Cookie: PHPSESSID=matr67slfgbdr3fr9aou1hrp59
>
< HTTP/1.1 200 OK
< Date: Fri, 05 Oct 2018 12:41:23 GMT
< Server: Apache
< X-Frame-Options: SAMEORIGIN
< X-Powered-By: PHP/7.1.22
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate
< Pragma: no-cache
< Vary: Accept-Encoding
< Content-Length: 339
< Content-Type: text/html; charset=UTF-8
<
```
```html
<html>
    <body>
        <form action="/d04/ex00/index.php" method="get">
            Identifiant: <input type="text" name="login" value="lolo"/><br/>
            <br />
            Mot de passe: <input type="password" name="passwd" id="pwd" value="tata"/>
            <input type="submit" value="OK">
        </form>
    </body>
</html>
```
```shell
* Connection #0 to host e2r12p3.42.fr left intact
```

- Puis on recharge la page sans passer les valeurs dans l’url pour vérifier qu’elles sont toujours présentes

```zsh
$> curl -v -b cook.txt 'http://e2r12p3.42.fr:8100/d04/ex00/index.php'
```
```shell
*   Trying 10.12.12.3...
* TCP_NODELAY set
* Connected to e2r12p3.42.fr (10.12.12.3) port 8100 (#0)
> GET /d04/ex00/index.php HTTP/1.1
> Host: e2r12p3.42.fr:8100
> User-Agent: curl/7.54.0
> Accept: */*
> Cookie: PHPSESSID=matr67slfgbdr3fr9aou1hrp59
>
< HTTP/1.1 200 OK
< Date: Fri, 05 Oct 2018 12:41:55 GMT
< Server: Apache
< X-Frame-Options: SAMEORIGIN
< X-Powered-By: PHP/7.1.22
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate
< Pragma: no-cache
< Vary: Accept-Encoding
< Content-Length: 331
< Content-Type: text/html; charset=UTF-8
<
```
```html
<html>
    <body>
        <form action="/d04/ex00/index.php" method="get">
            Identifiant: <input type="text" name="login" value="lolo"/><br/>
            <br />
            Mot de passe: <input type="password" name="passwd" id="pwd" value="tata"/>
            <input type="submit" value="OK">
        </form>
    </body>
</html>
```
```shell
* Connection #0 to host e2r12p3.42.fr left intact
```

- Dernière étape on enlève le cookie de la requête, et on constate que le formulaire est de nouveau vierge et que PHP nous envoie un nouveau cookie de session

```zsh
$> curl -v 'http://e2r12p3.42.fr:8100/d04/ex00/index.php'
```
```shell
*   Trying 10.12.12.3...
* TCP_NODELAY set
* Connected to e2r12p3.42.fr (10.12.12.3) port 8100 (#0)
> GET /d04/ex00/index.php HTTP/1.1
> Host: e2r12p3.42.fr:8100
> User-Agent: curl/7.54.0
> Accept: */*
>
< HTTP/1.1 200 OK
< Date: Fri, 05 Oct 2018 12:43:52 GMT
< Server: Apache
< X-Frame-Options: SAMEORIGIN
< X-Powered-By: PHP/7.1.22
< Set-Cookie: PHPSESSID=b7nl19qseh7osaimhbpvjup9r3; path=/
< Expires: Thu, 19 Nov 1981 08:52:00 GMT
< Cache-Control: no-store, no-cache, must-revalidate
< Pragma: no-cache
< Vary: Accept-Encoding
< Content-Length: 331
< Content-Type: text/html; charset=UTF-8
<
```
```html
<html>
    <body>
        <form action="/d04/ex00/index.php" method="get">
            Identifiant: <input type="text" name="login" value=""/><br/>
            <br />
            Mot de passe: <input type="password" name="passwd" id="pwd" value=""/>
            <input type="submit" value="OK">
        </form>
    </body>
</html>
```
```shell
* Connection #0 to host e2r12p3.42.fr left intact
```
