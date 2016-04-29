<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VB_Loader extends CI_Loader {
  protected $layout = 'default';
  protected $css = [];
  protected $js = [];
  protected $meta = [];
  protected $_blocks = [];

  public function set_layout($layout = 'default')
  {
    $this->layout = trim(strtolower($layout), DIRECTORY_SEPARATOR);
  }

  // --------------------------------------------------------------------

  /**
   * View Loader
   *
   * Loads "view" files.
   *
   * @param	string	$view	View name
   * @param	array	$vars	An associative array of data
   *				to be extracted for use in the view
   * @param	bool	$return	Whether to return the view output
   *				or leave it to the Output class
   * @return	object|string
   */
  public function view($view, $vars = array(), $return = FALSE)
  {
    $view = trim($this->layout.DIRECTORY_SEPARATOR.$view, DIRECTORY_SEPARATOR);
    $vars['layout'] = $this->layout;
    $vars['js'] = $this->js;
    $vars['css'] = $this->css;
    $vars['meta'] = $this->meta;
    return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
	}

  public function add_js($js = [])
  {
    if( empty($js))
    {
      return false;
    }
    foreach($js as $value)
    {
      !in_array($value, $this->js) && $this->js[] = $value;
    }
  }

  public function add_css($css = [])
  {
    if( empty($css))
    {
      return false;
    }
    foreach($css as $value)
    {
      !in_array($value, $this->css) && $this->css[] = $value;
    }
  }

  public function add_meta($meta = [])
  {
    if( empty($meta))
    {
      return false;
    }
    foreach($meta as $value)
    {
      $this->meta[] = $value;
    }
  }

  public function get_layout()
  {
    return $this->layout;
  }

  public function block($name, $params = null)
  {
    if(empty($name))
    {
      show_error('Cannot get empty block.', CUST_BLOCK_INVALID, 'Invalid block specified');
    }

    $class_path = explode(DIRECTORY_SEPARATOR, 
      str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $name));
    
    array_walk($class_path, function(&$v, $k){$v = strtolower($v);});

    $class_path[count($class_path)-1] = ucfirst(
      $class_path[count($class_path)-1]);
    
    $name = implode(DIRECTORY_SEPARATOR, $class_path);

    if(in_array($name, $this->_blocks)){
      return $this->_blocks[$name];
    }
    
    $name_parts = explode(DIRECTORY_SEPARATOR, $name);    
    $class = end($name_parts) . 'Block';
    array_pop($name_parts);
    $block_path = APPPATH . 'blocks' . DIRECTORY_SEPARATOR; 
    $block_path .= implode(DIRECTORY_SEPARATOR, $name_parts);
    $block_path .= DIRECTORY_SEPARATOR . $class . '.php';
    $block_path = realpath($block_path);

    if(file_exists($block_path) && is_readable($block_path))
    {
      require_once($block_path);
      $this->_blocks[$name] = new $class($params);
      $this->_blocks[$name]->_init();
      return $this->_blocks[$name];
    }else{
      show_404($block_path, true);
    }
  }
}
