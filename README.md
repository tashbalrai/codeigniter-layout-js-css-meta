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
```
$this->load->set_layout('custom');
```

#### To Add JS
```
$this->load->add_js([['src'=>'users.js']]);
```




