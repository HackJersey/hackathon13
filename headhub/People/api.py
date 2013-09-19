import sys 
from BeautifulSoup import BeautifulSoup, SoupStrainer
import re
import urllib2
#import requests
from HTMLParser import HTMLParser 
from re import sub 
from sys import stderr 
from traceback import print_exc
from urllib import urlopen

from django.http import HttpResponse
from django.views.decorators.csrf import csrf_exempt
from django.views.decorators.http import require_POST

from People.models import *
#from shouts.models import *

import json
from datetime import datetime
from time import sleep

#del 

@csrf_exempt
@require_POST
def new_shout(request):

    d=""
    dd=""
    lat = request.POST['lat']
    lng = request.POST['lng']
    author = request.POST['author']
    message = request.POST['message']
    keywords = request.POST['keywords']
    #print keywords
    kw = keywords.replace(" ", "%20")
    kw = kw.replace('"', "%22")
    print kw

    zip="10001"
    address = ""

    d=author
    dd=message
    # d="10/04/2012"
    # dd ="10/04/2012"

    a=0
    response = []
    for page in range(1):

        pageStr = str(page)
        ddd = 'http://searchwww.sec.gov/EDGARFSClient/jsp/EDGAR_MainAccess.jsp?search_text='+kw+'&sort=Date&formType=Form8K&isAdv=true&stemming=true&numResults=100&fromDate=' + d + '&toDate=' + dd + '&numResults=100' 
        #ddd = 'http://searchwww.sec.gov/EDGARFSClient/jsp/EDGAR_MainAccess.jsp?search_text=%22item%205.02%22&sort=Date&formType=Form8K&isAdv=true&stemming=true&numResults=100&fromDate=' + d + '&toDate=' + d + '&numResults=100'
        #ddd='http://searchwww.sec.gov/EDGARFSClient/jsp/EDGAR_MainAccess.jsp?search_text=%22item+5.02%22&startDoc=' + pageStr + '01&numResults=50&isAdv=true&stemming=true&sort=Date&formType=Form8K&fromDate=' + d + '&toDate=' + dd
        responser=get_url_content(ddd)
        #responser=get_url_content('http://searchwww.sec.gov/EDGARFSClient/jsp/EDGAR_MainAccess.jsp?search_text=%22Item%205.02%22%20AND%20%22Departure%20of%20Directors%20or%20Certain%20Officers%3B%20Election%20of%20Directors%3B%20Appointment%20of%20Certain%20Officers%3B%20Compensatory%20Arrangements%20of%20Certain%20Officers%22&sort=Date&formType=Form8K&isAdv=true&stemming=true&numResults=100&fromDate=08/09/2012&toDate=08/09/2012&numResults=100')

        #addrs=[]

        #a=0
        xLast=""
        zz=""
        x=" "
        e=0
        #response = []
        for link in BeautifulSoup(responser, parseOnlyThese=SoupStrainer('a')):
            if link.has_key('href'):
                y = link['href']

                if 'javascript:opennew(' in y: # and xLast is not x:

                    b = y.index("'",21)
                    z = y[20:b]
                    #print z

                    c = y.index("'", b+4)
                    x = y[b+3:c]
                    if not (xLast == x):# and zz is z[1:45]:
                        #a=a+1
                        text = get_url_content(z)
                        #print text
                        zzz=dehtml(text)
                        #try:
                        #    zzz=zzz[1:8000]
                        #except:
                        #    zzz=zzz
                        #print len(zzz)
                        xx=x[0:40]                
                        #print xx
                        try:
                            e = zzz.index(kw ,1) #zzz.index("Item 5.02",1)
                        except:
                            e = 1
                        #print e
                        #    e = zzz.index("ITEM 5.02",1)
                        newzzz = zzz[e:e+250]
                        #print newzzz
                        #print newzzz
                        zz=z[1:45]
                        xLast=x
                        #if ("a" in newzzz):
                        #if ("resign" in newzzz) or ("retir" in newzzz) or ("to pursu" in newzzz) or ("terminat" in newzzz) or ("transition" in newzzz) or ("depart" in newzzz) or ("severanc" in newzzz) or ("interim" in newzzz) or ("successor" in newzzz) or ("step down" in newzzz) or ("separation" in newzzz) or (" cease" in newzzz) or ("eliminat" in newzzz) or ("leav" in newzzz) or ("left" in newzzz) or ("stepped down" in newzzz) or ("stepping down" in newzzz):
                        #a = a + 1
                        #print a
                        author=xx
                        #print author
                        message=z #newzzz
                        #print message
                        cikidxbeg = y.index("http://www.sec.gov/Archives/edgar/data/",1) + 40
                        cikidxend = y.index("/", cikidxbeg)
                        cik = y[cikidxbeg-1:cikidxend]
                        cikText = get_url_content('http://www.sec.gov/cgi-bin/browse-edgar?action=getcompany&CIK=' + cik)
                        mailerLocA = cikText.index("<div class=\"mailer\">",1)
                        mailerLocB = cikText.index("<div class=\"mailer\">", mailerLocA + 20)
                        mailerText = cikText[mailerLocA:mailerLocB + 20]
                        #print mailerText
                        #print(dehtml(mailerText))
                        address = dehtml(mailerText)
                        #print address
                        postal_code = re.match('^.*?(\d+)$', address)
                        #print postal_code
                        if postal_code!=None:
                            zip = address[-5:len(address)]

                            if zip[-5:-4] == "-":
                                zip = address[-10:-6]

                            if zip >= "07000" and zip <="09000":
                                a = a + 1
                                #print a
                                #zip = postal_code.group(1)
                                #print zip
                                #print zip[-5:-4]
                                address = address[16:len(address)]
                                #print address                   

                                shout = Shout.objects.create(lat=lat,lng=lng,author=author,message=message)

                                response.append({
                                    'date_created': shout.date_created.strftime("%b %d at %I:%M:%S%p"),
                                    'lat': str(shout.lat),
                                    'lng': str(shout.lng),
                                    'author': author,
                                    'message': message,
                                    'zipcode': zip,
                                    'address': address,
                                    'count': a
                                })



                        #sleep(5)
        # response = {
        #     'date_created': shout.date_created.strftime("%b %d at %I:%M:%S%p"),
        #     'lat': str(shout.lat),
        #     'lng': str(shout.lng),
        #     'author': author,
        #     'message': message,
        #     'zipcode': zip
        # }    
        
    return HttpResponse(json.dumps(response))

#def get_shouts(request):
def get_People(request):
    lat = float(request.GET['lat'])
    lng = float(request.GET['lng'])
    radius = float(request.GET['radius'])
    
    lat_low = str(lat - radius)
    lat_high = str(lat + radius)
    lng_low = str(lng - radius)
    lng_high = str(lng + radius)
    
    #shouts = Shout.objects.filter(lat__gte=lat_low,lat__lte=lat_high,lng__gte=lng_low,lng__lte=lng_high)[:10000]
    People = Shout.objects.filter(lat__gte=lat_low,lat__lte=lat_high,lng__gte=lng_low,lng__lte=lng_high)[:10000]
    
    #zip="10001"

    response = []
    #for shout in shouts:
    for shout in People:
        response.append({
            'date_created': shout.date_created.strftime("%b %d at %I:%M:%S%p"),
            'lat': str(shout.lat),
            'lng': str(shout.lng),
            'author': shout.author,
            'message': shout.message,
            'zipcode': shout.zip,
            'address': shout.address,
            'count': shout.a
        })
        #sleep(2)
    
    return HttpResponse(json.dumps(response))

def get_url_content(site_url):
    rt=""
    try:
        request = urllib2.Request(site_url) 
        f=urllib2.urlopen(request)
        content=f.read()
        f.close()
    except urllib2.HTTPError, error:
        content=str(error.read())
    return content

class _DeHTMLParser(HTMLParser): 
    def __init__(self): 
        HTMLParser.__init__(self) 
        self.__text = [] 
 
    def handle_data(self, data): 
        text = data.strip() 
        if len(text) > 0: 
            text = sub('[ \t\r\n]+', ' ', text) 
            self.__text.append(text + ' ') 
 
    def handle_starttag(self, tag, attrs): 
        if tag == 'p': 
            self.__text.append('\n\n') 
        elif tag == 'br': 
            self.__text.append('\n') 
 
    def handle_startendtag(self, tag, attrs): 
        if tag == 'br': 
            self.__text.append('\n\n') 
 
    def text(self): 
        return ''.join(self.__text).strip() 
 
def dehtml(text):
    try: 
        parser = _DeHTMLParser() 
        parser.feed(text) 
        parser.close() 
        return parser.text() 
    except: 
        print_exc(file=stderr) 
        return text    