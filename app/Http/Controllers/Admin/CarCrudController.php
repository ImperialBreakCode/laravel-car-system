<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CarCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CarCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private function getFields($show = false)
    {
        return [
            [
                'name' => 'year_of_manufacturing',
                'label' => "Year of manufacturing",
                'type' => 'number',
            ],
            [
                'name' => 'kilometers_traveled',
                'label' => "Kilometers traveled",
                'type' => 'number',
            ],
            [
                'label' => "Manufacturer",
                'type' => 'select',
                'entity' => 'manufacturer',
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => 'App\Models\Manufacturer', // foreign key model
                'name' => 'manufacturer_id',
            ],
            [
                'label' => "Model",
                'type' => 'select',
                'entity' => 'manufacturerModel',
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => 'App\Models\ManufacturerModel', // foreign key model
                'name' => 'model_id',
            ],
            [
                'label' => "Car Image",
                'name' => "image",
                'type' => ($show ? 'view' : 'upload'),
                'view' => 'partials/image',
                'upload' => true,
            ]
        ];
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Car::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/car');
        CRUD::setEntityNameStrings('car', 'cars');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // set columns from db columns.
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFields(true)); 

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(CarRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        $this->crud->addFields($this->getFields());
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
