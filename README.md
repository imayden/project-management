# Project Management REST API

## Developer
- Ayden Deng
- Email: ayden.yiming.deng@gmail.com

## Overview
This is a Laravel-based Project Management REST API that allows users to manage projects and their associated tasks. The application provides endpoints to create, read, update, and delete projects and tasks.

---

## **Software Versions**

- **Laravel Framework**: 11.37.0  
- **Composer**: 2.8.4 (2024-12-11)  
- **PHP**: 8.4.2  
- **MySQL**: 9.1.0  

---

## **Setup Instructions**

### **1. Prerequisites**
Before starting, ensure the following are installed on your machine:
- PHP 8.4+
- Composer
- MySQL
- Node.js (optional, for frontend scaffolding if needed)

### **2. Clone the Repository**
```bash
git clone https://github.com/imayden/project-management.git
cd project-management
```

### **3. Install Dependencies**
Install PHP and Composer dependencies:
```bash
composer install
```

### **4. Configure the Environment**
1. Copy the `.env.example` file and create a `.env` file:
   ```bash
   cp .env.example .env
   ```
2. Update the `.env` file with your database and application configurations. Example:
   ```env
   APP_NAME=ProjectManagementAPI
   APP_ENV=local
   APP_KEY=base64:your_generated_key
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=project_management
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

### **5. Generate Application Key**
Run the following command to generate the application key:
```bash
php artisan key:generate
```

### **6. Run Migrations and Seeders**
Create the database tables and seed sample data:
```bash
php artisan migrate --seed
```

---

## **Running the Application**
To start the Laravel development server:
```bash
php artisan serve
```
The server will be available at: `http://127.0.0.1:8000`

---

## **API Documentation**

### **Base URL**
```
http://127.0.0.1:8000/api
```

### **Projects Endpoints**

1. **Get All Projects**
   - **URL**: `/projects`
   - **Method**: GET
   - **Response**:
     ```json
     [
       {
         "id": 1,
         "title": "Project 1",
         "description": "Description of Project 1",
         "status": "open",
         "created_at": "2025-01-13T10:00:00.000000Z",
         "updated_at": "2025-01-13T10:00:00.000000Z",
         "tasks": []
       }
     ]
     ```

2. **Create a Project**
   - **URL**: `/projects`
   - **Method**: POST
   - **Body**:
     ```json
     {
       "title": "New Project",
       "description": "Project Description",
       "status": "open"
     }
     ```
   - **Response**:
     ```json
     {
       "id": 1,
       "title": "New Project",
       "description": "Project Description",
       "status": "open",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T10:00:00.000000Z"
     }
     ```

3. **Get a Single Project**
   - **URL**: `/projects/{id}`
   - **Method**: GET
   - **Response**:
     ```json
     {
       "id": 1,
       "title": "Project 1",
       "description": "Description of Project 1",
       "status": "open",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T10:00:00.000000Z"
     }
     ```

4. **Update a Project**
   - **URL**: `/projects/{id}`
   - **Method**: PUT
   - **Body**:
     ```json
     {
       "title": "Updated Project",
       "description": "Updated Description",
       "status": "completed"
     }
     ```
   - **Response**:
     ```json
     {
       "id": 1,
       "title": "Updated Project",
       "description": "Updated Description",
       "status": "completed",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T10:10:00.000000Z"
     }
     ```

5. **Delete a Project**
   - **URL**: `/projects/{id}`
   - **Method**: DELETE
   - **Response**:
     ```json
     {
       "message": "Project deleted"
     }
     ```

### **Tasks Endpoints**

1. **Get All Tasks**
   - **URL**: `/tasks`
   - **Method**: GET
   - **Response**:
     ```json
     [
       {
         "id": 1,
         "project_id": 1,
         "title": "Task 1",
         "description": "Description of Task 1",
         "status": "to_do",
         "created_at": "2025-01-13T10:00:00.000000Z",
         "updated_at": "2025-01-13T10:00:00.000000Z"
       }
     ]
     ```

2. **Get All Tasks by Project**
   - **URL**: `/projects/{project_id}/tasks`
   - **Method**: GET
   - **Response**:
     ```json
     [
       {
         "id": 1,
         "project_id": 16,
         "title": "Task 1",
         "description": "Description of Task 1",
         "status": "to_do",
         "created_at": "2025-01-13T10:00:00.000000Z",
         "updated_at": "2025-01-13T10:00:00.000000Z"
       },
       {
         "id": 2,
         "project_id": 16,
         "title": "Task 2",
         "description": "Description of Task 2",
         "status": "in_progress",
         "created_at": "2025-01-13T11:00:00.000000Z",
         "updated_at": "2025-01-13T11:00:00.000000Z"
       }
     ]
     ```

3. **Get a Single Task**
   - **URL**: `/tasks/{id}`
   - **Method**: GET
   - **Response**:
     ```json
     {
       "id": 1,
       "project_id": 16,
       "title": "Task 1",
       "description": "Description of Task 1",
       "status": "to_do",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T10:00:00.000000Z"
     }
     ```

4. **Create a Task**
   - **URL**: `/projects/{project_id}/tasks`
   - **Method**: POST
   - **Body**:
     ```json
     {
       "title": "New Task",
       "description": "Task Description",
       "status": "to_do"
     }
     ```
   - **Response**:
     ```json
     {
       "id": 1,
       "project_id": 16,
       "title": "New Task",
       "description": "Task Description",
       "status": "to_do",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T10:00:00.000000Z"
     }
     ```

5. **Update a Task**
   - **URL**: `/tasks/{id}`
   - **Method**: PUT
   - **Body**:
     ```json
     {
       "title": "Updated Task",
       "description": "Updated Description",
       "status": "in_progress"
     }
     ```
   - **Response**:
     ```json
     {
       "id": 1,
       "project_id": 16,
       "title": "Updated Task",
       "description": "Updated Description",
       "status": "in_progress",
       "created_at": "2025-01-13T10:00:00.000000Z",
       "updated_at": "2025-01-13T11:00:00.000000Z"
     }
     ```

6. **Delete a Task**
   - **URL**: `/tasks/{id}`
   - **Method**: DELETE
   - **Response**:
     ```json
     {
       "message": "Task deleted"
     }
     ```

---

## **Running Unit Tests**

To run unit tests for the application:
```bash
php artisan test
```

### **Sample Output**
```plaintext
PASS  Tests\Unit\ProjectTest
✓ create project
✓ update project
✓ delete project
✓ get single project
✓ get all projects

PASS  Tests\Unit\TaskTest
✓ create task
✓ update task
✓ delete task
✓ get single task
✓ get all tasks
```

---

## **Using Postman for API Testing**

1. Open Postman and create a new collection.
2. Add requests for each endpoint listed in the API documentation above.
3. For POST and PUT requests, set the request body to JSON format and provide the necessary fields.
4. Send the requests to test the functionality of the API.

---

## **Troubleshooting**

- Ensure your `.env` file is correctly configured for your local environment.
- Run `php artisan config:clear` and `php artisan cache:clear` if you encounter configuration issues.
- Use the following command to reset the database if necessary:
  ```bash
  php artisan migrate:fresh --seed
  ```
