PHP login function with JWT.

JWT ensures that parts of the application will only be accesible through various roles. Like a user should administrate a CRUD frunction of new products. With the JWT, we can store user data, identify the user roles, while JWT encrypts the user data for the public eye. 

This will ensure high security and checks upon login and thus makes it harder to fake a role or do malicious actions from outsiders.

INSTALL JWT:
Wether you use MacOS, Windows or Linux, you will have to install JWT through composer for PHP:

![Composer_JWT](https://github.com/user-attachments/assets/e1b65971-4db9-417c-971b-e666b26cd23d)


The next thing is to have a simple database, just to prove our concept of generating a token, which contains the hashed JWT data from our user data.
My DB name is called phpJwt and contains one table with following columns:

user_id  NOT NULL  auto increment
user_email
user_password
user_name

![JWT_DB](https://github.com/user-attachments/assets/f84fb4e3-352f-4981-b8b2-585d02dbf4f9)


Now let us have a look at the login screen. While we are in "inspect" mode in out browser, go to the storage tab and expand the Cookie dropdown. This is where our token will be stored, in a cookie with all our information. The cookie method ensures that it is a piece of data stored in the browser for x amount of time you allowed the cookie to exist. That way we can access whatever data we desire to store here, and thus make it easy to navigate an entire site with restrictions depending on role setup.

![No_Token](https://github.com/user-attachments/assets/dfaa24f6-250a-41f6-9fcc-726e8f9edebd)


After we have logged in, you will see that there is a token!

![Token_Assigned](https://github.com/user-attachments/assets/977a7895-a3d2-4f83-8505-8ea8bf14f395)


Now the DB connection and the token key (that is used to hash our data) is displayed in the index.php
For good practices, these information are SECRET, and therefor you should never share DB username, password, the hashing key or any sensetive data like in my page. This is for illustrating how JWT works in a simple manner. To do it peoperly, you would have an environment file called .env where all local users with their username, password and so on is stored and not pushed to the public.

![image](https://github.com/user-attachments/assets/54aa9a73-b59c-425c-9975-ca9a55fbaf82)
