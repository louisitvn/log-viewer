<?php

namespace Acelle\Extra\LogViewer\Http\Controllers;

use Acelle\Extra\LogViewer\PhpTail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogViewerController extends Controller
{
    public function index(Request $request)
    {
        $tail = PhpTail::fromDirectory(storage_path('logs'));

        /*
         * We're getting an AJAX call
         */
        if ($request->input('ajax') !== null) {
            echo $tail->getNewLines($request->input('file'), $request->input('lastsize'), $request->input('grep'), $request->input('invert'));
            die();
        }

        /*
         * Regular GET/POST call, print out the GUI
         */
        $tail->generateGUI();
    }
}
