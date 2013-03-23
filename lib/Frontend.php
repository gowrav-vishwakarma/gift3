<?php
/**
 * Consult documentation on http://agiletoolkit.org/learn 
 */
class Frontend extends ApiFrontend {
    public $welcome;
    function init(){
        parent::init();
        // Keep this if you are going to use database on all pages
        //$this->dbConnect();
       $this->api->dbConnect() ;
        $this->requires('atk','4.2.1');

        // This will add some resources from atk4-addons, which would be located
        // in atk4-addons subdirectory.
        $this->addLocation('atk4-addons',array(
                    'php'=>array(
                        'mvc',
                        'misc/lib',
                        'filestore/lib',
                        )
                    ))
            ->setParent($this->pathfinder->base_location);

        $this->addLocation('.',array(
            "addons"=>'xavoc-addons'
            ));

//$this->api->dbConnect();
        // A lot of the functionality in Agile Toolkit requires jUI
        $this->add('jUI');

        // Initialize any system-wide javascript libraries here
        // If you are willing to write custom JavaScritp code,
        // place it into templates/js/atk4_univ_ext.js and
        // include it here
        $this->js()
            ->_load('atk4_univ')
            ->_load('ui.atk4_notify')
            ;

        // If you wish to restrict actess to your pages, use BasicAuth class
            
      
        $m=$this->add('Menu',array('current_menu_class'=>'current'),'Menu');  
        $m->addMenuItem('index','Home');
        $m->addMenuItem('member_area','My Account');

        $auth=$this->add('BasicAuth');
        $auth->setModel('Member','username','password');
        $auth->allowPage(array('index','registration','plan','support'));
        $auth->check();

        $m->addMenuItem('plan','What is 3Gift');
        if(!$auth->isLoggedIn()){
            $m->addMenuItem('registration','Register');
        }
        if($auth->isLoggedIn()){
            $this->add('H4', null, 'welcome')->set("Welcome " . $auth->model['username']);
            $m->addMenuItem('logout');
        }
            $m->addMenuItem('support');
        $this->addLayout('UserMenu');

        $conf_visit=$this->add('Model_Config')->loadBy('key','visitors_counter');
        $conf_start=$this->add('Model_Config')->loadBy('key','visitors_start');

        $conf_visit['value'] = $conf_visit['value'] + rand(1,5);
        $conf_visit->save();

        $this->add('View',null,'visitors')->set("Visitors: " . ($conf_start['value'] + $conf_visit['value']));
        
    }
    function layout_UserMenu(){
        if($this->auth->isLoggedIn()){
            $this->add('Text',null,'UserMenu')
                ->set('Hello, '.$this->auth->get('username').' | ');
            $this->add('HtmlElement',null,'UserMenu')
                ->setElement('a')
                ->set('Logout')
                ->setAttr('href',$this->getDestinationURL('logout'))
                ;
        }else{
            $this->add('HtmlElement',null,'UserMenu')
                ->setElement('a')
                ->set('Login')
                ->setAttr('href',$this->getDestinationURL('authtest'))
                ;
        }
    }
    function page_examples($p){
        header('Location: '.$this->pm->base_path.'examples');
        exit;
    }
}
