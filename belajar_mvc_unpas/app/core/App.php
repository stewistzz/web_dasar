<?php 
class App {
    public function __construct() {
        // echo"OK";
        $url = $this->parseUrl();
        var_dump($url);
    }

    // mengambil dan memecah url
    public function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
?>