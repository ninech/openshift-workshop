# OpenShift Workshop

```sh
# import the php image and keep it up-to-date
oc import-image php:7.2-apache --scheduled --confirm

# create the build of our own docker image
oc new-build https://github.com/ninech/openshift-workshop.git

# create the deployment and the service
oc new-app openshift-workshop:latest

# expose it to the public
oc expose service openshift-workshop
```

* Change the route to point to port 8000. Port 80 is exposed by the base image but we use 8000 in our own image.

* Change the resource limits for the deployment.

```sh
oc edit dc openshift-workshop
```

```yml
containers:
- ...
  resources:
    limits:
    memory: 50Mi
```

* Add a "MySQL (Persistent)" Service to your project via the UI. ("Add to project / Browse catalog")
  * It creates a persistant volume claim which requests some storage space for MySQL.

* Configure the deployment config `openshift-workshop` to use the variables from the secret `mysql`. They can be copied
  from the mysql deployment config. Don't forget to add the `MYSQL_HOST` variable.
  * Hint: `oc export dc mysql`
  * Use the UI, which is quite easy to use in this case.

* Add health checks to the app's deployment config.

* Try to use the PHP template from the catalog. Just provide a name and the GIT URL of this repo.
