# Hospital Management System
**Project Duration:** Jan 26th - Apr 10th 2024

This project, developed as part of a 1st-year university assignment, is a web-based hospital management system that allows hospital staff to manage patients, staff, and medicine supplies efficiently. There are four types of users:

- **Receptionist/Admin**: Manage patient profiles & staff records.  
- **Doctor**: View patient’s basic details & lab test results, edit patient diagnosis details, add issued prescriptions, & add requested lab tests.  
- **Lab Technician**: Manage lab test results in patient’s lab test record.  
- **Pharmacist**: Add the date collected in a prescription record, & edit medicine supply records.

## Technology Used:  
- HTML, JavaScript, PHP

## Database:
- MySQL

## Possible Improvements
- Adding code comments
- Implementing confirmation pages after completing an action
- Creating user-specific dashboards
- Automatic creation of IDs when creating records
- Using names rather than IDs when referring to records from different tables

## How To Run
1. Clone the repository (e.g., in Visual Studio Code) and save it in the **htdocs** directory inside your **XAMPP** folder
2. Open **XAMPP** and start both the **Apache** and **MySQL** servers
3. Open **phpMyAdmin** by going to **localhost/phpmyadmin** in your browser
4. For each .sql file (e.g., diagnosis_database.sql, lab_database.sql, etc.):
   4.1. Create a new database with a name that corresponds to the file (e.g., diagnosis_database, lab_database)
   4.2. Select the database, go to the **Import** tab, and upload the corresponding .sql file to import its tables and data
5. Open a browser and go to: **localhost/hospital-management/login/login.php**

### Admin Login
- Username: **KJohnson1535**
- Password: **Dn27cP10#**

### Doctor Login
- Username: **NHart3525**
- Password: **nd$84BP4**

### Lab Technician Login
- Username: **TBlack8790**
- Password: **fi7g89YE&**

### Pharmacist Login
- Username: **EPowell9297**
- Password: **Ko56S£rt9**
