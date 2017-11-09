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
        $this->data['pagebody'] = 'fleet';
        $fleets = $this->fleet->all();
        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($fleets as $fleet) 
        {
            $fleet = (array)$fleet;
            $link_data = array(
                'display' => $fleet['id'],
                'url' => '/fleet/'. $fleet['id']
            );
            $delete_data = array(
                'display' => 'X',
                'url' => '/fleet/'. $fleet['id'] . '/delete'
            );
            $delete = '';
            if ($role == ROLE_OWNER) { 
                $delete = $this->parser->parse('template/_delete', $delete_data, true);
            }
            $link = $this->parser->parse('template/_link', $link_data, true);
            $this->table->add_row($delete . $link, $fleet['plane_id']);
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
        $role = $this->session->userdata('userrole');
        if ($role == ROLE_OWNER) {
            $fleet = $this->fleet->create();
            $this->session->unset_userdata('fleet');
            $this->session->set_userdata('fleet', $fleet);   // This is required to avoid having data auto filled with old session data...
            redirect(base_url('/fleet/add'));
        } else {
             redirect(base_url('/fleet'));
        }
        
    }
    
    

    /**
    * when click one of the fleet, the detail infomation will shows up.
    */
    function show_fleet($id) 
    {
        $this->load->helper('form');
        $this->session->unset_userdata('fleet'); // This is required to avoid having data auto filled with old session data...
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet ('. ($role == '' ? ROLE_GUEST : $role) . ') ';
        $this->data['pagebody'] = 'fleet';
        $this->load->library('table');
        $this->data['jsonbutton'] = '';
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
        } else {
            error_log("Validation failed: " . validation_errors());
        }
       
    
        redirect(base_url('/fleet'));
    }

    
}
