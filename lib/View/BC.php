<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 7/9/13
 * Time: 4:28 PM
 * To change this template use File | Settings | File Templates.
 */
namespace x_bread_crumb;
class View_BC extends \View {
    public $routes = null;
    function init() {
        parent::init();
        $this->cook();
    }
    function cook() {
        $count = 0;
        $length = count($this->routes);
        $html = '';
        foreach ($this->routes as $place) {
            if ($count > 0) {
                $html .= '&nbsp;>&nbsp;';
            }
            if ($count == ($length-1)) {
                // regular text
                $html .= $place['name'];
            } else {
                // link
                if (!$place['url']) {
                    $place['url'] = '';
                }
                if (!$place['args']) {
                    $place['args'] = array();
                }
                $html = $html.'<a href="'.$this->api->url($place['url'],$place['args']).'">'.$place['name'].'</a>';
            }
            $count++;
        }
        $this->setHTML($html);
    }
    function render(){
//   		$this->js(true)
//   			->_load('x_tags')
//   			->_css('x_tags');

   		return parent::render();
   	}
    function defaultTemplate() {
		// add add-on locations to pathfinder
		$l = $this->api->locate('addons',__NAMESPACE__,'location');
		$addon_location = $this->api->locate('addons',__NAMESPACE__);
		$this->api->pathfinder->addLocation($addon_location,array(
			'js'=>'templates/js',
			'css'=>'templates/css',
            'template'=>'templates',
		))->setParent($l);

        //return array('view/lister/tags');
        return parent::defaultTemplate();
    }
}