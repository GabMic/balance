# Balance - A Laravel finance app for everyday use.

Ever wondered at the end of the month why you are short 300 bucks?

Well, you didn't remember the milk, eggs and bread you brought home a week ago, or that pizza you got when you were hungry and in a rush or the 50$ on gas last wednesday.

All that sums to hundreds of dollars every month.

What you can do is simple. keep track of your finance with and keep in **Balance**.

**Balance** let's you set a monthly budget of your choosing, You can add bills you paid or things you got to keep track on what you are spending your money.

If you are not a developer or does not know how to use this on your own, you can use the hosted version, ready to go free of charge here: https://balance.animaid.org

Otherwise, it's a standard laravel installation.

##Installation

1. Clone or download this repo.
2. Set up your database.
3. cd into the `balance` project: `cd balance`.
4. run `composer install`.
5. run `cp .env.example .env`.
6. Generate app key: `php artisan key:generate`.
7. link public folder: `php artisan storage:link`.
8. Enter your database info in the `.env` file.
9. run `php artisan migrate`.
10. run `npm install`.
11. run `npm run watch`.
12. And of course, run the app: `php artisan serve`.

Enjoy keeping track of your money.

