#Change Log

Team membership:  
    - Hai Hua (Ryan) Tan <ryanhhtan@gmail.com> 
    - Yuheng(Hugh) Song <hugh.happy.everyday@gmail.com> 
    - Harshita Sharma <hsharma15@my.bcit.ca>
    - Junnan Tang <junnan.tang.2014@gmail.com>
    - Terra Hunter <ms.terra.h@gmail.com>


## *Version 1.2.1
### Description
    - re-organized the routing and pages in adding/modifying fleet. (Ryan)
    - eliminate unnecessary methods from the mock-up hard-coded data
    - added javascript to make form input user-friendly 

### Updated components
    - Controllers
        - Home.php
        - FleetController.php (Major changes here)
    - Models
        - Fleet.php changed to Fleets.php. the prural one is the collection model, the sigular is the entity model.
    - Data
        - updated csv files, and set the files to be git update assume-unchanged 

### New Components
    - public/js/fleets.js

## *Version 1.2
### Description
    - Main part of this update, is to enable the fleet page to update the database. (Terra)
    - Fleet page can update/add/delete fleet items. (Terra)
    - Roles were polished. (Terra)
    - I also added the skeleton for fleet validation rules. (Terra)
    - Updated controllers to display role name better (Terra)
    - Enabled some basic logging of PHP messages. (Terra)
### Updated components
    - config.php
    - routes.php
    - Controllers
        - About.php
        - FleetController.php (Major changes here)
        - FlightsController.php
        - Home.php
    - Models
        - Fleet.php (Major changes here)
    - Views
        - fleet.php
        
### New Components
    application/logs/log-XXXX-XX-XX.php (php log messages)
    - Views
        - template/_delete.php
    


## *Version 1.1.3
### Description
    - optimized csv data and models to fit the CSV model better (Ryan)
    - fixed the crashed links to details of plane and flight (Ryan)
    - modified first() and last() method in Memory_Model adapt to associate arrays (Ryan)
### modified components
    - /application/
        - core/
            - Memery_Model.php
    - /data/
        - fleet.csv
        - flights.csv
        - airports.csv
    - /models/
        - Airports.php
        - Fleet.php
        - Flights.php

## *Version 1.1.2
### Description
    - changed model to CSV-persisted (Ryan)
### new component 
    - /application/
        - core/
            - CI_Model
            - CSV_Model.php
            - DataMapper.php
            - Entity.php
            - Memory_Model.php
            - MY_Controller.php
            - MY_Model.php
            - RDB_Model.php

    - /data/
        - fleet.csv
        - flights.csv
        - airports.csv
### modified components
    - /application/
        - controllers/
            - all

## *Version 1.1.1
### Description
    - Added phpunit as the unit testing framework (Ryan) 
    - Added tests for some business rules (Ryan) 
### New Components
    - /tests
        - /data
            - /business_rules 
                - arrival_time_limit.json
                - budget_limit.json
                - departure_time_limit.json
                - fly_interval_limit.json
        - Bootstrap.php 
        - BusinessRulesTest.php


## *Version 1.1* 
### Description
    - Fixed missing bootstrap problem (Terra)
    - Fixed navbar (Terra)
    - Added user roles and sessions for them (Terra)
    - Displayed Roles in the page titles (Terra)
### Updated components
    - config.php
    - autoload.php
    - constants.php
    - Controllers
        - About.php
        - FleetController.php
        - FlightsController.php
        - Home.php
    - Views
        - template/_menubar.php
        - template/template.php
### New Components
    - public/tmp
    - Controller
        - Roles.php










## *Version 1.0*
### Description
    - Updated a few things on the home page
    - Fixed nabar and footer
### Updated components
    - Modified view/home to remove the 0s from before the number of airports 
        and number of flights.  (Harshita)
    - Modified controllers/Home to show which airport is base and which are 
        destinations.           (Harshita)

## *Version 0.95.2*
### Description
    - Moved the JSON template button to the bottom in flights view.
### Updated components
    - Modified view/flight to show the JSON template button after the table 
      instead of before.        (Harshita)

## *Version 0.95.1*
### Description
    - Moved the JSON template button to the bottom in fleet view.
### Updated components
    - Modified view/fleet to show the JSON template button after the table 
      instead of before.        (Harshita)

## *Version 0.95*
### Description
    - Created the flights schedule.
### Updated components
    - Modified model/flight to show the flights schedule as per the business rules.
       (Harshita)

## *Version 0.9*
### Description
    - Modified the data to show the appropriate fleet.
### Updated components
    - Modified model/fleet to show the updated fleet details.       (Harshita)
    
    
## *Version 0.8.1*
### Description
    - Added code for showing the Airport list on homepage
### Updated components
    - controllers
        - Home.php (Terra) 
    - views
        - home.php (Terra) 
    - models
        - Airports.php (Terra)
        - Flights.php (Terra)
    - other
        - config/autoload.php (Terra)


## *Version 0.8*
### Description
    - Updated JSON buttons to adjust, depending on page it is on.
    - Cleaned up the flights views and removed the flightdetails.php, so we only need to use flights.php
    - Enabled some table headers & stuff to be capitalized and removed underscores.
### Updated components
    - Fix Flight page disappeared table style. (Junnan)
    - Fix navbar, when screen is small, navbar will change to a toggle. (Junnan)
    - Fix footer position in fleet datail and flight detail page (Junnan)
    - controllers
        - FleetController.php (Terra) 
        - FlightController.php (Terra) 
    - views
        - flight.php (Terra) 
        - template/_mouseover.php (Terra)
        - template/template.php add viewport for mobile size (Junnan)
        - about.php change info (Junnan)
        - template/template.php fix mobile background size (Junnan)
        - FlightsController.php fix button color (Junnan)
                             
### Deleted components
    - controllers
        - FleetController.php (Terra) 
        - FlightController.php (Terra) 
    - views
        -flight.php (Terra)                                    

## *Version 0.7*
### Description
    - Added mouse over hover component for the flights.
### Updated components
    - Modified view/flights to add the table components in the view itself 
      instead of passing the table created in the FlightsController 
      to include the hover tag for each table row.                   (Harshita)                                    (Harshita)
    - Modified the FlightsController to just pass the data to the views 
      instead of passing tables to the views                        (Harshita)
### New Components
-   views
    -   flightdetails.php    (Harshita)
      
## *Version 0.6*
### Description
    - Beautify our webapp

### New Components
    - Two pictures in public/data (Junnan)

### Updated components
    - Add information in about.php under application/views (Junnan)
    - Modify styles in template.php under application/views/template (Junnan)
    - Modify styles in fleet.php and flights.php (Junnan)
    - Modify table styles in Table.php under system/libraries (Junnan)

## *Version 0.5*
### Description
    - Fixed webhook hosting.
### Updated components
    - Moved all the pages directly under views folder, and removed pages subfolder (Ryan)
    - Removed Pages controller, added FleetController and FlightsController instead. (Ryan) 
    - Modify routes to adapt to new structure. (Ryna) 
    - Change all of page name in view fold into lower case      (Hugh)
    - Because the server is case sensitive, modify all names in route.php       (Hugh)



## *Version 0.4*
### Description
    - Try to fix about weebhook, first test    (Hugh)
    
    - change part of template css       (Hugh)

### Updated Components
    - style.css
    - template.php (change to the new boostrap, go to https://bootswatch.com/slate/ to see how to use) 



## *Version 0.3*
### Description
    - Restructured the project, got the menubar, controllers and pages work.
    - Added arbitrarily-generated random data in model fleet and flights.
    - Added tables to show the data. 
    - Modified Info controller to be RESTish, moved the showing fuction to the Pages controller. 

### New Components
-   models
    -   Fleet.php    (Ryan)
    -   Flights.php  (Ryan)
-   controllers
    -   Pages.php    (Ryan)
-   views
    -   template/_menubar.php (Ryan)
    -   template/_link.php (Ryan)

### Updated Components
-   controllers
    -   Info.php    (Terra, Ryan)
    -   Pages.php   (Terra)
-   models
    -   flights.php (Terra)
    -   fleet.php (Terra)
-   others
    -   route.php   (Ryan)


## *Version 0.2*
### Description
    -Try to load every views' content by using model. Right now, the home view can get the whole array from quote -model, but for other views, if I use get() function which inside quote.php, it will give me an error about -foreach() 

### New Components
-   models
    -   quotes.php

### Updated Components

-   controllers
    -   info.php    (hugh)
    -   MY_Controller.php   (hugh)
-   models



-   views
    -   home.php    (hugh)
    -   fleet.php   (hugh)
    -   flight.php  (hugh)
    -   about.php   (Terra)


-   others
    -   routes.php      (hugh)
    -   autoload.php    (hugh)

## *Version 0.1*
Release Date: Oct 5, 2017

### New Components

-   controllers

    -   Add info.php       (Hugh)

-   view
    -   Add home.php    (Hugh)
    -   Add Fleet.php   (Hugh)
    -   Add about.php   (Hugh)
    -   Add Flight.php  (Hugh)
    -   Add tamplate.php (Hugh)

### Updated Components

-   others
    -   routes.php  (Hugh)






