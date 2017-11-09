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
        $this->data['title'] = 'Raven Air Fleet ('. $role . ')';
        $this->data['pagebody'] = 'fleet';
        $airplanes = $this->fleet->all();
        $this->load->library('table');

        $this->table->set_heading('Fleet ID', 'Plane ID');
        foreach($airplanes as $airplane) 
        {
            $airplane = (array)$airplane;
            $link_data = array(
                'display' => $airplane['id'],
                'url' => '/fleet/'. $airplane['id']
            );
            $link = $this->parser->parse('template/_link', $link_data, true);
            $this->table->add_row($link, $airplane['plane_id']);
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
    
    // Initiate adding a new fleet
    public function add()
    {
        $task = $this->fleet->create();
        $this->show_fleet(NULL);
        
    }
    
    

    /**
    * when click one of the fleet, the detail infomation will shows up.
    */
    function show_fleet($id) 
    {
        $this->load->helper('form');
        $role = $this->session->userdata('userrole');
        $this->data['title'] = 'Raven Air Fleet: ';

        $this->data['pagebody'] = 'fleet';
        $this->load->library('table');       
        $fleettmp = $this->fleet->getPlane($id);
        
        
        
      //  if ($id != NULL) {
     //       $fleet = $this->fleet->getPlane($id);
    //        $this->data['title'] .= $fleet['id']; 
    //    } 
        $this->session->set_userdata('fleet', $fleettmp);
        $fleet = $this->session->userdata('fleet');
        $this->data['title'] = $fleet['id'];
        
       
         if ($role == ROLE_OWNER) { 
                $this->table->add_row('Fleet Id', form_input('fleet', $fleet['id']));
                $this->table->add_row('Plane Id', form_input('fleet', $fleet['plane_id']));
                $this->table->add_row('Model', form_input('fleet', $fleet['model']));
                $this->table->add_row('Price', form_input('fleet', $fleet['price']));
                $this->table->add_row('Seats', form_input('fleet', $fleet['seats']));
                $this->table->add_row('Reach', form_input('fleet', $fleet['reach']));
                $this->table->add_row('Cruise', form_input('fleet', $fleet['cruise']));
                $this->table->add_row('Takeoff', form_input('fleet', $fleet['takeoff']));
                $this->table->add_row('Hourly', form_input('fleet', $fleet['hourly']));
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
        $this->data['jsonbutton'] = '<a class="btn btn-default" href="/info/fleet/' . $id . '" target="_blank"> Show JSON </a>';
        $this->render();

    }
    
    // handle form submission
    public function submit()
    {
        // setup for validation
      //  $this->load->library('form_validation');
       // $this->form_validation->set_rules($this->tasks->rules());

        // retrieve & update data transfer buffer
        $fleet = (array) $this->session->userdata('fleet');
        $fleet = array_merge($fleet, $this->input->post());
        $fleet = (object) $fleet;  // convert back to object
        $this->session->set_userdata('fleet', (object) $fleet);

        // validate away
      /*  if ($this->form_validation->run())
        {
            if (empty($task->id))
            {
                                $task->id = $this->tasks->highest() + 1;
                $this->tasks->add($task);
                $this->alert('Task ' . $task->id . ' added', 'success');
            } else
            {
                $this->tasks->update($task);
                $this->alert('Task ' . $task->id . ' updated', 'success');
            }
        } else
        {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
       */
        if (empty($task->id)) {
            $this->fleet->add($fleet);
        } else {
            $this->fleet->update($fleet);
        }
    }
}
