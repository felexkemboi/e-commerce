## Steps of setting up the project locally

- clone the repository using the command `git clone git@github.com:felexkemboi/e-commerce.git`
- Run `composer install` to install necessary packages
- Run `npm install` to install Javascript packages(make sure you have node version 20)
- Run `npm run build` to install Javascript packages(make sure you have node version 20)
- Have MYSQL installed and create a database
- Create a `.env` file in the root directory
- Copy file `.env.example` to `.env`
- Update the db name, user and password of your Database configurations in your .env file
- Run `php artisan key:generate` to generate key for the app(if it will be missing)
- Run `php artisan migrate --seed` to migrate and seed your Database with mock data
- Run `php artisan serve` to fire up the Laravel server in another terminal tab
- Head over to `http://localhost:8000`
- Login using `admin@example.com` as email and `password123` as password
- Open a new tab in terminal and run `php artisan queue:work` to queue its jobs
- Run `php artisan stock:check` to check stock to see which products need to be restocked.(Check log file to see emails sent)
