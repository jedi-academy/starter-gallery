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
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet ('. ($role == '' ? ROLE_GUEST : $role) . ')';
        $this->data['pagebody'] = 'fleet/show';
        $fleets = $this->fleet->all();
        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($fleets as $fleet) 
        {
            $fleet = $fleet;
            $link_data = array(
                'display' => $fleet->id,
                'url' => '/fleet/'. $fleet->id
            );
            $delete_data = array(
                'display' => 'X',
                'url' => '/fleet/delete/'. $fleet->id 
            );

            $delete = '';
            if ($role == ROLE_OWNER) { 
                $delete = $this->parser->parse('template/_delete', $delete_data, true);
            }
            $link = $this->parser->parse('template/_link', $link_data, true);
            $this->table->add_row($delete . $link, $fleet->plane_id);
        }
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/fleet" target="_blank"> Show JSON </a>';
        
        
       
        if ($role == ROLE_OWNER) {
                $this->data['thetable'] .= $this->parser->parse('buttons/addfleetbutton',[], true);
        }
        
        
        $this->render();
    }
    
    
    /**
     * Remove a fleet from the database.
     */
    function delete($id) 
    {
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $fleet = $this->fleet->getFleet($id);  
            if ($fleet != NULL) {
                $this->fleet->delete($id);
            }
        }
        redirect(base_url('/fleet'));
    }
    
    
    
    
    
    
    // Initiate adding a new fleet
    public function add()
    {
        $this->load->helper('form');
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $fleet = $this->session->userdata('fleet') !== null ? (Object)($this->session->userdata('fleet')) : $this->fleet->create();
            //var_dump($fleet);
            //$this->session->unset_userdata('fleet');
            //$this->session->set_userdata('fleet', $fleet);   // This is required to avoid having data auto filled with old session data...
            //redirect(base_url('/fleet/add'));
            
            $this->data['title'] = "Add plane to fleet";
            $this->data['pagebody'] = "fleet/add";

            $form = form_open('fleet/submit', ['id' => 'new_fleet_form', 'class' => 'form']); 
            $field_block = 'form_components/bs_field_block';
            $field_data = array(
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

            $field_data = array(
                'the_label' => form_label('Plane id', 'plane_id'),
                'the_field' => form_dropdown('plane_id', $options, null, ['id' => 'plane_list','class' => 'form-control'])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Model', 'model'),
                'the_field' => form_input(['id' => 'model', 'name' => 'model', 'value' => $fleet->model, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Price', 'price'),
                'the_field' => form_input(['id' => 'price', 'name' => 'price', 'value' => $fleet->price, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Seats', 'seats'),
                'the_field' => form_input(['id' => 'seats', 'name' => 'seats', 'value' => $fleet->seats, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Reach', 'reach'),
                'the_field' => form_input(['id' => 'reach', 'name' => 'reach', 'value' => $fleet->reach, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Cruise', 'cruise'),
                'the_field' => form_input(['id' => 'cruise', 'name' => 'cruise', 'value' => $fleet->cruise, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Takeoff', 'takeoff'),
                'the_field' => form_input(['id' => 'takeoff', 'name' => 'takeoff', 'value' => $fleet->takeoff, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $field_data = array(
                'the_label' => form_label('Hourly', 'hourly'),
                'the_field' => form_input(['id' => 'hourly', 'name' => 'hourly', 'value' => $fleet->hourly, 'class' => 'form-control','disabled' => ''])
            );
            $form .= $this->parser->parse($field_block, $field_data, true);

            $form.= form_submit('Submit','submit');



            $form .= form_close();
            $this->data['theform'] = $form;
        } else {
            $this->data['title'] = "Unauthorized access";
            $this->data['pagebody'] = "page403.php";
        }
        $this->render();
    }
    
    

    /**
    * when click one of the fleet, the detail infomation will shows up.
    */
    function show($id) 
    {
        $this->load->helper('form');
        //$this->session->unset_userdata('fleet'); // This is required to avoid having data auto filled with old session data...
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet ('. ($role == '' ? ROLE_GUEST : $role) . ') ';
        $this->data['pagebody'] = 'fleet/show';
        $this->load->library('table');
        $this->data['jsonbutton'] = '';
        /*
        if ($id != 'add') {
            $fleettmp = $this->fleet->getFleet($id);
            if ($fleettmp != NULL) {
                $this->session->set_userdata('fleet', $fleettmp);
                $this->data['title'] .= $fleettmp['id']; 
                $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/fleet/' . $id . '" target="_blank"> Show JSON </a>';
            } else {
                if ($role != ROLE_OWNER) {
                    redirect(base_url('/fleet'));
                }
            }
        } else {
            if ($role != ROLE_OWNER) {
                    redirect(base_url('/fleet'));
            }
        }
        $fleet = $this->session->userdata('fleet');
         */
        
        $fleet = (array)($this->fleet->get($id));
        
       
         if ($role == ROLE_OWNER) { 
                $this->table->add_row('Fleet Id', form_input('id', $fleet['id']));
                $this->table->add_row('Plane Id', form_input('plane_id', $fleet['plane_id']));
                $this->table->add_row('Model', form_input('model', $fleet['model']));
                $this->table->add_row('Price', form_input('price', $fleet['price']));
                $this->table->add_row('Seats', form_input('seats', $fleet['seats']));
                $this->table->add_row('Reach', form_input('reach', $fleet['reach']));
                $this->table->add_row('Cruise', form_input('cruise', $fleet['cruise']));
                $this->table->add_row('Takeoff', form_input('takeoff', $fleet['takeoff']));
                $this->table->add_row('Hourly', form_input('hourly', $fleet['hourly']));
                $this->table->add_row(form_submit('submit', 'Submit'));
                
        } else {
          
                $this->table->add_row('Fleet Id', $fleet['id']);
                $this->table->add_row('Plane Id', $fleet['plane_id']);
                $this->table->add_row('Model', $fleet['model']);
                $this->table->add_row('Price', $fleet['price']);
                $this->table->add_row('Seats', $fleet['seats']);
                $this->table->add_row('Reach', $fleet['reach']);
                $this->table->add_row('Cruise', $fleet['cruise']);
                $this->table->add_row('Takeoff', $fleet['takeoff']);
                $this->table->add_row('Hourly', $fleet['hourly']);
        }
        
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1" class="table">'
        );
        $this->table->set_template($template);
        $this->data['thetable'] = $this->table->generate();
       
        $this->render();

    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->fleet->rules());

        // retrieve & update data transfer buffer
        $fleet = (array) $this->session->userdata('fleet');
        $fleet = array_merge($fleet, $this->input->post());
        $fleet = (object) $fleet;  // convert back to object
        $this->session->set_userdata('fleet', (object) $fleet);

        // validate away
        if ($this->form_validation->run())
        {
            if ($this->fleet->getFleet($fleet->id) == NULL)
           {
               
                $this->fleet->add($fleet);
            } else {
                $this->fleet->update($fleet);
            }

        $this->session->unset_userdata('fleet', (object) $fleet);
        } else {
            error_log("Validation failed: " . validation_errors());
        }
       
    
        redirect(base_url('/fleet'));
    }
}
