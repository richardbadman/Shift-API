# Employee Shift web application

## About Shift-API

A simple web application designed to store Employee's and any shift's they are assigned.

## Running the application
**Pre-requisites:**
> Docker

Running the application is an easy process, providing Docker is installed on your machine and is running. In a terminal application type the following:
```
./run.sh
```

The application will run a postgres container, and build the application and run it on another. The application will take approximately 5 minutes to build. So sit back and relax and have a beer :beer:.

Once the application has built, it can be viewed via http://localhost:8080/

Due to the authentication of the application, you are required to register / login to use it.

## Rate Limiting
This application features API Rate limits, to prevent any possible overloads. This is currently set to; 50 calls per 30 minutes, with the exception of 25 calls per 30 minutes for any requests that update / post data.

## ToDo

- ~~[ ] HATEOAS compliant
> - [x] RESTful compliant
- [x] Persistant data
- [x] HTML/JS Front end
- [x] Authentication
- [x] API Rate Limiting
- [x] Docker setup