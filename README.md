# Device Atlas Assignment | PHP Laravel | VueJs | Docker
<hr>

##  Prerequisites

Make sure you have installed the following prerequisites in your development or production machine.
- PHP : Version 8.1
- Laravel: Version 10.x
- MySQL: Version 8
- Node: Version 16.15.0

## Installation
1. ### Clone the repository:
    ```bash
    git clone https://github.com/ayushmohanan/device-atlas.git
    ```
2. ### Application structure

    ```
    .
    ├── backend             (Laravel 10.x)
    │   ├── app
    │   │   ├── Http
    │   │   └── Models
    │   ├── database
    │   │   └── migrations
    │   ├── routes
    │   └── storage
    │       └── logs
    └── frontend            (Vue.js 2.x)
      └── src
        ├── assets
        └── components
    ```

3. ### In the backend folder rename env.example to .env
   
    ```bash
    
       mv .env.example .env
    
    ```  

4. ### Install the necessary dependencies by running

    ```bash
    
       cd backend
       composer install
    
    ```

   Install Npm modules in vuejs app
   
    ```bash
    
      cd frontend
      npm install
    
   ```
 
4. ### Build the project by running:
    ```bash
      docker-compose up -d --build

5. ### Migrate DB using the following code
     ```bash

     docker-compose exec app php artisan migrate
     docker-compose exec app php artisan db:seed
     
     ```
     OR

     migrate --seed to migrate and seed the database for testing
   
     ```bash
     
     docker-compose exec app php artisan migrate --seed
     
     ```

7. ### Run the project

    1. - the frontend is by default served at [http://localhost:3000/]
    2. - the backend is by default served at  [http://localhost:8080/]

8. ### Curl Get Sorted Tablet Lists & Store Data

     curl --location --request GET 'http://localhost:8080/v1/getSortedList' \
    --header 'Content-Type: application/x-www-form-urlencoded' \
    --data-urlencode 'licencekey=e6ce0b9455cab0e494be4587d016c7c2' \
    --data-urlencode 'useragent=Dalvik/2.1.0 (Linux; U; Android 10; ACTAB1021 Build/QP1A.190711.020)'

   


    curl --location --request POST 'http://localhost:8080/v1/device/store?useragent=Mozilla%2F5.0%20(Linux%3B%20Android%207.0%3B%20Pixel%20C%20Build%2FNRD90M%3B%20wv)%20AppleWebKit%2F537.36%20(KHTML%2C%20like%20Gecko)%20Version%2F4.0%20Chrome%2F52.0.2743.98%20Safari%2F537.36'

9. ### Setup local Environment Backend

   ```bash
   
       .env update pgsql details
   
       php artisan migrate #Migrate the database
       php artisan db:seed #seed the dummy values to db
       php artisan serve #run the backend    
---
10. ### Setup local environment frontend

    ```bash
       npm install
       npm run serve
    ```





