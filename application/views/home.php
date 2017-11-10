<div id="page_title">
<h1>{title}</h1>
</div>


<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-send fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{fleet_count}</div>
                                <div>Active Airlines</div>
                            </div>
                        </div>
                    </div>
                    <a href="/fleet">
                        <div class="panel-footer">
                            <span class="pull-left">{fleet_count} airlines licensed</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-suitcase fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{flight_count}</div>
                                <div>Flights scheduled</div>
                            </div>
                        </div>
                    </div>
                    <a href="/flights">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plane fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{airport_count}</div>
                                <div>Airports</div>
                            </div>
                        </div>
                    </div>

        
                    <div class="panel-footer">
                        <span class="pull-left">{airport_list}</span>
                        <div class="clearfix"></div>
                    </div>
       
                </div>
            </div>
        </div>
    </div>
</div>
