## Test
My test for Avrillo


## How to run
```
git clone git@github.com:cornatul/avrillo.git && cd avrillo && make build-fresh && make up-dev
```

## How to set up 
You will need to add to your .env file in the root of the project the following variable:
```
API_TOKEN=123
```


## How to use
```
curl --request GET \
  --url http://localhost:8000/api/quotes \
  --header 'Authorization: 123' \
  --header 'Content-Type: application/json' \
  --header 'User-Agent: insomnia/8.3.0'
```


## How to test
```
make test
```

## Time Spent
```
1 hour
```

## Improvements
I would have liked to have added a few more tests, but I didn't want to spend more time.
I think i have a logic issue for the caching of the data, but I didn't want to spend more time.


## In plus
I have added a makefile to make it easier to run the project.
I have added a docker-compose file to make it easier to run the project.
I've added a GitHub action to run the tests on push and build the image on push to main.

