from kafka import KafkaProducer
import json
import sys

if len(sys.argv) < 2:
    print('Usage: producer.py <customerNumber> <orderNumber> ')
    sys.exit(1)

customerNumber = sys.argv[1]
orderNumber = sys.argv[2]

producer = KafkaProducer(bootstrap_servers=['localhost:9092'],
                         value_serializer=lambda m: json.dumps(m).encode('ascii'))

topic = 'cache'

message = {'customerNumber': customerNumber, 'orderNumber': orderNumber}
producer.send(topic, message)
print(f'Sent message: {message}')

producer.flush()
producer.close()