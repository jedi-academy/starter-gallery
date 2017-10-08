#Change Log

Team membership:  
    - Hai Hua (Ryan) Tan <ryanhhtan@gmail.com> 
    - Yuheng(Hugh) Song <hugh.happy.everyday@gmail.com> 
[!!! Please add your info here!!! -----------DELETE THIS LINE BEFORE SUBMISSION]

Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) 

## *Version 1.0*
[!!!added before submission!!!-----------DELETE THIS LINE BEFORE SUBMISSION]


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






