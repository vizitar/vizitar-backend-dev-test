# Vizitar Backend Test

Hello dear developer, in this test we will analyze your general knowledge of PHP and Laravel framework. Below we will explain everything that will be necessary.

## Instructions

The challenge consists of implementing a JSON Rest API using the PHP Laravel framework, and a relational database SQLite, MySQL, or Postgres.
You will create a purchase order registration system with the following functionalities:

- CRUD of customers.
- CRUD of products.
- CRUD of purchase orders, with status (Open, Paid, or Canceled).
- Each CRUD API group:
  - must be filterable and sortable by any field, and have pagination of 10 items.
  - will create / update records
  - will delete records
  - must validate the received payload


## Database
The implementation of a relational database must be carried out considering the following requirements:
- The database must be created using Laravel framework Migrations, and also use Seeds and Factories to populate the information in the database.
- Implementation of the necessary validations in the layer you judge best.

## Delivery
- To start the test, fork this repository; If you only clone the repository you won't be able to push.
- Create a branch with your full name;
- Modify the README.md file with the necessary information to run your test (commands, migrations, seeds, etc);
- After finishing, send us the pull request.

## Bonus
- Implement user authentication in the application.
- Allow the user to change the number of results per page.
- Allow bulk deletion of items in the CRUDs.
- Implement discounts on some purchase orders.

## What we will analyze
- Code organization;
- Application of design patterns;
- Separation of modules and components;
- Readability;
  
### Good Luck!
