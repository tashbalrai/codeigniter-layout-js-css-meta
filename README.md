# codeigniter-layout-js-css-meta
This repository extends the CI 3 loader in order to provide support for layouts, adding js, css and meta data dynamically to the required page load.

With this class you can use folders inside views folder as layout. Checkout the following views folder structure.

```
views
  |->default
  |     |-> view1.php
  |     |-> view2.php
  |->custom
  |     |-> view1.php
  |     |-> view2.php
```
default and custom are the layout folders and you can switch between layout folders and CI will start rendering views from the choosen layout.

To use this loader library, add the 'VB_' custom class prefix in your config.php file. Put the VB_Loader.php in the application core folder. Put the layout_helper.php helper inside your application's helper folder. Use our header.php and footer.php template for common header and footer inclusions.


#### To Change Layout
```php
$this->load->set_layout('custom');
```

#### To Add JS
```php
$this->load->add_js([['src'=>'users.js']]);

//Another example with position attribute
$this->load->add_js([
  [
    'src' => 'custom.js',
    'position' => 'foot'
  ],
  [
    'src' => 'another.js',
    'position' => 'head'
  ]
]);
```
Other attributes support for js are "charset", "async" and "defer".

#### To Add CSS
```php
$this->load->add_css([
  [
    'href' => 'custom.css'
  ],
  [
    'href' => 'another.css'
  ]
]);
```

Other attributes support for css are "charset", "crossorigin", "hreflang", "media", "rev", "sizes" and "target".

#### To Add META
```php
$this->load->add_meta([
  [
    'name' => 'keywords',
    'content' => 'some keywords'
  ]
]);
```

Other attributes support for meta are "charset", "http-equiv" and "scheme".

#### Helper Functions
######get_layout()
This helper function returns the current layout in use.

######get_layout_url($which)
This helper function returns URL relative to the layout for the argument passed. Default value of the $which is "img". Example.

```php
get_layout_url('scripts');
// give public/<current_layout>/scripts
```
