## Steps of setting up the project locally

- clone the repository using the command `git clone git@github.com:felexkemboi/e-commerce.git`
- change the directory to the root directory `cd e-commerce`
- Run `composer install` to install necessary packages
- Run `npm install` to install Javascript packages(make sure you have node version 20)
- Run `composer dump-autoload`
- Run `npm run build` to install Javascript packages(make sure you have node version 20) and should remain on it's own tab
- Copy file `cp .env.example .env` in the root directory
- Run `php artisan key:generate` to generate key for the app(if it will be missing)
- Create the database file `touch database/database.sqlite`
- Run `php artisan migrate` to migrate the tables
- Run `php artisan db:seed` to seed your Database with mock data
- Run `php artisan serve` to fire up the Laravel server in another terminal tab
- Open a new tab in terminal and run `php artisan queue:work` to queue its jobs(make sure you do this in a different tab)
- Run `php artisan report:stock` to check stock to see which products need to be restocked.(Check log file to see emails sent)
- Run `php artisan report:sales` to check products that were sold that day.(Check log file to see emails sent)
- Head over to `http://localhost:8000`
- Login using `admin@ecommerce.com` as email and `password123` as password


## How to interact with the app
 - In `http://127.0.0.1:8000`, you can add a product to a cart by clicking on `add to cart`
 - After adding a product to cart, you can get the list of those items by clicking on the cart icon
 - In cart page, you can increase the number of items or remove the item from the cart
 - In cart page, you can check the history of the cart to see the cart actions
 - `php artisan report:sales` command mocks reports and sends restock email to restocking staff
 - `php artisan report:stock` command mocks reports of sales of that day
 - Any product added to the cart on that day is assumed as 'sold'
 - Daily sales reports finds all the documents in the user's cart on that day
