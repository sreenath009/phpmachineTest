Step for instructions

needed php version equalto or greater than 8.1

Step1:clone respository

https://github.com/sreenath009/phpmachineTest.git

step2:install Dependencies

composer install
npm install

step3: Generate Application Key

php artisan key:generate

step4:Run Migration

php artisan migrate

step5: Run seeder command

php artisan db:seed

step6:Serve the application

php artisan serve

step7:Test Application

1.Add a  User by filling in the form and submit it.
2.Recording Sales: Selecting a user and entering the sale amount and submit it. 
3.verifying Payouts: Check the `commissions` table in database to verify the correct distribution of commissions.
4.Alternatively, check the application logs for commission distribution details.

This setup ensure a hierarchical user system where sales trigger appropriate commissions payout up to 5 level.
