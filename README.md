
# Glenhawk coding test

##task
Kindly see my code in the API folder.


***

**Table of Contents**


* [Prerequisites](#prerequisites)
* [About your implementation](#about-your-implementation)
* [Dev environment](#the-installation)
* [The task](#the-task)
* [About me](#about-me)
* [comments](#comments)


<a id="prerequisites"></a>
##Prerequisites

I've used docker.
- php 7.4
- mysql 5.6


<a id="the-installation"></a>
##Docker-compose Installation Notes

- Run a docker desktop on your machine
- Goto your project's root folder
- create a .env file and add database connections/duplicate sample .env file and add connections below

        DB_CONNECTION=mysql
        
        DB_HOST=mysql
        
        DB_PORT=3306
        
        DB_DATABASE=glenhawkapi
        
        DB_USERNAME=glenhawkapi
        
        DB_PASSWORD=azertyuiop1234567890!

- Run a docker build command and it should copy all the required images
`` docker-compose build && docker-compose up -d``
- Check if the docker container is running with following command
``docker-compose ps``
- If any issue occurs execute ``docker-compose down -v `` and then once again execute `` docker-compose build && docker-compose up -d``
- if any issue occurs check folder perssions from the docker desktop
- if everything ok then execute ``docker-compose exec php php artisan config:cache``
- the service sgoukd be available at ``localhost:8000``
- database relationships can be seen in data_diaagram.png file

<a id="the-task"></a>

##Task
- difficulty interpretating following para
``Your SurveyService class will need to process each rule, evaluate the payload according the rule and aggregate the response into a single boolean. Some sections are optional, and your class should be able to handle this.
The evaluation service is already written for you, so you can call it  : ``
- I was not sure if I need to implement rulevalidation or not. So I implemented it again.





 
<a id="about-me"></a>

## About 

* **First name:** `A.V.`
* **Last name:** `Patil`

<a id="comments"></a>
## comments/Notes

- Thanks for the opportunity
