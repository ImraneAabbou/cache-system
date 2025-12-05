#!/bin/bash
set -e

# Only run if the replica set is not initialized
if mongo --host mongo-1:27017 --eval "rs.status()" | grep -q "no replset config"; then
    echo "Initializing replica set..."

    mongo --host mongo-1:27017 <<EOF
rs.initiate({
  _id: "rs0",
  members: [
    { _id: 0, host: "mongo-1:27017" },
    { _id: 1, host: "mongo-2:27018" },
    { _id: 2, host: "mongo-3:27019" }
  ]
})
EOF

    echo "Waiting for primary..."
    until mongo --host mongo-1:27017 --eval "rs.isMaster().ismaster" | grep -q "true"; do
        echo "Waiting for mongo-1 to become primary..."
        sleep 2
    done

    echo "Replica set initialized successfully."
else
    echo "Replica set already initialized."
fi

