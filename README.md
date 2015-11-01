PHP V8JS REACTJS
================

Proof of concept combining PHP, V8js and Reactjs.

Requirements
------------

Make sure you have installed Docker.

Installation
------------

Build docker container
```
docker build -t yoshz/php-v8js-reactjs .
```

Install composer dependencies
```
docker run --rm -it -v $PWD:/app -p 9080:80 -u $UID yoshz/php-v8js-reactjs composer install
```

Start docker container
```
docker run --rm -it -v $PWD:/app -p 9080:80 yoshz/php-v8js-reactjs
```

Go to your webbrowser and open `http://localhost:9080/`.