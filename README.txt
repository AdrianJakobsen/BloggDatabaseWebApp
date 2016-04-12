A very basic PHP application
============================

This PHP application provides a basic configuration with
a configuration file, composer, Twig-templates and a simple
router.

Setting up
----------

Unzip the files in your public html folder. The provided
.htaccess file will make sure that all page views goes
through the index.php file. If this does not work, please
consult your web server documentation.

Generally, the instructions for Wordpress and Drupal also
works for this project.

Add a URL to your app
---------------------

1.  Edit config.php and add a route:

    Insert a line similar to this inside the 'setup_router' function.

    $router->get('/uit/basic-php-app/', 'Site::frontpage');
    
    This will make sure that the function "frontpage" of the "Site" class
    is called whenever the url /uit/basic-php-app/ is requested.
    
2.  Create the Site class:

    Create a file named src/Site.php containing the following
    
    <?php
    class Site {
    }
    
3.  Create the page controller for the url we added in step 1.

    Edit src/Site.php and insert the following function.
    
    function frontpage() {
        view('some-template');
    }
    
4.  Create the templates/some-template.html file

    