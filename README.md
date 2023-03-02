## In the root directory copy ```.env.example``` to ```.env``` and specify MARIADB_ROOT_PASSWORD, MARIADB_PASSWORD variables
```
cp .env.example .env
MARIADB_ROOT_PASSWORD=<root_password>
MARIADB_PASSWORD=<db_password>
```
## Go to app directory
```
cd artists
```
## Copy ```.env.example``` to ```.env``` and specify DB_PASSWORD variable
```
cp .env.example .env
DB_PASSWORD=<db_password>
```
## Go to the parent directory and run app
```
cd ..
make dev
```
## Execute this script for migrating and filling database
```
docker exec -i artists_php bash /entrypoint.sh
```

App URL: ```http://artists.localhost```
API Docs: ```http://artists.localhost/api/documentation```
