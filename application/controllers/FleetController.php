<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FleetController extends Application 
{
    /**
     *The FleetController controller is used to load Fleet view, get table data from 
     *Fleet model, and display the Fleet page
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * connect fleet view and load all of fleet infomation for model
     */
    function index() 
    {
        // get current user role
        $role = $this->session->userdata('userrole');
       
        // clear cached adding/editing fleet data
        $this->session->unset_userdata('fleet');

        $this->data['title'] = 'Raven Air Fleet ('. ($role == '' ? ROLE_GUEST : $role) . ')';
        $this->data['pagebody'] = 'fleet/show';
        $fleets = $this->fleets->all();
        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($fleets as $fleet) 
        {
            // if user is admin, link to edit page, else link to show page
            $url = ($this->is_admin() ? '/fleet/edit/' : '/fleet/') . $fleet->id;
            $show_link_data = array(
                'display' => $fleet->id,
                'url' => $url 
            );
            $show_link = $this->parser->parse('template/_link', $show_link_data, true);

            // only show delete link when user is the admin
            $delete_link = '';
            if ($this->is_admin()) { 
                $delete_link_data = array(
                    'a_class' => 'btn btn-danger',
                    'gly_class' => 'glyphicon glyphicon-trash',
                    'url' => '/fleet/delete/'. $fleet->id 
                );
                $delete_link = $this->parser->parse('template/buttons/glyphbutton', $delete_link_data, true);
            }

            // add a row to the table with the data 
            $this->table->add_row($delete_link . $show_link, $fleet->plane_id);
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();

        // only showing the add button when user is the admin 
        if ($this->is_admin()) {
            $add_button_data = array(
                'a_class' => 'btn btn-success',
                'gly_class' => 'glyphicon glyphicon-plus',
                'url' => 'fleet/add'
            );
            $this->data['thetable'] .= $this->parser->parse('template/buttons/glyphbutton',$add_button_data,true);
        }

        // no nav link needed for this page
        $this->data['nav_link'] = null; 
        $this->render();
    }


    /**
     * Remove a fleet from the database.
     */
    function delete($id) 
    {
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_ADMIN) {
            $fleet = $this->fleets->get($id);  
            if ($fleet != NULL) {
                $this->fleets->delete($id);
            }
        }
        redirect(base_url('/fleet'));
    }

    /**
     * shows the adding form to add new fleet 
     */
    public function add()
    {
        // only admin can access this page
        if (!$this->is_admin()) {
            $this->data['title'] = "Unauthorized access";
            $this->data['pagebody'] = "errors/page403.php";
            $this->render();
        }
        
        $this->load->helper('form');
        $fleet = $this->session->userdata('fleet') !== null ? (Object)($this->session->userdata('fleet')) : $this->fleet;

        $this->data['title'] = "Add fleet";
        $this->data['pagebody'] = "fleet/add";

        // loading the adding form
        $this->data['theform'] = $this->generate_form(['fleet' =>$fleet, 'url' => '/fleet/submit_add' ]);

        $this->render();
    }

    /**
     * shows the adding form to add new fleet 
     */
    public function edit($id)
    {
        // only admin can access this page
        if (!$this->is_admin()) {
            $this->data['title'] = "Unauthorized access";
            $this->data['pagebody'] = "errors/page403.php";
            $this->render();
        }


        $this->load->helper('form');

        $fleet = $this->fleets->get($id);

        $this->data['title'] = "Edit fleet";
        $this->data['pagebody'] = "fleet/edit";
        $this->data['theform'] = $this->generate_form(['fleet' =>$fleet, 'url' => '/fleet/submit_edit' ]);
        $this->render();
    }



    /**
     * when click one of the fleet, the detail infomation will shows up.
     */
    function show($id) 
    {
        //$this->session->unset_userdata('fleet'); // This is required to avoid having data auto filled with old session data...
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet ('. ($role == '' ? ROLE_GUEST : $role) . ') ';
        $this->data['pagebody'] = 'fleet/show';
        $this->load->library('table');
        $this->data['jsonbutton'] = '';

        $fleet = $this->fleets->get($id);

        foreach ($fleet as $key=>$value)
        {
            $this->table->add_row($key, $value);
        }

        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        $nav_link_data = array(
            'display' => 'Back',
            'url' => '/fleet',
            'classes' => 'btn btn-primary'
        ); 
        $this->data['nav_link'] = $this->parser->parse('template/_link', $nav_link_data, true); 

        $this->render();

    }

    // handle form submission
    public function submit_add()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleets->rules());

        $input = $this->input->post();
        // retrieve & update data transfer buffer
        $fleet = (array) $this->session->userdata('fleet');
        $fleet = array_merge($fleet, $this->input->post());
        $fleet = (object) $fleet;  // convert back to object
        $this->session->set_userdata('fleet', $fleet);

        // validate away
        if ($this->form_validation->run())
        {
            $this->fleets->add($fleet);

            //echo "data updated";
            //$this->session->unset_userdata('fleet');
            //redirect(base_url('/fleet'));
            $this->index();
        } else {
            //error_log("Validation failed: " . validation_errors());
            $this->add(); 
        }

    }

    public function submit_edit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleets->rules());

        $input = $this->input->post();
        // retrieve & update data transfer buffer
        $fleet = (array) $this->session->userdata('fleet');
        $fleet = array_merge($fleet, $this->input->post());
        $fleet = (object) $fleet;  // convert back to object
        $this->session->set_userdata('fleet', $fleet);

        // validate away
        if ($this->form_validation->run())
        {
            $this->fleets->update($fleet);

            //echo "data updated";
            $this->session->unset_userdata('fleet');
            redirect(base_url('/fleet'));
            //$this->index();
        } else {
            //error_log("Validation failed: " . validation_errors());
            $this->add(); 
        }

    }

    private function generate_form($data)
    {
        $this->load->helper('form');

        $fleet = $data['fleet'];

        $form = form_open($data['url'], ['id' => 'new_fleet_form', 'class' => 'form', 'method' => 'post']); 
        $field_block = 'form_components/bs_field_block';
        $field_data = array(
            'form_error' => form_error('id'),
            'the_label' => form_label('ID', 'id'),
            'the_field' => form_input(['id' => 'id', 'name' => 'id', 'placeholder' => 'ID: Rxxxxx', 'value' => $fleet->id, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $planes = json_decode(file_get_contents('http://wacky.jlparry.com/info/airplanes'));

        $options = array(
            'place_holder' => 'Select a plane'
        );
        foreach ($planes as $plane)
        {
            $options[$plane->id] = $plane->id;
        }

        $selected = isset($fleet->plane_id) ? $fleet->plane_id : null; 

        //var_dump($selected);

        $field_data = array(
            'form_error' => form_error('plane_id'),
            'the_label' => form_label('Plane id', 'plane_id'),
            'the_field' => form_dropdown('plane_id', $options, $selected, ['id' => 'plane_list','class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('manufacturer'),
            'the_label' => form_label('Manufacturer', 'manufacturer'),
            'the_field' => form_input(['id' => 'manufacturer', 'name' => 'manufacturer', 'value' => $fleet->manufacturer, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);
        $field_data = array(
            'form_error' => form_error('model'),
            'the_label' => form_label('Model', 'model'),
            'the_field' => form_input(['id' => 'model', 'name' => 'model', 'value' => $fleet->model, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('price'),
            'the_label' => form_label('Price', 'price'),
            'the_field' => form_input(['id' => 'price', 'name' => 'price', 'value' => $fleet->price, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('seats'),
            'the_label' => form_label('Seats', 'seats'),
            'the_field' => form_input(['id' => 'seats', 'name' => 'seats', 'value' => $fleet->seats, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('reach'),
            'the_label' => form_label('Reach', 'reach'),
            'the_field' => form_input(['id' => 'reach', 'name' => 'reach', 'value' => $fleet->reach, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('cruise'),
            'the_label' => form_label('Cruise', 'cruise'),
            'the_field' => form_input(['id' => 'cruise', 'name' => 'cruise', 'value' => $fleet->cruise, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('takeoff'),
            'the_label' => form_label('Takeoff', 'takeoff'),
            'the_field' => form_input(['id' => 'takeoff', 'name' => 'takeoff', 'value' => $fleet->takeoff, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $field_data = array(
            'form_error' => form_error('hourly'),
            'the_label' => form_label('Hourly', 'hourly'),
            'the_field' => form_input(['id' => 'hourly', 'name' => 'hourly', 'value' => $fleet->hourly, 'class' => 'form-control'])
        );
        $form .= $this->parser->parse($field_block, $field_data, true);

        $form.= form_submit(null,'submit',['class' => 'btn btn-warning']);
        $cancel_button_data = array(
            'classes' => 'btn btn-info', 
            'url'=>'/fleet',
            'display'=>'Cancel'
        );
        $form .= $this->parser->parse('template/_link', $cancel_button_data, true);
        $form .= form_close();

        return $form;
    }
}
