## Real Time Chat Application
This is a Realtime Chat Application built with Laravel **Livewire**, **Tailwind CSS**, and **Reverb** for managing real time messages when messaging you friends and loved ones.

## Features
- **Realtime Messaging**: Instantly chat with other users in realtime.
- **User Authentication**: Secure user registration and authentication system.
- **Message History**: View past messages and conversations.
- **Responsive Design**: Mobile-friendly interface built with Tailwind CSS.

## Technologies Used
- Laravel: Backend framework for building robust web applications.
- Livewire: Full-stack framework for Laravel to build dynamic interfaces.
- Tailwind CSS: Utility-first CSS framework for quickly styling your application.
- Reverb: Library for managing and handling realtime events.

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone https://github.com/amos-babu/realtime-chat-application
   ```

2. **Navigate to the project directory:**
   ```bash
   cd realtime-chat-application
   ```

3. **Install dependencies:**
   ```bash
   composer install
   ```

4. **Copy the `.env.example` file and configure your environment variables:**
   ```bash
   cp .env.example .env
   ```
   Update the following:
   - Database credentials
   - API URL
   - Real-time broadcast driver (e.g., Pusher)

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

6. **Run migrations:**
   ```bash
   php artisan migrate
   ```

7. **Start the development server:**
   ```bash
   php artisan serve
   ```

## Deployment
To deploy the backend application, you can use platforms like **AWS**, **DigitalOcean**, or **Heroku**. Ensure to:
- Set up a production database.
- Configure the `.env` file for production.
- Use a queue worker for background tasks.
- Set up SSL for secure communication.


---

## Contribution
If you want to contribute to this project, feel free to submit a pull request or open an issue in the repository.

## License
This project is licensed under the **MIT License**. See the `LICENSE` file for details.
