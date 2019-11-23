
# Appointments Management App / Rdv-Management

* Project status: working/prototype

## Table of contents
          I- WHAT IS IT?
          II- WHAT DOES IT DO
          III- WHAT TO DO AFTER CLONING/DOWNLOADING
          IV- WHAT WAS USED IN THE MAKING
          V- DEPLOYMENT MANUAL

-------------------------------------------------------------------------------------------------------------------------
                                                      I- WHAT IS IT?
-------------------------------------------------------------------------------------------------------------------------                                                      
       This is a simple, responsive CRUD App with OOP Php that mainly allows to plan appointments for patients in a hospital.
       
-------------------------------------------------------------------------------------------------------------------------
                                                      II- WHAT DOES IT DO?
------------------------------------------------------------------------------------------------------------------------- 
       Can store details about the hospital: Doctors, Secretaries, Patients, Rdvs, Services...
       The search function brought with dataTables allows to quickly filter on a long list.
       It's a CRUD... You can Create, Read, Update and Delete the data you add.
       There's restriction as to what one can do.
        --- About Users:
        There are three levels
            - Admin: can do pretty much everything
            - Secretary can use all CRUD function on Patient and Appointment records
            - Doctor can only use the Read function
        Each can connect with a Username and a Password.
        Those are supposed to be made by the Admin.
-------------------------------------------------------------------------------------------------------------------------
                                                      III- WHAT TO DO AFTER CLONING/DOWNLOADING
-------------------------------------------------------------------------------------------------------------------------
 These:
     1- Change the settings to match yours in "db_connect.php" (server, username, password)
     2- Create a Database with the name "RDV_Management"
     3- Import the tables with "RDV_Management.sql"
     4- Quotes are not part of the file name 
     5- If it doesn't work, ask Joe :3
-------------------------------------------------------------------------------------------------------------------------
                                                      IV- WHAT WAS USED IN THE MAKING
------------------------------------------------------------------------------------------------------------------------- 
        -- DataTables: DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool,
           built upon the foundations of progressive enhancement, that adds all of these advanced features to any HTML table.
           visit them here: "https://datatables.net"
           
        -- Bootstrap: Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas
           or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components,
           and powerful plugins built on jQuery.
           visit them here: "https://getbootstrap.com/"
           
        -- HTML, CSS, Php, JavaScript
        
-------------------------------------------------------------------------------------------------------------------------
                                                     IV- USEFULL LINKS
------------------------------------------------------------------------------------------------------------------------- 

Clone this repo with : "https://github.com/Zaydovaah/Rdv-Management.git"

For a deployment manual, visit: "https://dev.to/jorenrui/6-ways-to-deploy-your-personal-websites--php-mysql-web-apps-for-free-4m3a"

Bootstrap: "https://getbootstrap.com/"

Datepicker: "https://jqueryui.com/datepicker/"

DataTables: "https://datatables.net"

