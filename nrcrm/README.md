NR Client Management System
=======

Overview
-----------
The idea behind this software was a from a colleague who was thinking of a system that could  track client interactions and also be a database of client contacts we had within the region. I thought it was doable using the languages I am familiar with (PHP/Apache/MySQL) so I decided to try creating one.  

A couple of years ago I created a Query Logging software using PHP/Apache/MySQL for the helpdesk that I used to work for so I thought of using that as a pattern for this new software.  The notable difference between that software and this current one is the login feature where PHP's [Session Handling](http://www.php.net/manual/en/book.session.php) is used to manage the login/logout and identification of the user (among other things).  Also, with this current software, I used CSS files that I learned from at [TreeHouse](teamtreehouse.com) and of course GitHub for versioning.  Thanks GitHub!!!
 
Technologies used:
   * PHP
   * MySQL
   * Apache
   * Please note that this application is also optimized for mobile screens by using the responsive.css

Installation
-----------
   * XAMPP - I used the [XAMPP](https://www.apachefriends.org/index.html) bundle to make things easy to install.  
   * MySQL database - Table structure can be found in the repo and they are the only 3 JPG files in there.  Will probably create a script in the future to create these tables on the fly.
   * PHPExcel - [PHPExcel on GitHub](https://github.com/PHPOffice/PHPExcel) is a PHP class that enables extracted data to be inserted into a Microsoft Excel file.  This was used for the export functionality.

 
Workflows
-------------
   * Creating a new client
   * Searching for a client and then entering interaction details
   * Searching for interactions within a specified date range and exporting to Excel
   * Searching for interactions with a specific client and exporting to Excel

   
Caveats
-------------
The security aspect of this system is not very good but I did add some input validations as there are a lot of forms in this software.  Before using this software, please make sure to implement safeguards at the MySQL level (i.e. Admin user/password for database, super users, etc...).