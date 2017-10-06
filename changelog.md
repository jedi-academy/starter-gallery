#Change Log

Team membership:  
Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet) 

## *Version 1.0*
[added before submission]

## *Version 0.3*
### Description
    - Restructured the project, got menubar and the required controller and pages work
    - Added arbitrarily-generated random data in model fleet and flights.
    - Show data in a table 
    - Modified Info controller to be RESTish, moved the showing fuction to the Pages controller 

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
    -   routes.php  (hugh)






