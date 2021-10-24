<?php
namespace ApiCondor\core;

use ApiCondor\core\API;

class App
{
    /** @var string $controller Default Controller */
    public $controller = 'analytics';

    /** @var string $method Default Controller Method */
    public $method = 'fetch';

    /** @var array $params Params passed in URL */
    public $params = [];

    public function __construct()
    {
        try {
            $url = $this->parseUrl();

            if (isset($url[1]) && preg_match('~v[0-9]+~', $url[1], $version) && is_dir('../app/api/' . $url[1])) {
                $version = $version[0];
//            } else API::error('Please set valid API version',404 );
            } else API::error(404 );

            // Check does controller with this name exists
            if (isset($url[2]) && file_exists('../app/api/' . $version . '/' . $url[2] . '.php')) {
                $this->controller = ucfirst($url[2]);
                unset($url[0], $url[1], $url[2]);
            } else throw new Exception('Please set valid Controller', 404);

            require_once '../app/api/' . $version . '/' . strtolower($this->controller) . '.php';

            // Init Controller
            $this->controller = new $this->controller();

            $url = array_values($url);

            // Check does method with this name exists in our controller
            if (isset($url[0])) {
                if (method_exists($this->controller, $url[0])) {
                    $this->method = $url[0];
                    unset($url[0]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            // If everything is ok call this controller method and pass params
            call_user_func_array([$this->controller, $this->method], $this->params);

        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }

    }


    /**
     * Splitting the url and getting his parts that represents controller, method and all params in one array.
     * @return array Controller, method and all params in one array.
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}