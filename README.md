# PHP ~~Annotations~~ Attributes - Purely code or magic?

This is a repo with some examples used in the PHP ~~Annotations~~ Attributes - purely code or magic? talk. 


## How to run these examples? 

First of all you have to get your containers up, make sure you have [docker](https://docs.docker.com/get-docker/) installed and run it:

```bash
docker-compose up -d --build
```

After that, install all composer dependencies using this command:

```bash
docker-compose run composer install
```

## PHP Attributes example

To see the interactive example using PHP 8 attributes access your [localhost](http://localhost:9000/) and start to play with this magic :)

## PHPUnit refactoring code with annotations

To run the tests just run the command below:

```bash
docker-compose run composer phpunit
```
