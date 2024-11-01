Run 
#php artisan serve
#npm run dev
#php artisan db:seed 
*Use the admin account in the Seeder to be able to log in to the dashboard
*The user can either be an admin or super admin or user 
*If the user wants to log in as an admin, he logs in normally and waits 
for the super admin to make him an admin.
*The admin can only modify the products that he has added, and he cannot modify 
anything related to a product that another admin has added.
*The Super admin can modify any product
*Only a super admin can make users as admin, but an admin cannot
*Also, the admin can control orders that are related to his products only
*But the super admin can control all orders
*API
*The user can place any order just by entering the ID of the product he wants The order number is returned
*The user can view his order by entering the order ID that was sent to him when ordering
*The user can see all his orders
*The user can see all categories and one category
*The user can modify his order
*The user can log in & log out & register
*Browsing products and categories and log in and register does not require a tokenBut the rest requires entering the token
https://documenter.getpostman.com/view/39336522/2sAY4uCP9u
