# Weather information of the city
Laravel Restful API with an endpoint that returns the current weather for any city from weatherstack.com using the weatherstack API. This saves the values ​​returned by the weather information in the database. If the same city is queried again during the same hour, the last saved value is returned from the database

# Develpoment information
This API was developed with PHP 8.1.6, mariadb:10.6, and the Laravel Framework 9.13.0. The development environment is inside a Docker container. The container configuration information is inside the docker-compose.yml file.

# Requirements
- **[Docker installed ](https://docs.docker.com/engine/install/centos/)**
- **[docker-compose installed](https://docs.docker.com/compose/install/)**
- **[Git installed ](https://git-scm.com/downloads)**

# Steps
- 1. Open pc/mac terminal and go to a folder preferred by you.
- 2. Type **git clone https://github.com/yoisar/weatherinfo** to clone this repository in your preferred folder 
- 3. Type **rm -f -r weather-app** command to remove weather-app  folder and prepare for build docker container
- 4. Type **docker-compose up --build –d** command to build docker container
- 5. Type **git restore .** (**include the point**) command to restore delete files with rm command
- 6. Type **docker exec -ti weatherinfo_laravelapp_1 bash** to enter to docker container
- 7. Type **php artisan migrate** to migrate weather database
- 8. Type **exit** and taht´s all!


# API testing
-	**Local test**: http://localhost:8170/api/current/query=New York
-	**Remote test**: http://challenges.lugaronline.com:8170/api/current/query=New York
