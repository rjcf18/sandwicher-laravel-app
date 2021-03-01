# Sandwicher Laravel App

<p >
<a href="https://circleci.com/gh/rjcf18/sandwicher-laravel-app"><img src="https://circleci.com/gh/rjcf18/sandwicher-laravel-app.svg?style=shield" alt="CircleCI"></a>
<a href="https://packagist.org/packages/sandwicher/laravel-app"><img src="https://img.shields.io/packagist/v/sandwicher/laravel-app" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/sandwicher/laravel-app"><img src="https://img.shields.io/packagist/dt/sandwicher/laravel-app" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/sandwicher/laravel-app"><img src="https://img.shields.io/packagist/l/sandwicher/laravel-app" alt="License"></a>
</p>

## Index
* [Summary](#summary)
* [Project Setup](#project-setup)
* [Business Logic Description / Requirements](#business-logic-description--requirements)
* [Tech Specifics](#tech-specifics)
    * [Architecture](#architecture)
    * [Composer](#composer)
    * [CI/CD](#cicd)
* [Next Steps](#next-steps)

## Summary
A proof of concept project to apply some engineering and development concepts.

This project consists in a simple app that will make any sandwich lover's live easier. Right now everybody that wants to have a sandwich from their favourite local sandwich shop needs to write down their preferred choice, and when you have a large group this app might come in handy to manage your group's meals and orders.

## Project Setup

- In order to setup/run the project it is required only to have [docker](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-20-04) and [docker compose](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-compose-on-ubuntu-20-04) installed
- Laravel Sail script was included in the project to handle the docker environment and the execution of commands inside the containers so it will be you best friend to run anything inside the containers.
- In order to configure the project locally you can just sit back, run `./sail setup-project` and just wait for everything to be configured. If no problems occurred in the middle by the end of the command everything should be configured.
- However if you wish to run the commands separately you can also do so by doing the following steps:  
    - The `.env` file should be automatically generated when you run the `./sail` command to setup the project or the docker environment but if you want to do it manually go to the project root and run `cp .env.example .env`. I you don't do it manually, the default `.env` file will be automatically generated at some point from the .env-example one so no problem here.
    - To run any command simply run `./sail <command_you_want_to_run>`. To get the project started run `./sail up -d`. This will setup the docker environment and put all containers running.
    - Run `./sail composer install` to install all our PHP dependencies
    - Run `./sail npm install && ./sail npm run dev` (`./sail npm run prod` for production) to install our Node.js dependencies for the frontend
    - Finally, in order to have the application fully configured you will need to run `./sail artisan migrate`, which will run all database migrations.
    - And that is all. You should be all setup now.
- By now your `.env` file was already generated previously, if you wish to do any change just simply fill the env variables you wish to change like the database name and credentials for example (which are predefined) and then restart your docker environment `./sail down -v && ./sail build && ./sail up -d`
- In order to run all the application tests (`unit` and `acceptance`) run `./sail composer test`

## Business Logic Description / Requirements

- Right now everybody that wants to have a sandwich from their favourite local sandwich shop needs to write down their preferred choice
- We need an application backed by a database to manage this (very complex) process.
- An administrator should be able to add users (people that are going to eat the sandwich, lets call them consumers). 
- The administrator should open up “registration” for a new meal. That stops people from ordering stuff separately all the time.
- A meal has a status that can be controlled by the admin (open and closed).
- Only one meal can be “open” at a single time. And only on an open meal users can register their choice.
- A meal also has a date (the date when the meal is eaten)
- A meal should also have a unique link. This link can be opened on a mobile device (without a password) to check what the current order is.
- Every user should have a unique code he can login with on a certain page. On that page the user can pick:
    - What bread (dropdown list, choices from database)
    - Size of the bread (dropdown, 15 or 30 cm)
    - If it should be oven baked or not
    - Taste of the sandwich (dropdown from database, for instance chicken fajita)
    - Extra’s (extra bacon, double meat or extra cheese)
    - What vegetables you want on the sandwich (dropdown, multiple possible values from the database)
    - What sauce (dropdown from the database)
    - Then the user can place his order (on the current open order).
      
- The user must be able to edit his order (but only when the order/meal is still open).
- The user should also be able to view his previous orders when he is “logged in” by his unique link.

## Tech specifics

### Architecture

This application is following the standard Laravel architecture one which is MVC oriented. The objective here is to have the business logic decoupled from the application in order to be easily used in any application, with any framework. The repository with the domain can be found [here](https://github.com/rjcf18/sandwicher-domain).

Besides decoupling the domain from the application, the other goal would be to decouple the application between the frontend and the backend so that any kind of frontend can communicate with our backend which would be a simple API.

The application is currently undergoing some refactoring to start using the domain for our application's business use cases.

### Composer

This project (both the laravel app and the domain) is currently published to [Packagist](https://packagist.org/) so it can easily be imported via composer to any project.

### CI/CD

The project is integrated with CircleCI to run our tests pipeline (link above).

Currently it is only running the tests but as next steps, a release should be automatically created in the repository with the code after passing all tests to avoid doing this process manually

## Next steps

- Currently the application is very "Laravel oriented" and still needs some refactoring and improvements.
- Like mentioned previously the next steps to improve this application would be the following:
    - Build acceptance tests for the application in order to have all flows covered and written with business readable steps using [Gherkin](https://cucumber.io/docs/gherkin/reference/) language (project is already setup with a base [Behat](https://docs.behat.org/en/latest/) structure for building these acceptance tests)
    - Decouple framework from the application domain (The domain development is already underway [here](https://github.com/rjcf18/sandwicher-domain))
    - After finishing the domain development, use the latest version of the domain in the application to avoid having business logic coupled with the application and frameworks/tools
    - Automate github repository release creation process in CircleCI so that each time the pipeline runs and all the tests pass a new release is generated automatically
    - Decouple frontend from backend by having a completely independent frontend that communicates with a backend API that provides the necessary functionality and data to the frontend
