#!/usr/bin/env python
import argparse
import urllib2
import sys
import pymongo
import time
from datetime import datetime
from collections import defaultdict

def main():
    parser = argparse.ArgumentParser(description="Add lower case city name")
    parser.add_argument('host', nargs=1, help="The MongoDB host")
    parser.add_argument('database', nargs=1, help="The DB to use")
    parser.add_argument('--port', dest='port', nargs=1, type=int, help="DB Port")
    parser.add_argument('--user', dest='user', nargs=1, help="DB username")
    parser.add_argument('--password', dest='password', nargs=1, help="DB password")

    args = vars(parser.parse_args())
    host = args['host'][0]
    database = args['database'][0]
    port = 27017
    if (args['port'] != None):
        port = args['port'][0]

    try:
        connection = pymongo.Connection(host, port)
    except Exception, e:
        print 'Failed to connect to MongoDB: ' + host + ' ' + repr(port)
        sys.exit(-1)

    db = connection[database]
    if (args['user'] != None and
        args['password'] != None):
        db.authenticate(args['user'][0], args['password'][0])

    i = 0
    accidents = db['accidents']
    locations = defaultdict(int)
    for location in accidents.find().distinct('location'):
        locations[location] = accidents.find({'location':location}).count()
    for key,value in locations:
        print key + ':\t' + value
if __name__ == '__main__':
    main()
