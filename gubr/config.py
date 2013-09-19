import web

# conn = psycopg2.connect(database="hacknj", user="postgres", password="secret")

DB = web.database(dbn='postgres', dburl='localhost:5432', db='hacknj', user='postgres', pw='paintball1')
cache = False