<?php
$CI =& get_instance();
if(!function_exists('get_layout'))
{
  function get_layout()
  {
    global $CI;
    return $CI->load->get_layout();
  }
}

if(!function_exists('get_layout_asset_path'))
{
  function get_layout_url($which = 'img')
  {
    global $CI;
    return base_url('public/'.$CI->load->get_layout().'/'.$which);
  }
}

if(!function_exists('expand_css'))
{
  function expand_css($l)
  {
    if(empty($l)) return null;

    $link = '';
    isset($l['href']) && $link = 'href="'.$l['href'].'"';
    isset($l['charset']) && $link .= ' charset="'.$l['charset'].'"';
    isset($l['crossorigin']) && $link .= ' crossorigin="'.$l['crossorigin'].'"';
    isset($l['hreflang']) && $link .= ' hreflang="'.$l['hreflang'].'"';
    isset($l['media']) && $link .= ' media="'.$l['media'].'"';
    isset($l['rev']) && $link .= ' rev="'.$l['rev'].'"';
    isset($l['sizes']) && $link .= ' sizes="'.$l['sizes'].'"';
    isset($l['target']) && $link .= ' target="'.$l['target'].'"';

    return $link;
  }
}

if(!function_exists('expand_js'))
{
  function expand_js($l, $pos = 'head')
  {
    if( empty($l)
        || (isset($l['position']) && $l['position'] != $pos)
        || (!isset($l['position']) && $pos == 'bottom')) return null;

    $link = '';
    isset($l['async']) && $link = ' async="'.$l['async'].'"';
    isset($l['charset']) && $link .= ' charset="'.$l['charset'].'"';
    isset($l['defer']) && $link .= ' defer="'.$l['defer'].'"';
    isset($l['src']) && $link .= ' src="'.get_layout_url('js').'/'.$l['src'].'"';

    return $link;
  }
}

if(!function_exists('expand_meta'))
{
  function expand_meta($m)
  {
    if(empty($m) || $m['name'] == 'title') return null;

    $meta = '';
    isset($m['name']) && $meta = ' name="'.$m['name'].'"';
    isset($m['content']) && $meta .= ' content="'.$m['content'].'"';
    isset($m['charset']) && $meta .= ' charset="'.$m['charset'].'"';
    isset($m['http-equiv']) && $meta .= ' http-equiv="'.$m['http-equiv'].'"';
    isset($m['scheme']) && $meta .= ' scheme="'.$m['scheme'].'"';

    return $meta;
  }
}
