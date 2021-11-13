# The symfony framework starter template
> php version: '>=8.0.7'<br/>
> framework version: '5.3.10'

This template is designed for a quick start of enterprise application development based on the symfony framework.

It contains a ready template of administrative panel, main page template, authorization controllers, etc.

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

> http://127.0.0.1:8000             - homepage<br/>
> http://127.0.0.1:8080             - database control panel<br/>
> http://127.0.0.1:8000/dashboard   - control panel
