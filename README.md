# eVisaBook: Cloud-Powered Visa Appointment System

A cloud-native visa appointment system leveraging PHP, MySQL, and AWS technologies to streamline appointment bookings and document uploads.

## Features
- User authentication (login/signup).
- Visa appointment scheduling with status updates.
- Secure storage for appointment data.
- Scalable deployment using AWS EC2.

## Installation
1. Clone the repository:
- git clone https://github.com/Abishek2/eVisaBook.git
2. Navigate to the project directory:
cd eVisaBook
3. Set up the database:
- Import `database/visa_appointment_schema.sql` into MySQL.
4. Update `config.php` with your database credentials.
5. Start a local PHP server:
- php -S localhost:8000 -t src/

## Future Enhancements
- Add real-time notifications using email or SMS.
- Implement advanced security measures like 2FA.
- Migrate to a full cloud stack with serverless capabilities.



