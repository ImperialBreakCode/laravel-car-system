# Laravel Car Management System

## Overview

This is a simple PHP Laravel project for managing information about cars, manufacturers, and models. The project includes a search functionality and integrates the Backpack Admin Panel for easy administration.

## Installation (with docker)

1. Create docker image:

   ```bash
   docker build -t car-system .
   ```
2. Run docker container:
   ```bash
   docker run -d -p 8000:8000 car-system
   ```

## Database structure

All tables have an index number as an id and timestamps for when they were created and updated.

1. Manufacturers
   - **name** (*unique*) - string
   - **slug** (*unique*) - string
   - **founded** - date

2. Models (manufacturer_models)
   - **name** (*unique*) - string
   - **slug** (*unique*) - string
   - **manufacturer_id** - fk, references <code>manufacturers</code> (one manufacturer has many models)

3. Cars
   - **year_of_manufacturing** - year
   - **kilometers_traveled** - unsigned integer
   - **manufacturer_id** - fk, references <code>manufacturers</code> (one manufacturer has many cars)
   - **model_id** - fk, references <code>manufacturer_models</code> (Models) (one model has many cars)
   - **image** (*max length: 255*) string - path to the location of the image

## Routes and Views

1. ### Home
   - **/** - The central hub of the car system, from which all views, including the admin panel, are accessible.

2. ### Car

   - **/cars** - Lists all cars. The information about each car is shown in a card. The view includes a search form/
   - **/cars/search?search={searchTerm}** - Searches car by year, model or manufacturer.
   - **/car/{index}** - Shows inforamtion about a car with an id <code>index</code>

3. ### Models
   - **/models** - Lists all models in a table
   - **/model/{slug}** - Shows a single model with a slug <code>slug</code>

4. ### Manufacturers
   - **/manufacturers** - Lists all manufacturers in a table
   - **/manufacturer/{slug}** - Shows a single manufacturer with a slug <code>slug</code>

5. ### Admin pannel
   - the pannel is accessable at **/admin** and has all crud operations for every db table.

## Database Seeding
Database seeding is available. If Docker is used for installation, the database will be seeded automatically. Otherwise, run the command below:
```bash
php artisan db:seed
```
  - admin user credentials:
      * email: seed@example.com
      * password: password
