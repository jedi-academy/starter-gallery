<h1>{title}</h1>

<table border="1" cellpadding="2" cellspacing="1" class="table">
    <tr>
        <th>Flight ID</th>
        <td>{id}</td>
    </tr>
    <tr>
        <th style="background-color:rgba(0, 0, 0, .3);">Fleet</th>
        <td style="background-color:rgba(0, 0, 0, .3);">{fleet_id}</td>
    </tr>
    <tr>
        <th>Departure Airport</th>
        <td>{departure_airport_id}</td>
    </tr>
    <tr>
        <th style="background-color:rgba(0, 0, 0, .3);">Departure Time</th>
        <td style="background-color:rgba(0, 0, 0, .3);">{departure_time}</td>
    </tr>
    <tr>
        <th>Arrival Airport</th>
        <td>{arrival_airport_id}</td>
    </tr>
    <tr>
        <th style="background-color:rgba(0, 0, 0, .3);">Arrival Time</th>
        <td style="background-color:rgba(0, 0, 0, .3);">{arrival_time}</td>
    </tr>
</table>
<a class="btn btn-default" href="/info/flights" target="_blank"> Show JSON </a>

