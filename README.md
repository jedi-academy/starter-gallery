## CodeIgniter3.1-starter2

This project can be used as a starter for a webapp built with CodeIgniter 3.1.

This starter builds on [CodeIgniter3.1-starter1](https://github.com/jedi-academy/CodeIgniter3.1-starter1),
adding a base controller with view templating.

**controllers/Welcome.php** has been modified to set the name of the desired
view file as a *data* parameter, and to then invoke the inherited *render*
method to trigger presentation.

A view template is provided. The CSS has been extracted to an appropriate file
in the public folder. Styling could be improved by using a CSS framework, like
Bootstrap.

The **application/config/autoload.php** configuration has been modified
to preload the template parser library and the url helper.

Configure your web server or virtual host so that your project's
document root maps to this **public** folder inside your project.
