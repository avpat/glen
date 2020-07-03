# Glenhawk coding test


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
Task
Write a survey service class that takes a payLoad (a collection of key values pairs) and an eligibility survey (collection of rules), evaluates them and returns a boolean response of that evaluation.
There will be a survey table with a name, description columns and one-to-many relationship on the sections table. Sections have name and description. Some sections are optional and should be marked as such. Sections will consist of the rules for evaluation. As rules can be reused in different eligibility survey. This is a many-to-many relationship.
Your SurveyService class will need to process each rule, evaluate the payload according the rule and aggregate the response into a single boolean. Some sections are optional, and your class should be able to handle this.
The evaluation service is already written for you, so you can call it  : 
$ruleEvaluator->evaluate(Collection $payload) bool $result 
The payLoad is passed as a collection of <key;value> pairs.
The rules should be left as a simple class with an id and a string as the ConditionEvaluator will decode them. 
Example
Payload
Key
Value
Annual Income
30,000
Borrower Trustworthiness
Trustworthy
Borrower Age
27
Loan Length in Months
12
Loan Amount
90,000

Survey
Name
Consumer Loan Eligibility Survey




Description
Rules that determine whether the consumer loan application should be accepted or rejected
Section
Borrower Age
Optional




Borrower Age > 21






Borrower Age < 75




Section 
Affordability
Mandatory




Annual Income > 40,000






Loan Amount < 3 * Annual Income




Section 
Finance
Mandatory




Loan Length in Months < 12






Loan Amount < 500,000










 
<a id="about-me"></a>

## About 

* **First name:** `A.V.`
* **Last name:** `Patil`

<a id="comments"></a>
## comments/Notes

- Thanks for the opportunity
