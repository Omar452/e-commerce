<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Human friendly identifier for model that's being deleted
     */
    public $description;

    /**
     * The ID to be passed into the delete model route
     */
    public $id;

    /**
     * The instantiated model that is to be deleted (any object of a model class)
     */
    public $modelInstance;

    /**
     * The route for deleting the model instance
     */
    public $deleteRoute;

    /**
     * Create a new component instance.
     *
     * @param string $description
     * @param int $id
     * @param string $deleteRoute
     * @param $modelInstance
     */
    public function __construct(string $description, int $id, string $deleteRoute, $modelInstance)
    {
        $this->description = $description;
        $this->id = $id;
        $this->deleteRoute = $deleteRoute;
        $this->modelInstance = $modelInstance;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.delete-modal');
    }
}
