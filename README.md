# OpenShift Workshop

```sh
# import the php image and keep it up-to-date
oc import-image php:7.2-apache --scheduled --confirm

# create the build of our own docker image
oc new-build https://github.com/ninech/openshift-workshop.git

# create the deployment
oc new-app openshift-workshop:latest

# expose it to the public
oc expose dc openshift-workshop --port=8000
oc expose service openshift-workshop
```
