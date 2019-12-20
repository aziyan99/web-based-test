# CI - WBT

CI - WBT is web for high school exam exactly or for home work, its allow teacher to create some question and its explanation based on courses and student class, its also allow to print result of the test or exam to pdf. 


## Feature
1. Authentication Module
2. User Access Management 
3. Menu Management
4. User Management
5. Question Management
6. Class Management
7. Courses Management
8. Sign Up For New Users
9. Announcement Module


## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. You can change or modife fully this project 


### Database Setting

    
First you must create database in your mysql server, then you must import sql file in ``` \db\ ``` folder named the database with what you want and then change the database credential in.

```
	Application\config\database.php
```
Change the credential with yours

```
	'hostname' => '(your-database-host)',
	'username' => '(your-database-username)',
	'password' => '(your-database-password)',
	'database' => '(your-database-name)',
```

### URL Setting
After you done with database, then you have to set ``` base_url() ``` for this app, it must same with your folder name in root folder, you can change it in.

```
	Application\config\config.php
```

Change this line 

```
	$config['base_url'] = 'your-folder-name/domain';
```


### Prerequisites

* Minimal Php for support codeigniter3.x
* Web Server Apache2 or Nginx
* ModRewrite Enable in server
* Mysql DBMS

Or you can grab all with ``` Lampp ``` stack like ``` Xampp ```

### Installing

For installing this template you can direct download or clone this project

```
	git clone https://github.com/aziyan99/web-based-test.git
```

## Built With

* [Codeigniter3](https://www.codeigniter.com/)
* [Bootstrap](https://getbootstrap.com/)
* [Jquery](https://jquery.com/)
* [Jquery-easing](http://gsgd.co.uk/sandbox/jquery/easing/) 
* [Datatables](https://datatables.net/) 
* [Fontawesome-free](https://fontawesome.com/) 
* [Chart.js](https://www.chartjs.org/) 

## Spesial Thanks
* [Codeigniter](https://www.codeigniter.com)
* [Startbootstrap](https://startbootstrap.com/)

## Licence
* [MIT](licence.txt)


