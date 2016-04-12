<?php return [
    
    /**
     * This factory method creates a database connection using PDO. You may 
     * return any type of database connection here; there is nothing in this
     * app that requires the connection to be PDO.
     * 
     * Usage:
     * 
     * $stmt = db()->prepare('SELECT * FROM users WHERE username=? AND password_hash=?');
     * $stmt->execute([$username, $password_hash]);
     * return $stmt->fetch();
     * 
     */
    "db" => function() {
        $db = new PDO("mysql:host=kark.hin.no;dbname=stud_v16_lian", "v16_lian", "lian");
        $db->exec("SET NAMES utf8");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    },
    
    /**
     * This method configures the router. We're using the composer library
     * bramus/router. 
     * 
     * Good, comprehensive documentation is found here:
     * https://github.com/bramus/router
     * 
     * Examples:
     * $router->get('/', function() {  });
     * $router->post('/posts/(\w+)/', function() {  });
     * $router->put('pattern', function() {  });
     * $router->delete('pattern', function() {  });
     * $router->options('pattern', function() {  });
     * $router->patch('pattern', function() {  });
     */
    "setup_router" => function($router) {
        $router->get('/uit/basic-php-app/', 'Site::frontpage');
        $router->get('/uit/basic-php-app/the_time', 'Site::theTime');
    },
    
    /**
     * This method handles the template generation. It accepts a template
     * file name (without extension), and returns an object that has a
     * render($vars) method.
     * 
     * Usage:
     * 
     * $output = load_template('my_template', ['title' => "The title"]);
     */
    "load_template" => function($template) {
        static $loader, $twig;

        if(!$loader)
            $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');

        if(!$twig)
            $twig = new Twig_Environment($loader, array(
                'cache' => false,
            ));
            
        return $twig->loadTemplate($template.'.html');
    }
];