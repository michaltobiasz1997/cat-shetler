## Cat Shelter API

This project is an API for a cat shelter management system, allowing users to access information about the shelter, employees, and cats. 
The API provides endpoints to retrieve and manipulate data related to these three models.

## Features

Shelter Information: The API provides endpoints to retrieve information about the cat shelter, including its name, location, and contact details.

Employee Management: Users can access endpoints to view and manage employees working at the cat shelter. This includes retrieving employee details, adding new employees, updating existing employee information, and deleting employee records.

Cat Management: The API allows users to perform various operations related to cats in the shelter. This includes retrieving information about available cats, adding new cats to the shelter, updating existing cat information, and marking cats as adopted.

## Usage
To use the Cat Shelter API, you can make HTTP requests to the provided endpoints.

## Endpoints
<ul dir="auto">
    <li><code>GET /shelters</code> - Retrieves a list of all cat shelters</li>
    <li><code>GET /shelters/{id}</code> - Retrieves detailed information about a specific shelter, identified by their ID.</li>
    <li><code>POST /shelters</code> - Adds a new cat shelter. Requires employee information in the request body.</li>
    <li><code>PUT /shelters/{id}</code> - Updates the information of a specific shelter, identified by their ID. Requires updated employee information in the request body.</li>
    <li><code>DELETE /shelters/{id}</code> - Deletes a specific shelter record, identified by their ID.</li>
    <li><code>GET /employees</code> - Retrieves a list of all employees working at the cat shelters.</li>
    <li><code>GET /employees/{id}</code> - Retrieves detailed information about a specific employee, identified by their ID.</li>
    <li><code>POST /employees</code> - Adds a new employee to the cat shelter. Requires employee information in the request body.</li>
    <li><code>PUT /employees/{id}</code> - Updates the information of a specific employee, identified by their ID. Requires updated employee information in the request body.</li>
    <li><code>DELETE /employees/{id}</code> - Deletes a specific employee record, identified by their ID.</li>
    <li><code>GET /cats</code> -  Retrieves a list of all available cats in the shelter</li>
    <li><code>GET /cats/{id}</code> - Retrieves detailed information about a specific cat, identified by their ID.</li>
    <li><code>POST /cats</code> - Adds a new cat to the shelter's inventory. Requires cat information in the request body.</li>
    <li><code>PUT /cats/{id}</code> - Updates the information of a specific cat, identified by their ID. Requires updated cat information in the request body.</li>
    <li><code>DELETE /cats/{id}</code> - Deletes a specific cat record, identified by their ID.</li>
</ul>

## Testing and Performance
Sample tests have been implemented for the API, which can be automatically executed using GitHub Actions. These tests help ensure the correctness of the API endpoints and their behavior.

To improve performance, response caching has been implemented. This allows frequent or identical requests to be served from cache, reducing the response time and minimizing unnecessary server load.

## Documentation
The API documentation has been generated using <a href="https://scribe.knuckles.wtf/" target="_blank">Scribe</a>, providing detailed information about the available endpoints, request/response structures, and example usage. The documentation can be accessed at <i>app_url</i>/docs.
