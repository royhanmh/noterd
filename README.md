# Noterd - Your Better Note-Taking Solution

Noterd is a web-based note-taking application that provides you with a simple and effective way to manage your notes. Whether you're a student, professional, or just someone who likes to stay organized, Noterd has got you covered.

![Noterd Banner](public/assets/img/navbarBanner.png)

## Features

- **User-Friendly Interface**: Easily create, edit, and organize your notes.
- **Secure Login**: Protect your notes with a secure login system.
- **Responsive Design**: Access your notes on any device.
- **User and Admin Roles**: Separate user and admin roles for better control.
- **Search Functionality**: Quickly find the notes you need.

## Getting Started

### Prerequisites

- PHP 7.3 or higher
- Composer
- MySQL Database

### Installation

1. Clone the repository to your local machine:

   ```shell
   git clone https://github.com/yourusername/noterd.git
   ```

2. Navigate to the project directory:

   ```shell
   cd noterd
   ```

3. Install project dependencies using Composer:

   ```shell
   composer install
   ```

4. Create a new MySQL database for the application.

5. Configure the database connection by editing the `.env` file:

   ```ini
   database.default.hostname = your_database_hostname
   database.default.database = your_database_name
   database.default.username = your_database_username
   database.default.password = your_database_password
   ```

6. Import the database using the provided SQL dump. You can use a tool like phpMyAdmin or run the following command:

   ```shell
   mysql -u your_database_username -p your_database_name < database_dump.sql
   ```

7. Start the development server:

   ```shell
   php spark serve
   ```

8. Open your web browser and navigate to [http://localhost:8080](http://localhost:8080) to access Noterd.

### Usage

#### User Login

- Username: user
- Password: user

#### Admin Login

- Username: admin
- Password: admin

## Tech Stack

- **Framework**: CodeIgniter 4
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap, SB Admin 2
- **Backend**: PHP
- **Authentication**: Built-in authentication system
- **Rich Text Editor**: TinyMCE

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- Thanks to CodeIgniter 4 for the web application framework.
- Thanks to [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2) for the Bootstrap Admin Template
- Thanks to [TinyMCE](https://www.tiny.cloud/) for the rich text Editor
- Icons and Image made by [Freepik](https://www.freepik.com).
