<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

public function index(ProductService $productService)
{
    $newProduct = [
        'id' => 4,
        'name' => 'Orange',
        'category' => 'fruit'
    ];

    $productService->insert($newProduct);

    $this->taskService->add('Add to cart');
    $this->taskService->add('Checkout');

    $data = [
        'products' => $productService->listProducts(),
        'tasks' => $this->taskService->getAllTasks()
    ];
    return view('products.index', $data);  
}

    public function show(ProductService $productService, string $id)
    {
        $product =collect($productService->listProducts())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
        })->first();

        return $product;
    }
    
}
