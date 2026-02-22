# Setting Up and Running the PHP Web Server

This document provides steps to set up and run a PHP web server.

## Prerequisites
- Make sure you have PHP installed on your system. You can download it from [the official PHP website](https://www.php.net/downloads).
- A terminal or command line interface.

## Steps to Set Up the PHP Web Server

1. **Navigate to your project directory**:
   Open your terminal and change the directory to your project's root folder:
   ```bash
   cd /path/to/your/project
   ```

2. **Start the PHP built-in server**:
   Use the following command to start the server:
   ```bash
   php -S localhost:8000
   ```
   This command starts a local server on port 8000. You can change the port number if needed.

3. **Access your application**:
   Open your web browser and navigate to [http://localhost:8000](http://localhost:8000). You should see your application running.

## Stopping the Server
- To stop the server, return to the terminal where the server is running and press `CTRL + C`.  

## Additional Information
- For more information on the PHP built-in server, you can refer to the [PHP manual](https://www.php.net/manual/en/features.commandline.webserver.php).