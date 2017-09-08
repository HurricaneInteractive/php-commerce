# PHP COMMERCE
Project I am building using PHP to make a very basic e-commerce website. At the moment is is purely experimental and probably shouldnt be used in any production websites.

## Setup
All you'll need is a development environment that supports PHP and you are able to connect to a MySQL server. I am using XAMPP.

Fork & Clone the project, update the `config.php` file to connect to your database.

### Controllers
The website uses a very basic MVC setup. When you create a new controller class, extend the exsiting controller `class Object extends Controller`. Each controller needs a `index` function declared with a statement to use a view file: `$this->view('cart/index')`. You will be access that view using the url path, `<home_url>/object`. If you define additional functions, for example `add` you need to define the view as before. Then you'll be able to access the page using the url path, `<home_url>/object/add`.

### Views
The views are separated into different folders for each controller. It is important that these are spelt the same. Within these you can define your view files. The views do not use any templating engine so you'll be able to include different files into any views to customize you're view to yours liking. On each of the view files in this project I have included the header and footer, `../app/views/header.php` & `../app/views/footer.php`.

### Additional notes
* The include path starts in the `public` folder.
* The project will be using the Stripe API.
