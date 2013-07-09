x_bread_crumb
=============

bread crumb navigation for atk4

===

Usage
---

        $this->add('x_bread_crumb/View_BC',array(
            'routes' => array(
                0 => array(
                    'name' => 'Home',
                ),
                1 => array(
                    'name' => 'Job',
                    'url' => 'url/to/job',
                    'args' => array('var_one'=>'value_one','var_two'=>'value_two',),
                ),
                2 => array(
                    'name' => 'Current',
                    'url' => 'url/to/some/current/staff',
                ),
            )
        ));
        
will generate line

    Home > Job > Current

where 
* 'Home' will be a link to root url of your atk4 project
* 'Job' will follow to http://project.com/url/to/job?var_one=value_one&var_two=value_two
* 'Current' will be a simple text with no text because it is a last element of breadcrumb
