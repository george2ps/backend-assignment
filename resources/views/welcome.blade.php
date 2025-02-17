<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="justify-center pt-8 sm:justify-start sm:pt-0">

                    <h1>Documentation</h1>

                    Requirements:

                    <ul>
                        <li>PHP 7.4 and above</li>
                        <li>Composer</li>
                    </ul>

                    <p>
                        This application purpose acts as an API server that serves vessel tracks from a MySQL database.
                        The logs from the requests are kept inside the database as well (table name: dev_logs).
                        There is a rate limiter at 10 requests per minute.

                        Below you will find the steps on how to use the application:
                    </p>

                    <h3>Step 1</h3>
                    <p>Run Composer Install inside the project's folder:</p>
                    <code>composer install</code>


                    <h3>Step 2</h3>
                    <p>
                        Copy the <code>.env.example</code> file inside the root folder and rename it <code>.env</code>
                    </p>

                    <h3>Step 3</h3>
                    <p>
                        Generate app key using the command below inside the project's folder:
                        <code>php artisan key:generate</code>
                    </p>


                    <h3>Step 4</h3>
                    <p>
                        Configure your MySQL database credentials inside the <code>.env</code> file:
                        <h5>Example:</h5>
                    </p>
                    <code>
                        DB_CONNECTION=mysql<br>
                        DB_HOST=127.0.0.1<br>
                        DB_PORT=3306<br>
                        DB_DATABASE=marinetraffic<br>
                        DB_USERNAME=root<br>
                        DB_PASSWORD=<br>
                    </code>

                    <h3>Step 5</h3>
                    <p>Run the command below inside your project's folder to migrate the tables to the database:</p>
                    <code>php artisan migrate</code>

                    <h3>Step 6</h3>
                    <p>Run the command below inside your project's folder to start the local server:</p>
                    <code>php artisan serve</code>

                    <h3>Step 7</h3>
                    <p>Run the command below inside your project's folder:</p>
                    <code>php artisan sync:ship_positions</code>

                    <h3>Step 8</h3>
                    <p>Run the command below inside your project's folder to test the application:</p>
                    <code>php artisan test</code>

                    <h3>Step 9</h3>
                    <p>Open Postman or any other application to make requests.</p>
                    <p>Paste in the below url and using the <code>GET</code> method make a request:</p>
                    <code>http://127.0.0.1:8000/api/get/ship/positions</code><br>
                    <img width="800" src="{{ asset('assets/images/test1.png') }}" alt="">

                    <h3>Step 10</h3>
                    <p>Filters</p>
                    <ul>
                        <li>
                            Offset and Limit of the query (must be used together)
                            <h5>Example:</h5>
                            <code>http://127.0.0.1:8000/api/get/ship/positions?offset=100&limit=100</code><br>
                            <img width="800" src="{{ asset('assets/images/test2.png') }}" alt="">
                        </li>
                        <li style="margin-top: 30px;">
                            MMSI (You can filter by multiple MMSIs by adding a coma between the values).
                            <h5>Example:</h5>
                            <code>http://127.0.0.1:8000/api/get/ship/positions?mmsi=247039300,311040700</code><br>
                            <img width="800" src="{{ asset('assets/images/test3.png') }}" alt="">
                        </li>
                        <li style="margin-top: 30px;">
                            Coordinates range
                            <h5>Example:</h5>
                            <code>http://127.0.0.1:8000/api/get/ship/positions?latStart=42.03212&latEnd=43.03212&lonStart=15.21578&lonEnd=16.21578</code><br>
                            <img width="800" src="{{ asset('assets/images/test4.png') }}" alt="">
                        </li>
                        <li style="margin-top: 30px;">
                            Time interval (Add the starting timestamp and ending timestamp seperated by a coma)
                            <h5>Example:</h5>
                            <code>http://127.0.0.1:8000/api/get/ship/positions?timestamp=1372683960,1372700340</code><br>
                            <img width="800" src="{{ asset('assets/images/test5.png') }}" alt="">
                        </li>
                    </ul>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
