# The symfony framework(6.0.1) starter template
What is required?
> php: '>=8.0.2'<br/>
> composer: '>=2'<br/>
> nodejs: '>=14'<br/>
> yarn: '>=1.22.17'<br/>
> docker: '>= 20.10.12'<br/>
> docker-compose: '>= 1.29.2'<br/>


This template is designed for a quick start of enterprise application development based on the symfony framework.

It contains a ready template of administrative panel, main page template, authorization controllers, etc. Uses docker, 
nginx, php 8, bootstrap 5, stimulus 3

### The following functionality is implemented in the template

1. User locale detection: **[App\EventSubscriber\StartupSubscriber]**
2. Separate entry points and firewalls for the control panel and the user's personal account
3. **[App\Service\DocumentService]** allowing you to add an entry point, set title, description, keywords, etc. 
A global document variable is available for all twig templates
4. ...

## For a quick start, run the following commands:

#### 1. Install the javascript dependencies and run build:
```bash
yarn install && yarn build
# or
npm install && npm run build
```
#### 2. Build and run a docker container
```bash
make build && make start
# or
docker-compose build && docker-compose up -d
# then
make cache-clear (docker exec -it php-fpm php bin/console cache:clear) or go to homepage: http://127.0.0.1:8000
```
#### 3. Update database schema
```bash
make schema-update
# or
docker exec -it php-fpm php bin/console doctrine:schema:update --force
```
#### 4. Add the system administrator and user to the database
```bash
make fixtures
# or
docker exec -it php-fpm php bin/console doctrine:fixtures:load
```

> http://127.0.0.1:8000 - **homepage**<br/>
> http://127.0.0.1:8080 - **database control panel**<br/>
> http://127.0.0.1:8000/dashboard - **control panel** [user: admin@example.com, password: admin_]<br/>
> http://127.0.0.1:8000/account - **user's personal account** [user: user@example.com, password: user_]
