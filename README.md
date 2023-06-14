## Cat Shelter API

This project is an API for a cat shelter management system, allowing users to access information about the shelter, employees, and cats. 
The API provides endpoints to retrieve and manipulate data related to these three models.

## Features

Shelter Information: The API provides endpoints to retrieve information about the cat shelter, including its name, location, and contact details.

Employee Management: Users can access endpoints to view and manage employees working at the cat shelter. This includes retrieving employee details, adding new employees, updating existing employee information, and deleting employee records.

Cat Management: The API allows users to perform various operations related to cats in the shelter. This includes retrieving information about available cats, adding new cats to the shelter, updating existing cat information, and marking cats as adopted.

## Usage
To use the Cat Shelter API, you can make HTTP requests to the provided endpoints.

Testing and Performance
Sample tests have been implemented for the API, which can be automatically executed using GitHub Actions. These tests help ensure the correctness of the API endpoints and their behavior.

To improve performance, response caching has been implemented. This allows frequent or identical requests to be served from cache, reducing the response time and minimizing unnecessary server load.

Documentation
The API documentation has been generated using Scribe, providing detailed information about the available endpoints, request/response structures, and example usage. The documentation can be accessed at <i>app_url</i>/docs.
