
## Description

Order management  task sent by Nouran.

## Installation

```bash
$ comopser install
```

## Running the app

```bash
# development
$ ./vendor/bin/phpunit  tests --log-events-verbose-text test.log




## Run the System with docker
We can easily run the whole with only a single command:
```bash
docker-compose up
```

We can easil run the app with cloud DB with 
```bash
sudo docker-compose -f docker-compose.staging.yml up -d --build
```

Docker will pull the MySQL and Node.js images (if our machine does not have it before).

The services can be run on the background with command:
```bash
docker-compose up -d
```
## Stop the System with docker
Stopping all the running containers is also simple with a single command:
```bash
docker-compose down
```

## Insight the System with docker
List all docker contaoners
```bash
docker ps
```

Stop a docker contaoner
```bash
docker stop {container-id}
```

Remove a docker contaoner
```bash
docker rm {container-id}
```


## Test

```bash
# unit tests
$ npm run test

# e2e tests
$ npm run test:e2e

# test coverage
$ npm run test:cov

# test integration
$ sudo docker-compose -f docker-compose.testing.yml up
$ npm run test:int
```

## Support

Nest is an MIT-licensed open source project. It can grow thanks to the sponsors and support by the amazing backers. If you'd like to join them, please [read more here](https://docs.nestjs.com/support).

## Stay in touch

- Author - [Kamil Myśliwiec](https://kamilmysliwiec.com)
- Website - [https://nestjs.com](https://nestjs.com/)
- Twitter - [@nestframework](https://twitter.com/nestframework)

## License

  Nest is [MIT licensed](LICENSE).


