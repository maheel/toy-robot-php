# Toy Robot - PHP

## Install Dependencies

Install dependencies prior to running th application as below. 

    composer install

Or navigate to the root directory of the project and run 
    
    php composer.phar install

### Run Program

This code has been written in PHP 7, hence this must be run on PHP 7 environment

Navigate to the root directory and run,

     php index.php file_name

     Example:
     php index.php robot_commands

##### NOTE: I have included one CVS file in upload directory, if you need to add more files please add them in the same directory run the command with the file name as in abvoe example without the file extension.

### Run Unit Tests

PHPUnit has been used for unit tests and Mockery library has been used to mock dependencies

Navigate to the root directory and run,

     vendor/bin/phpunit test


### Improvements to be done

- Use a dependency injection container to manage class dependencies
- Use a logger library like Monolog to log exceptions
- Use Docker to run the application
- Write unit test for rest of the classes and add more test cases for already written test classes


### Directory structure

- src - All the program related original code
- test - Unit tests for original code
- upload - CSV file which should be processed are stored here


### Assumptions

- Commands are running from a CSV file (please add in the upload directory)
- REPORT command will be the last command in the sequence
