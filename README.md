when setting up the project you should execute the following before running the docker container:

```docker run --rm -d \
  --name nifi-init \
  -e SINGLE_USER_CREDENTIALS_USERNAME=admin \
  -e SINGLE_USER_CREDENTIALS_PASSWORD=password_1234 \
  -e NIFI_WEB_HTTPS_PORT=8080 \
  -e NIFI_WEB_HTTPS_HOST=0.0.0.0 \
  apache/nifi:latest
```

then copy the lib and conf folders as they shouldn't be mounted empty:
`docker cp nifi-init:/opt/nifi/nifi-current/* ./`

and finally we remove the `nifi-init` container:
`docker rm -f nifi-init`
