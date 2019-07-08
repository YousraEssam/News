<h1 align="center">Welcome to News-Api-Task 👋</h1>
<p>
</p>

## Install

```sh
npm install
```
## After Install
1- Create database DBNAME: ApiTask
2- Clone the git link
3- Copy .envexample file content to a new file .env file
4- Edit the following:

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE= ApiTask
	DB_USERNAME= your username
	DB_PASSWORD= you password

5- Add the following:

	API_STANDARDS_TREE=x
	API_SUBTYPE=apitask
	API_PREFIX=api
	API_VERSION=v1
	API_NAME="My API"
	API_CONDITIONAL_REQUEST=false
	API_STRICT=false
	API_DEFAULT_FORMAT=json
	API_DEBUG=true

6- Load packages:
	composer install
	composer update

7- Load seeder:
	composer dump-autoload
	php artisan migrate:fresh --seed

8- Generate appkey for the project:
	php artisan key:generate

9- Run server: 
	php artisan serve

## Notes:
in Postman:

1- To view all News:    
    set method "GET" and type localhost:8000/news

2- To create new News:    
    set method "POST" and type localhost:8000/news/create
    in Body: add "name, description, writer_id" in keys and their corresponding values to be added in values.
    
3- To edit specific one:    
    set method "POST" and type localhost:8000/news/edit/{id of the element to be editted}    
    in Body: add "name, description, writer_id" in keys and their corresponding values to be added in values.
    and add "method" : "PUT" 

4- to delete specific one (softdelete):
    set method "POST" and type localhost:8000/news/delete/{id of the element to be editted}

## Show your support

Give a ⭐️ if this project helped you!

***
_This README was generated with ❤️ by [readme-md-generator](https://github.com/kefranabg/readme-md-generator)_
