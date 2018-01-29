<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    private static $instance;
//    public $data = array();
//    /**
//     * Constructor
//     */
//    public function __construct()
//    {
//        self::$instance =& $this;
//
//        // Assign all the class objects that were instantiated by the
//        // bootstrap file (CodeIgniter.php) to local class variables
//        // so that CI can run as one big super object.
//        foreach (is_loaded() as $var => $class)
//        {
//            $this->$var =& load_class($class);
//        }
//        $this->load =& load_class('Loader', 'core');
//        $this->load->initialize();
//        //$this->doSomething(); // Preprocessing on all controllers.
//        $this->data['controller'] = $this->router->fetch_class();
//        $this->data['current'] = $this->router->fetch_method();
//        log_message('debug', "Controller Class Initialized");
//    }
}
