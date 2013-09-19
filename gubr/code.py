import web
import view
import config
import psycopg2
from view import render

urls = (
    '/', 'index'
)

class index:
    def GET(self):
        return render.index()

if __name__ == "__main__":
    app = web.application(urls, globals())
    app.internalerror = web.debugerror
    app.run()