<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
//    protected $request;
//    public function __construct(Request $_request)
//    {
//        $this->request = $_request;
//    }

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
    public function respondForward($response)
    {
        return $this->respond($response['status'],$response['data']??null,$response['message']??"",$response['statusCode']??null,$response['headers']??[]);
    }

    public function respond($status,$data=null,$message="",$statusCode=null,$headers = [])
    {
        if($statusCode===null)
            $statusCode=200;
        $return = [];
        $return['status'] = $status;
        $return['data'] = $data;
        $return['message'] = $message;
        return response()->json($return, $statusCode, $headers);
    }
}
