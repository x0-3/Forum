# Forum

Welcome to the Music Forum! This website is built using Symfony and provides a platform for music enthusiasts to discuss various topics related to music. Whether you want to share your thoughts, ask questions, or discover new music, this forum is the perfect place for music lovers like you.

## Features

### User Authentication
- Sign up for a new account with a unique username and password.
- Log in to access your account and participate in the forum discussions.
- Secure authentication system to protect user data.

### Home Page
- View a list of all topics on the home page, sorted by the latest activity.
- Each topic displays its title, author.
- Easily navigate to a specific category or topic of interest.

### Category and Topic Listings
- Browse all available categories and their associated topics.
- Select a category to view the list of topics within that category.
- Topics display their title, author.

### Topic Creation and Comments
- Create new topics within a selected category.
- Add a title, content, and tags to describe your topic.
- Comment on existing topics to engage in discussions.
- Each comment displays the author, content.

### Admin Privileges
- Admin users have special privileges to manage the forum.
- Lock topics to prevent further comments.
- Delete topics and comments posted by users.
- Maintain the integrity and quality of forum discussions.

### User Profile
- Access your user profile to view your personal information.
- See a list of topics created by the user.
- Edit profile details such as username and password.

### Search Functionality
- Use the search bar to find specific topics or keywords.
- Search results display relevant topics matching the search query.

### Topic Likes
- Like topics to show appreciation or agreement.
- Users can like a topic only once.

## Installation

To run this project locally, please follow the steps below:

1. Clone the repository to your local machine:
   ```
   git clone https://github.com/x0-3/Forum.git
   ```

2. Change into the project directory:
   ```
   cd Forum
   ```

3. Install the required dependencies using Composer:
   ```
   composer install
   ```

4. Import the provided database into your MySQL server:
   - Locate the database file named `db.sql` inside the `db` folder.
   - Import this file into your MySQL server to create the necessary tables and populate them with sample data. You can use a tool like heidiSql or run the following command:
     ```
     mysql -u your-username -p your-database-name < db.sql
     ```

5. Configure the database connection:
   - Open the `.env` file and update the `DATABASE_URL` parameter with your MySQL database credentials.

7. Start the Symfony development server:
   ```
   symfony server:start
   ```

8. Access the application in your web browser:
   ```
   http://localhost:8000
   ```
