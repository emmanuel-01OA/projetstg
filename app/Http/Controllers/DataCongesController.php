<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataCongesController extends Controller
{
    //


    public function indexVisualisationConges(){

        return view("managerviews.Dataviews.VisualisationPlannConges");
    }
}
