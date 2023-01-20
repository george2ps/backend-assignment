<h1>Documentation</h1>

Requirements:

<ul>
    <li>PHP 7.4 and above</li>
    <li>Composer</li>
</ul>

<p>
    This application purpose acts as an API server that serves vessel tracks from a MySQL database.
    The logs from the requests are kept inside the database as well.
    There is a rate limiter at 10 requests per minute.

    Below you will find the steps on how to use the application:
</p>

<h3>Step 1</h3>
<p>Run Composer Install inside the project's folder:</p>
<code>composer  install</code>

<h3>Step 1</h3>
<p>Configure your MySQL database credentials inside the <code>.env</code> file like:</p>
<code>
    DB_CONNECTION=mysql<br>
    DB_HOST=127.0.0.1<br>
    DB_PORT=3306<br>
    DB_DATABASE=marinetraffic<br>
    DB_USERNAME=root<br>
    DB_PASSWORD=<br>
</code>

<h3>Step 2</h3>
<p>Run the command below inside your project's folder to migrate the tables to the database:</p>
<code>php artisan migrate</code>

<h3>Step 3</h3>
<p>Run the command below inside your project's folder to start the local server:</p>
<code>php artisan serve</code>

<h3>Step 4</h3>
<p>Run the command below inside your project's folder:</p>
<code>php artisan sync:ship_positions</code>

<h3>Step 5</h3>
<p>Open Postman or any other application to make requests.</p>
<p>Paste in the below url and using the <code>GET</code> method make a request:</p>
<code>http://127.0.0.1:8000/api/get/ship/positions</code>

<h3>Step 6</h3>
<p>Filters</p>
<ul>
    <li>
        Offset and Limit of the query (must be used together)
        <h5>Example:</h5>
        <code>http://127.0.0.1:8000/api/get/ship/positions?offset=100&limit=100</code>
    </li>
    <li style="margin-top: 30px;">
        MMSI (You can filter by multiple MMSIs by adding a coma between the values).
        <h5>Example:</h5>
        <code>http://127.0.0.1:8000/api/get/ship/positions?mmsi=247039300,311040700</code>
    </li>
    <li style="margin-top: 30px;">
        Coordinates range
        <h5>Example:</h5>
        <code>http://127.0.0.1:8000/api/get/ship/positions?latStart=42.03212&latEnd=43.03212&lonStart=15.21578&lonEnd=16.21578</code>
    </li>
    <li style="margin-top: 30px;">
        Time interval (Add the starting timestamp and ending timestamp seperated by a coma)
        <h5>Example:</h5>
        <code>http://127.0.0.1:8000/api/get/ship/positions?timestamp=1372683960,1372700340</code>
    </li>
</ul>
