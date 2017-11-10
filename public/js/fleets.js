$(document).ready(function(){
    //console.log('hello');
    $("option:first-child").attr({'disabled':''}); 
    $("#plane_list").on('change', function(e){
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value; 
        //console.log(valueSelected);

        getPlane(valueSelected);
    })
});

function getPlane(planeId) {
    var url = "/wacky/plane/" + planeId;
    $.getJSON(url, function(data){
        for (var key in data) {
            if (key == 'id')
                continue;
            $('#'+key).val(data[key]); 
        }

        /*
        $('#manufacturer').val(data.manufacturer);
        $('#model').val(data.model);
        $('#price').val(data.price);
        $('#seats').val(data.seats);
        $('#reach').val(data.reach);
        $('#cruise').val(data.cruise);
        $('#takeoff').val(data.takeoff);
        $('#hourly').val(data.hourly);
        */
    });
    /*
    $.get(url, function(data, status){
        console.log(data);
    });
    */
}
