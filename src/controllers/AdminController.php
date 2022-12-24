<?php

require_once 'AppController.php';

class AdminController extends AppController {

    

    public function adminPanel()
    {
       $this->render('adminPanel');
    }

}