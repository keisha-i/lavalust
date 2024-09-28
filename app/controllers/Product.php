<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Product extends Controller {

    public function __construct() {

        parent:: __construct();
        $this->call->model('product_model');
    }
	
    public function read() {

        $data ['prod'] = $this->product_model->read();
        $data ['name'] = "LavaLust Framework";
        $this->call->view('product/display', $data);
    }

    public function create() {

        if($this->form_validation->submitted()) {
            
            $this->form_validation
                ->name('product_name')
                    ->required('Product name is required')
                    ->alpha()
                ->name('product_desc')
                    ->required('Product description is required')
                    ->max_length(200);
            if($this->form_validation->run()) {
                $product_name = $this->io->post('product_name');
                $product_desc = $this->io->post('product_desc');

                if($this->product_model->create($product_name, $product_desc)) {
                    //success message
                    set_flash_alerts('success', 'Product was added successfully');
                    redirect('product/add');
                }

            } else{
                //error message
                set_flash_alerts('danger', $this->form_validation->errors());
                redirect('product/add');
            }

           
        }
        $this->call->view('product/create');
    }

    public function update($id) {
        if($this->form_validation->submitted()) {
            
            $this->form_validation
                ->name('product_name')
                    ->required('Product name is required')
                    ->alpha()
                ->name('product_desc')
                    ->required('Product description is required')
                    ->max_length(200);
            if($this->form_validation->run()) {
                $product_name = $this->io->post('product_name');
                $product_desc = $this->io->post('product_desc');

                if($this->product_model->create($product_name, $product_desc, $id)) {
                    //success message
                    set_flash_alerts('success', 'Product was updated successfully');
                    redirect('product/read');
                }

            } else{
                //error message
                set_flash_alerts('danger', $this->form_validation->errors());
                redirect('product/read');
            }
        }
        $data['product'] = $this->product_model->get_one($id);
        $this->call->view('product/update', $data);
    }

    public function delete($id) {
        if($this->product_model->delete($id)) {
            set_flash_alerts('success', 'Product was deleted successfully');
            redirect('product/read');
        }else{
            set_flash_alerts('danger', 'Something went wrong');
            redirect('product/read');
        }
    }
}
?>
