<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack\CRUD preferences
    |--------------------------------------------------------------------------
    */

    /*
    |------------
    | CREATE & UPDATE
    |------------
    */
    // Where do you want to redirect the user by default, after a CRUD entry is saved in the Add or Edit forms?
    'default_save_action' => 'save_and_back', //options: save_and_back, save_and_edit, save_and_new

    // When using tabbed forms (create & update), what kind of tabs would you like?
    'tabs_type' => 'horizontal', //options: horizontal, vertical

    // How would you like the validation errors to be shown?
    'show_grouped_errors' => true,
    'show_inline_errors' => true,

    /*
    |------------
    | READ
    |------------
    */

    // LIST VIEW (table view)

        // How many items should be shown by default by the Datatable?
        // This value can be overwritten on a specific CRUD by calling
        // $this->crud->setDefaultPageLength(50);
        'default_page_length' => 25,

    // PREVIEW

    /*
    |------------
    | DELETE
    |------------
    */

    /*
    |------------
    | REORDER
    |------------
    */

    /*
    |------------
    | DETAILS ROW
    |------------
    */

    /*
    |-------------------
    | TRANSLATABLE CRUDS
    |-------------------
    */

    'show_translatable_field_icon' => true,
    'translatable_field_icon_position' => 'right', // left or right

    'locales' => [
        'en' => 'English',
    ],

];
