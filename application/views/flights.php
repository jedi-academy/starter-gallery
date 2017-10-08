<h1>{title}</h1>
<table border="1" cellpadding="2" cellspacing="1" class="table">
    <tr>
        <th>Flight ID</th>
        <th>Fleet</th>
        <th>Departure Airport</th>
        <th>Departure Time</th>
        <th>Arrival Airport</th>
        <th>Arrival Time</th>
    </tr>
    {flight_table}
    <tr>
        <td>
            <a href="/flights/{id}" 
               title="Fleet ID: {fleet_id}&#013;Departure Airport: {departure_airport_id}&#013;Departure Time:{departure_time}&#013;Arrival Airport: {arrival_airport_id}&#013;Arrival Time: {arrival_time}">
                {id}
            </a>
        </td>
        <td>{fleet_id}</td>
        <td>{departure_airport_id}</td>
        <td>{departure_time}</td>
        <td>{arrival_airport_id}</td>
        <td>{arrival_time}</td>
    </tr>
    {/flight_table}
</table>
<a class="btn btn-primary" href="/info/flights" target="_blank"> Show JSON </a>


