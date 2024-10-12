# Awesome Marketing CRM
## About the Project
Awesome Marketing CRM was created as a tool for marketing agencies. It allows for the storage of passwords for client websites, FTP servers, etc., and also enables logging when these credentials are accessed, giving control over who retrieved the password and for what purpose (of course, these data are encrypted). Additionally, the tool allows for logging phone calls and actions taken on behalf of clients. It also integrates with the SEMSTORM API, simplifying the process of generating reports.
## Installation

Follow the steps below to set up the project:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/michalpruchniak/awesome-marketing-crm.git
    ```

2. **Navigate to the project directory:**

    ```bash
    cd awesome-marketing-crm
    ```

3. **Install PHP dependencies:**

    Make sure to install all necessary dependencies using Composer:

    ```bash
    composer install
    ```

4. **Set up environment variables:**

    Copy the `.env.example` file to `.env` and update your environment variables, such as database connection details.

    ```bash
    cp .env.example .env
    ```

    Then, generate the application key:

    ```bash
    php artisan key:generate
    ```

5. **Set up the database:**

    Make sure your database is running, and you've updated the `.env` file with the correct database credentials.

    Run the following command to migrate the database:

    ```bash
    php artisan migrate
    ```

6. (Optional) **Install Node.js dependencies** (if you are using Laravel Mix for frontend assets):

    ```bash
    npm install
    ```

7. (Optional) **Compile frontend assets**:

    If your project includes frontend assets that need to be compiled, run:

    ```bash
    npm run dev
    ```

    For production:

    ```bash
    npm run build
    ```
8. **Running the Project**:
    You can run the project in development mode using Laravel's built-in server:

    ```bash
    php artisan serve
## Features
### Storing login credentials for client websites, FTP servers, etc.
Every marketing agency needs to store client login credentials in order to achieve set goals. Awesome Marketing CRM not only enables the encrypted storage of these credentials in the database but also facilitates the tracking of who accessed the data and when, making it easier to identify who made specific changes.
### Activity Logging
Awesome Marketing CRM allows for the logging of client-related activities, such as phone calls or specific actions taken on the client's website. This makes it easier to reconcile work with the client later.
### Integrations
At the moment, the application integrates with SEMSTORM, which simplifies retrieving data for specific client domains and helps with report generation.
