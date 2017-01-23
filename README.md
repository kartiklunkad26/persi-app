# persi-app
Sample app to showcase persistence in CF

Pre-requistes: 
- A Cloud Foundry environment 
- Deploy the [nfs-volume release](https://github.com/cloudfoundry-incubator/nfs-volume-release)

Getting started

Once you have the environment ready, you should be able to run ```cf marketplace```

You should be able to see the nfs service available there. 

```
service                       plans                                      description
nfs                           Existing                                   NFS volumes secured with Kerberos (see: https://example.com/knfs-volume-release/)

```

- Create the NFS service

`$ cf create-service nfs Existing myVolume -c '{"share":"<PRIVATE_IP>/export/vol1"}'`

- Deploy the app
`cf push kitty --no-start`

- Set the environment variable 
`cf set-env kitty CF_SERVICE nfs`

- Bind the service

`cf bind-service kitty myVolume -c '{"uid":"1000","gid":"1000"}'`

- Start the app

`cf start kitty`

This basic app will persist everything in a `test.txt` file. 
