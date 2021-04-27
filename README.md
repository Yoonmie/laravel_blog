## Laravel Blog Project
- [Register](#auth/register)
- [Login] (#auth/login)
- [Post](#posts/index)
- [Individual Post](#user/posts/index)

## Installation
- Copy clone link
- Add this project into the htdocs of xampp folder from terminal 
  * Window + R and write "cmd"
  * Add Clone Link into folder and import database
    - git clone url(clone link)
    - cd folder (cd scm-blog)
    - code .
  * composer install
    - copy .env.example .env
    - php artisan key:generate
    - php artisan migrate
    - php artisan serve
- Run the project

## Project Flow 
- Can add new post
- Can delete their owned posts
- Can like and unlike the posts


## Register
Here is a register page.Users have to register the account before logging in.


## Login
Here is a login page and can only login the account with registered email and account. If not u cannot log into the account and go to home page.

## Post
In this page, user who has been log in can add and like the posts. The user who hasn't log in can only access the page but can only read the posts.

## Individual Post
Users can look the individual post by clicking username. It will show all posts and like count of individual user.




