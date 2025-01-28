<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE</title>
    <link rel="stylesheet" href="../css/adminconsole.css">
</head>
<body>
    <fieldset class="container">
        <h1 class="blue">Admin Console</h1>
        <hr class="blue">
        <h1>Welcome back, @AdminUser</h1>
        <!-- <fieldset id="server_msg">No se ha encontrado un usuario con ese nombre.</fieldset> -->
        <fieldset class="p0">
            <fieldset class="p1"> 
                <form id="list">
                    <label>List items:</label><br>
                    <select>
                        <option value="current_connections">Current Connections</option>
                        <option value="current_connections">Historic Connections</option>
                        <option value="current_connections">System Status</option>
                        <option value="current_connections">Users</option>
                    </select>
                    <input type="submit" value="Filter">
                </form>
            </fieldset>

            <fieldset class="p1"> 
                <form id="getuser">
                    <label>Get data from user:</label><br>
                    <input type="text">
                    <input type="submit" value="Retrieve">
                </form>
            </fieldset>

        </fieldset>

        <table class="results">
            <!-- <caption>
                Resultados:
                <hr>
            </caption>
            <thead>
                <tr>
                <th scope="col">Person</th>
                <th scope="col">Most interest in</th>
                <th scope="col">Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">Chris</th>
                <td>HTML tables</td>
                <td>22</td>
                </tr>
                <tr>
                <th scope="row">Dennis</th>
                <td>Web accessibility</td>
                <td>45</td>
                </tr>
                <tr>
                <th scope="row">Sarah</th>
                <td>JavaScript frameworks</td>
                <td>29</td>
                </tr>
                <tr>
                <th scope="row">Karen</th>
                <td>Web performance</td>
                <td>36</td>
                </tr>
            </tbody> -->
        </table>
    </fieldset>

</body>
</html>