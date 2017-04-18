# PHP-JWT-AuthService  - Authentication Service

Authentication Service is a project created by Sean Warren. The project was to create a web application that securely authenticates people with a username and password. The server should then establish an active session with the client by returning a cookie.

[Demo](http://mildfun.com/new/)

# Features

- [x] Establishes an active session through the use of cookies upon successful login
- [x] Returns a JWT (JSON Web Token) in the response
- [x] Provides a way to validate the JWT on server
- [x] Provides a way to logout in order to destroy the cookie and session
- [x] Implement Two Factor authentication
- [x] Store user information in a self-contained database (e.g. SQLite, LevelDB, etc.)
- [x] User account creation
- [x] A client web page that uses the authentication service
- [ ] Full unit tests


# Important Information

## Which application you choose to develop and why?
---
I choose to develop the Authentication Service because I wanted to learn more about the JSON Web Token. The JSON Web Token was designed to secure data on the web by signing the contents with a token that is able to be validate whether the token expired or you have an invalid token.

## How to use/test​ the provided application?
---
To use the Authentication Service, unzip the file new.zip and upload the new folder onto your server. After chmod the ‘new’ directory and all enclosed folders to 755, this is to ensure that the application can read, write and create databases. Next, open up ‘/new/classes/config.php’ and change the defined constants to use in the project.
 
Note: I used an SQLite server that will automatically create a new database if there is not a database and the folder has the correct chmod settings.

## Optional: Enable Two Factor Authentication 
---
To enable Two Factor Authentication open ‘/new/js/index.js’ and comment line 45 which says  ‘$(location).attr('href', '/new/home.php');’ and then uncomment line 47 which says  ‘// $(location).attr('href', '/new/phone.php');’. This will allow two factor authentication by redirecting a user who signs up to verify their phone number. After go to ‘/new/actions/sendKey.php’ and put in your twilio credentials (Account ID, Auth Token, Twilio Number and the number to send it to).  With a Twilio trial account you can only text your verified number. So the implemented version texts the verified number a random 4 digits and the user confirms the digits and then the user is able to login to the member section. If you need more help with setting up your Twilio account, go to ‘https://www.twilio.com/docs/quickstart/php/sms’.

## What Operating System (+ service pack) and libraries are required?
---
All libraries needed for the Authentication Server our provided. I original built this application on my local Mac OS X  El Captain webserver and then transferred it over onto my HostGator Hosting at http://mildfun.com/new/.

## Any design decisions or behavioral clarifications​ that illustrate how your program functions and why?
---
These are a few ways to text the Authentication server.

First you are able to login to the Authentication server using username ‘Sean’ and password ‘testing’. When you attempt to login with those credentials you will go straight into the member section which displays your JSON Web Token data and tell you when your token expires.

Second, you can try to login with a user with invalid credentials and it will display an error message.

Third, If you try to register an account with the username ‘sean’ the application will display and error message as well as when you try to use an email that’s already in use like ‘sean.warren@gmail.com’.
---
## Credits

Name: Sign Up/Login Form by Eric Hermanson

Purpose: I used this code pen to prototype the design of the Authentication Server.

License: Public Domain

Website: http://codepen.io/ehermanson/pen/KwKWEv

---

Name: Authentication JWT by Neuman Yong, Apapt Narayan

Purpose: I used this class and ‘https://github.com/rmcdaniel/angular-codeigniter-seed/blob/master/api/application/helpers/jwt_helper.php’ and modified the class to be able to be used without firebase and also implemented a validation check on the token to see if it expired based on time.

License: http://opensource.org/licenses/BSD-3-Clause 3-clause BSD

Website: https://github.com/firebase/php-jwt

---

Name: The Twilio PHP Helper Library

Purpose: I used this class for the two-factor authentication.

License: MIT License – Open Domain

Website: https://www.twilio.com/docs/libraries/php


