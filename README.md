# Projektuppgift REST-webbtjänst - Webbutveckling III
I den första delen av projektuppgiften skapades en REST-webbtjänst vars syfte är att kunna läsa ut, lägga till, ändra och radera information med hjälp av GET, POST, PUT och DELETE.

För att starta systemet klona först projektet genom: **git clone https://github.com/selmakohnic/webb3_projekt_api.git**.

Följande curl requests kan användas för att testa REST-webbtjänsten:
* __GET:__ curl -i -X GET http://localhost/Webbutveckling3/projekt_api/cv_api.php/jobs
* __GET med ID:__ curl -i -X GET http://localhost/Webbutveckling3/projekt_api/cv_api.php/jobs/1
* __POST:__ curl -i -X POST -d '{"duration":"2016-2017","name":"Företagsnamn", "role":"Webbutvecklare", "description":"Jobbade som webbutvecklare"}' http://localhost/Webbutveckling3/projekt_api/cv_api.php/jobs/
* __PUT:__ curl -i -X PUT -d '{"duration":"2016-2017","name":"Företagsnamn", "role":"Webbutvecklare", "description":"Jobbade som webbutvecklare"}' http://localhost/Webbutveckling3/projekt_api/cv_api.php/jobs/1
* __DELETE:__ curl -i -X DELETE http://localhost/Webbutveckling3/projekt_api/cv_api.php/jobs/1

Demonstration av uppgiften hittas här:
* http://studenter.miun.se/~seko1800/dt173g/projekt/api/cv_api.php/about
* http://studenter.miun.se/~seko1800/dt173g/projekt/api/cv_api.php/jobs
* http://studenter.miun.se/~seko1800/dt173g/projekt/api/cv_api.php/educations
* http://studenter.miun.se/~seko1800/dt173g/projekt/api/cv_api.php/websites