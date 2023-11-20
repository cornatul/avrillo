## Test
My test for Avrillo

I've created a make file to make it easier to run the project in Linux & Mac environments. 




## How to run
```
git clone git@github.com:cornatul/avrillo.git
```

```
cd avrillo
```

```
make build
```

```
make up
```


## How to set up 
You will need to add to your .env file in the root of the project the following variable:
```
API_TOKEN=123
```
Currently, the **API_TOKEN** is hardcoded in the .env.example file and there is a step inside the dockerfile to copy
the .env.example to .env via a .sh command



## How to use
```
curl --request GET \
  --url http://localhost:8000/api/quotes \
  --header 'Authorization: 123' \
  --header 'Content-Type: application/json' \
  --header 'User-Agent: insomnia/8.3.0'
```


## How to test

You will have to ssh into the container by running the following command:
```
make ssh
```

and then run the following command:

```
vendor/bin/phpunit
```

## Time Spent
```
1 hour
```

## Improvements
I would have liked to have added a few more tests, but I didn't want to spend more time.
I think I have a logic issue for the caching of the data, but I didn't want to spend more time.


## In plus ( DEVOPS )
I have added a makefile to make it easier to run the project.
I have added a docker-compose file to make it easier to run the project.
I've added a GitHub Workflow action to run the tests on push and build the image on push to main.

