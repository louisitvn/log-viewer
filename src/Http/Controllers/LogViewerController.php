<?php namespace Acelle\Extra\LogViewer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogViewerController extends Controller
{
    public function index(Request $request)
    {
        echo "Hello world";
    }

}
